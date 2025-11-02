<?php include 'includes/header.php'; ?>

<?php
include 'config/database.php';

$database = new Database();
$db = $database->getConnection();

$query = "SELECT mi.*, c.name as category_name FROM menu_items mi LEFT JOIN categories c ON mi.category_id = c.id ORDER BY mi.created_at DESC";
$stmt = $db->prepare($query);
$stmt->execute();

?>

<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-3xl font-bold">Menu</h1>
        <a href="add_menu_item.php" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Add New Item</a>
    </div>
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="min-w-full bg-white">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="py-3 px-4 uppercase font-semibold text-sm">Name</th>
                    <th class="py-3 px-4 uppercase font-semibold text-sm">Category</th>
                    <th class="py-3 px-4 uppercase font-semibold text-sm">Price</th>
                    <th class="py-3 px-4 uppercase font-semibold text-sm">New</th>
                    <th class="py-3 px-4 uppercase font-semibold text-sm">Available</th>
                    <th class="py-3 px-4 uppercase font-semibold text-sm">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
                    <tr>
                        <td class="py-3 px-4"><?php echo $row['name']; ?></td>
                        <td class="py-3 px-4"><?php echo $row['category_name']; ?></td>
                        <td class="py-3 px-4"><?php echo $row['price']; ?></td>
                        <td class="py-3 px-4"><?php echo $row['is_new'] ? 'Yes' : 'No'; ?></td>
                        <td class="py-3 px-4"><?php echo $row['is_available'] ? 'Yes' : 'No'; ?></td>
                        <td class="py-3 px-4">
                            <a href="edit_menu_item.php?id=<?php echo $row['id']; ?>" class="text-blue-500">Edit</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include 'includes/footer.php'; ?>