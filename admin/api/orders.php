<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET, POST");
header("Access-Control-Allow-Headers: Content-Type");

require_once '../config/database.php';

$database = new Database();
$db = $database->getConnection();

if (!$db) {
    handleError("Database connection failed");
}

$method = $_SERVER['REQUEST_METHOD'];

try {
    if ($method === 'POST') {
        // Create new order
        $input = json_decode(file_get_contents('php://input'), true);

        if (!$input) {
            handleError("Invalid JSON input", 400);
        }

        // Validate required fields
        if (!isset($input['items']) || !isset($input['payment'])) {
            handleError("Missing required fields: items and payment", 400);
        }

        // Start transaction
        $db->beginTransaction();

        // Generate order number
        $order_number = 'DD' . date('Ymd') . str_pad(rand(1, 9999), 4, '0', STR_PAD_LEFT);

        // Check if order number exists
        $check_query = "SELECT COUNT(*) FROM orders WHERE order_number = ?";
        $check_stmt = $db->prepare($check_query);
        $check_stmt->execute([$order_number]);

        while ($check_stmt->fetchColumn() > 0) {
            $order_number = 'DD' . date('Ymd') . str_pad(rand(1, 9999), 4, '0', STR_PAD_LEFT);
            $check_stmt->execute([$order_number]);
        }

        // Calculate totals
        $subtotal = 0;
        foreach ($input['items'] as $item) {
            $subtotal += $item['price'] * $item['quantity'];
        }

        $vat_rate = 0;
        $vat_amount = 0;
        $total_amount = $subtotal;

        // Insert order
        $order_query = "
            INSERT INTO orders (
                order_number, customer_name, customer_phone, 
                subtotal, vat_rate, vat_amount, total_amount,
                payment_method, amount_paid, change_amount, notes
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
        ";

        $change_amount = max(0, $input['payment']['amount_paid'] - $total_amount);

        $order_stmt = $db->prepare($order_query);
        $order_stmt->execute([
            $order_number,
            $input['customer']['name'] ?? null,
            $input['customer']['phone'] ?? null,
            $subtotal,
            $vat_rate,
            $vat_amount,
            $total_amount,
            $input['payment']['method'] ?? 'cash',
            $input['payment']['amount_paid'],
            $change_amount,
            $input['notes'] ?? null
        ]);

        $order_id = $db->lastInsertId();

        // Insert order items
        $item_query = "
            INSERT INTO order_items (
                order_id, menu_item_id, item_name, 
                item_price, quantity, subtotal
            ) VALUES (?, ?, ?, ?, ?, ?)
        ";

        $item_stmt = $db->prepare($item_query);

        foreach ($input['items'] as $item) {
            $item_subtotal = $item['price'] * $item['quantity'];
            $item_stmt->execute([
                $order_id,
                $item['id'],
                $item['name'],
                $item['price'],
                $item['quantity'],
                $item_subtotal
            ]);
        }

        $db->commit();

        // Get complete order details
        $order_details_query = "
            SELECT o.*, 
                   oi.item_name, oi.item_price, oi.quantity, oi.subtotal as item_subtotal
            FROM orders o
            LEFT JOIN order_items oi ON o.id = oi.order_id
            WHERE o.id = ?
            ORDER BY oi.id
        ";

        $details_stmt = $db->prepare($order_details_query);
        $details_stmt->execute([$order_id]);
        $order_details = $details_stmt->fetchAll();

        sendJsonResponse([
            'success' => true,
            'message' => 'Order created successfully',
            'order_id' => $order_id,
            'order_number' => $order_number,
            'order_details' => $order_details,
            'change_amount' => $change_amount
        ]);

    } else if ($method === 'GET') {
        // Get orders list
        $limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 50;
        $offset = isset($_GET['offset']) ? (int)$_GET['offset'] : 0;

        $query = "
            SELECT o.*, 
                   COUNT(oi.id) as item_count
            FROM orders o
            LEFT JOIN order_items oi ON o.id = oi.order_id
            GROUP BY o.id
            ORDER BY o.created_at DESC
            LIMIT ? OFFSET ?
        ";

        $stmt = $db->prepare($query);
        $stmt->execute([$limit, $offset]);
        $orders = $stmt->fetchAll();

        sendJsonResponse([
            'success' => true,
            'orders' => $orders,
            'count' => count($orders)
        ]);
    }

} catch(Exception $e) {
    if ($db->inTransaction()) {
        $db->rollback();
    }
    handleError("Error processing order: " . $e->getMessage());
}
?>