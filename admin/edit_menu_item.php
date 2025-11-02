<?php include 'includes/header.php'; ?>

<?php
include 'config/database.php';

$database = new Database();
$db = $database->getConnection();

$id = $_GET['id'];

$query = "SELECT * FROM menu_items WHERE id = :id";
$stmt = $db->prepare($query);
$stmt->bindParam(':id', $id);
$stmt->execute();
$item = $stmt->fetch(PDO::FETCH_ASSOC);

$query = "SELECT * FROM categories";
$stmt = $db->prepare($query);
$stmt->execute();
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($_POST) {
    $name = $_POST['name'];
    $category_id = $_POST['category_id'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $size_info = $_POST['size_info'];
    $min_quantity = $_POST['min_quantity'];
    $is_new = isset($_POST['is_new']) ? 1 : 0;
    $is_available = isset($_POST['is_available']) ? 1 : 0;

    $query = "UPDATE menu_items SET name = :name, category_id = :category_id, price = :price, description = :description, size_info = :size_info, min_quantity = :min_quantity, is_new = :is_new, is_available = :is_available WHERE id = :id";
    $stmt = $db->prepare($query);

    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':category_id', $category_id);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':size_info', $size_info);
    $stmt->bindParam(':min_quantity', $min_quantity);
    $stmt->bindParam(':is_new', $is_new);
    $stmt->bindParam(':is_available', $is_available);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        header("Location: menu.php");
        exit;
    } else {
        echo "Error updating menu item.";
    }
}
?>

<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-4">Edit Menu Item</h1>
    <form action="edit_menu_item.php?id=<?php echo $id; ?>" method="POST" class="bg-white shadow-md rounded-lg p-4">
        <div class="mb-4">
            <label for="name" class="block text-gray-700 font-bold mb-2">Name</label>
            <input type="text" name="name" id="name" value="<?php echo $item['name']; ?>" class="w-full px-3 py-2 border rounded-lg">
        </div>
        <div class="mb-4">
            <label for="category_id" class="block text-gray-700 font-bold mb-2">Category</label>
            <select name="category_id" id="category_id" class="w-full px-3 py-2 border rounded-lg">
                <?php foreach ($categories as $category) : ?>
                    <option value="<?php echo $category['id']; ?>" <?php echo $category['id'] == $item['category_id'] ? 'selected' : ''; ?>><?php echo $category['name']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-4">
            <label for="price" class="block text-gray-700 font-bold mb-2">Price</label>
            <input type="text" name="price" id="price" value="<?php echo $item['price']; ?>" class="w-full px-3 py-2 border rounded-lg">
        </div>
        <div class="mb-4">
            <label for="description" class="block text-gray-700 font-bold mb-2">Description</label>
            <textarea name="description" id="description" rows="3" class="w-full px-3 py-2 border rounded-lg"><?php echo $item['description']; ?></textarea>
        </div>
        <div class="mb-4">
            <label for="size_info" class="block text-gray-700 font-bold mb-2">Size Info</label>
            <input type="text" name="size_info" id="size_info" value="<?php echo $item['size_info']; ?>" class="w-full px-3 py-2 border rounded-lg">
        </div>
        <div class="mb-4">
            <label for="min_quantity" class="block text-gray-700 font-bold mb-2">Minimum Quantity</label>
            <input type="number" name="min_quantity" id="min_quantity" value="<?php echo $item['min_quantity']; ?>" class="w-full px-3 py-2 border rounded-lg">
        </div>
        <div class="mb-4">
            <label for="is_new" class="block text-gray-700 font-bold mb-2">Mark as New</label>
            <input type="checkbox" name="is_new" id="is_new" value="1" <?php echo $item['is_new'] ? 'checked' : ''; ?>>
        </div>
        <div class="mb-4">
            <label for="is_available" class="block text-gray-700 font-bold mb-2">Is Available</label>
            <input type="checkbox" name="is_available" id="is_available" value="1" <?php echo $item['is_available'] ? 'checked' : ''; ?>>
        </div>
        <div class="flex items-center">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Update Item</button>
            <a href="menu.php" class="ml-4 text-gray-500">Cancel</a>
        </div>
    </form>
</div>

<?php include 'includes/footer.php'; ?>