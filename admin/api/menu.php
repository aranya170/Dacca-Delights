<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");

require_once '../config/database.php';

$database = new Database();
$db = $database->getConnection();

if (!$db) {
    handleError("Database connection failed");
}

try {
    // Get menu items with categories
    $query = "
        SELECT 
            mi.id, mi.name, mi.category_id, mi.price, 
            mi.description, mi.size_info, mi.min_quantity, 
            mi.is_available, mi.image_url,
            c.name as category_name, c.icon as category_icon
        FROM menu_items mi
        LEFT JOIN categories c ON mi.category_id = c.id
        WHERE c.is_active = 1
        ORDER BY c.sort_order, mi.name
    ";

    $stmt = $db->prepare($query);
    $stmt->execute();
    $items = $stmt->fetchAll();

    // Get categories
    $cat_query = "SELECT * FROM categories WHERE is_active = 1 ORDER BY sort_order";
    $cat_stmt = $db->prepare($cat_query);
    $cat_stmt->execute();
    $categories = $cat_stmt->fetchAll();

    sendJsonResponse([
        'success' => true,
        'categories' => $categories,
        'menu_items' => $items,
        'total_items' => count($items)
    ]);

} catch(Exception $e) {
    handleError("Error fetching menu: " . $e->getMessage());
}
?>