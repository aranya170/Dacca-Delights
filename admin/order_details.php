<?php include 'includes/header.php'; ?>

<?php
include 'config/database.php';

$database = new Database();
$db = $database->getConnection();

$id = $_GET['id'];

$query = "SELECT * FROM orders WHERE id = :id";
$stmt = $db->prepare($query);
$stmt->bindParam(':id', $id);
$stmt->execute();
$order = $stmt->fetch(PDO::FETCH_ASSOC);

$query = "SELECT * FROM order_items WHERE order_id = :id";
$stmt = $db->prepare($query);
$stmt->bindParam(':id', $id);
$stmt->execute();
$order_items = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-4">Order Details</h1>
    <div class="bg-white shadow-md rounded-lg overflow-hidden p-4">
        <div class="mb-4">
            <h2 class="text-xl font-bold">Order #<?php echo $order['order_number']; ?></h2>
            <p><strong>Customer:</strong> <?php echo $order['customer_name']; ?></p>
            <p><strong>Phone:</strong> <?php echo $order['customer_phone']; ?></p>
            <p><strong>Address:</strong> <?php echo $order['customer_address']; ?></p>
            <p><strong>Delivery Instructions:</strong> <?php echo $order['delivery_instructions']; ?></p>
            <p><strong>Total:</strong> <?php echo $order['total_amount']; ?></p>
            <p><strong>Status:</strong> <?php echo $order['status']; ?></p>
            <p><strong>Date:</strong> <?php echo $order['created_at']; ?></p>
            <p><strong>Delivery Date:</strong> <?php echo $order['delivery_date']; ?></p>
        </div>
        <div class="mb-4">
            <form action="update_delivery_date.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $order['id']; ?>">
                <label for="delivery_date" class="block text-gray-700 font-bold mb-2">Delivery Date</label>
                <input type="date" name="delivery_date" id="delivery_date" value="<?php echo $order['delivery_date']; ?>" class="w-full px-3 py-2 border rounded-lg">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg mt-2">Update Delivery Date</button>
            </form>
        </div>
        <div>
            <h2 class="text-xl font-bold">Order Items</h2>
            <table class="min-w-full bg-white">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="w-1/3 py-3 px-4 uppercase font-semibold text-sm">Item</th>
                        <th class="w-1/3 py-3 px-4 uppercase font-semibold text-sm">Quantity</th>
                        <th class="w-1/3 py-3 px-4 uppercase font-semibold text-sm">Subtotal</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    <?php foreach ($order_items as $item) : ?>
                        <tr>
                            <td class="py-3 px-4"><?php echo $item['item_name']; ?></td>
                            <td class="py-3 px-4"><?php echo $item['quantity']; ?></td>
                            <td class="py-3 px-4"><?php echo $item['subtotal']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>