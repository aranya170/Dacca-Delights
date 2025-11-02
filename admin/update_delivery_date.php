<?php
include 'config/database.php';

$database = new Database();
$db = $database->getConnection();

$id = $_POST['id'];
$delivery_date = $_POST['delivery_date'];

$query = "UPDATE orders SET delivery_date = :delivery_date WHERE id = :id";
$stmt = $db->prepare($query);

$stmt->bindParam(':delivery_date', $delivery_date);
$stmt->bindParam(':id', $id);

if ($stmt->execute()) {
    header("Location: order_details.php?id=" . $id);
    exit;
} else {
    echo "Error updating delivery date.";
}
?>