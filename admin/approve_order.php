<?php
include 'config/database.php';

$database = new Database();
$db = $database->getConnection();

$id = $_GET['id'];

$query = "UPDATE orders SET is_approved = 1, status = 'approved' WHERE id = :id";
$stmt = $db->prepare($query);
$stmt->bindParam(':id', $id);

if ($stmt->execute()) {
    header("Location: orders.php");
    exit;
} else {
    echo "Error approving order.";
}
?>