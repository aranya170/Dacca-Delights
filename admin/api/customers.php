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
        // Create or update customer
        $input = json_decode(file_get_contents('php://input'), true);

        if (!$input || !isset($input['phone'])) {
            handleError("Phone number is required", 400);
        }

        // Check if customer exists by phone
        $check_query = "SELECT id FROM customers WHERE phone = ?";
        $check_stmt = $db->prepare($check_query);
        $check_stmt->execute([$input['phone']]);
        $existing_customer = $check_stmt->fetch();

        if ($existing_customer) {
            // Update existing customer
            $update_query = "UPDATE customers SET name = ?, email = ?, address = ? WHERE phone = ?";
            $update_stmt = $db->prepare($update_query);
            $update_stmt->execute([
                $input['name'] ?? null,
                $input['email'] ?? null,
                $input['address'] ?? null,
                $input['phone']
            ]);

            $customer_id = $existing_customer['id'];
        } else {
            // Create new customer
            $insert_query = "INSERT INTO customers (name, phone, email, address) VALUES (?, ?, ?, ?)";
            $insert_stmt = $db->prepare($insert_query);
            $insert_stmt->execute([
                $input['name'] ?? null,
                $input['phone'],
                $input['email'] ?? null,
                $input['address'] ?? null
            ]);

            $customer_id = $db->lastInsertId();
        }

        // Get complete customer details
        $customer_query = "SELECT * FROM customers WHERE id = ?";
        $customer_stmt = $db->prepare($customer_query);
        $customer_stmt->execute([$customer_id]);
        $customer = $customer_stmt->fetch();

        sendJsonResponse([
            'success' => true,
            'customer' => $customer,
            'message' => $existing_customer ? 'Customer updated successfully' : 'Customer created successfully'
        ]);

    } else if ($method === 'GET') {
        if (isset($_GET['phone'])) {
            // Search customer by phone
            $phone = $_GET['phone'];
            $query = "SELECT * FROM customers WHERE phone LIKE ? ORDER BY name";
            $stmt = $db->prepare($query);
            $stmt->execute(['%' . $phone . '%']);
            $customers = $stmt->fetchAll();

            sendJsonResponse([
                'success' => true,
                'customers' => $customers,
                'count' => count($customers)
            ]);
        } else {
            // Get all customers
            $limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 100;
            $offset = isset($_GET['offset']) ? (int)$_GET['offset'] : 0;

            $query = "SELECT * FROM customers ORDER BY total_orders DESC, name LIMIT ? OFFSET ?";
            $stmt = $db->prepare($query);
            $stmt->execute([$limit, $offset]);
            $customers = $stmt->fetchAll();

            sendJsonResponse([
                'success' => true,
                'customers' => $customers,
                'count' => count($customers)
            ]);
        }
    }

} catch(Exception $e) {
    handleError("Error processing customer: " . $e->getMessage());
}
?>