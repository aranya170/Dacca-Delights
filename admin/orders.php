<?php include 'includes/header.php'; ?>

<?php
include 'config/database.php';

$database = new Database();
$db = $database->getConnection();

$query = "SELECT * FROM orders ORDER BY created_at DESC";
$stmt = $db->prepare($query);
$stmt->execute();

?>

<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-4">Orders</h1>
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="min-w-full bg-white">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="w-1/6 py-3 px-4 uppercase font-semibold text-sm">Order Number</th>
                    <th class="w-1/6 py-3 px-4 uppercase font-semibold text-sm">Customer</th>
                    <th class="w-1/6 py-3 px-4 uppercase font-semibold text-sm">Total</th>
                    <th class="w-1/6 py-3 px-4 uppercase font-semibold text-sm">Status</th>
                    <th class="w-1/6 py-3 px-4 uppercase font-semibold text-sm">Approved</th>
                    <th class="w-1/6 py-3 px-4 uppercase font-semibold text-sm">Date</th>
                    <th class="w-1/6 py-3 px-4 uppercase font-semibold text-sm">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
                    <tr>
                        <td class="py-3 px-4"><?php echo $row['order_number']; ?></td>
                        <td class="py-3 px-4"><?php echo $row['customer_name']; ?></td>
                        <td class="py-3 px-4"><?php echo $row['total_amount']; ?></td>
                        <td class="py-3 px-4"><?php echo $row['status']; ?></td>
                        <td class="py-3 px-4"><?php echo $row['is_approved'] ? 'Yes' : 'No'; ?></td>
                        <td class="py-3 px-4"><?php echo $row['created_at']; ?></td>
                        <td class="py-3 px-4">
                            <a href="order_details.php?id=<?php echo $row['id']; ?>" class="text-blue-500">View</a>
                            <?php if (!$row['is_approved']) : ?>
                                <a href="approve_order.php?id=<?php echo $row['id']; ?>" class="text-green-500 ml-4">Approve</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include 'includes/footer.php'; ?>