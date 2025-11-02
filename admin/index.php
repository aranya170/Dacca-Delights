<?php include 'includes/header.php'; ?>

<?php
include 'config/database.php';

$database = new Database();
$db = $database->getConnection();

// Total Orders
$query = "SELECT COUNT(*) as total_orders FROM orders";
$stmt = $db->prepare($query);
$stmt->execute();
$total_orders = $stmt->fetch(PDO::FETCH_ASSOC)['total_orders'];

// Pending Orders
$query = "SELECT COUNT(*) as pending_orders FROM orders WHERE status = 'pending'";
$stmt = $db->prepare($query);
$stmt->execute();
$pending_orders = $stmt->fetch(PDO::FETCH_ASSOC)['pending_orders'];

// Total Revenue
$query = "SELECT SUM(total_amount) as total_revenue FROM orders WHERE status = 'completed'";
$stmt = $db->prepare($query);
$stmt->execute();
$total_revenue = $stmt->fetch(PDO::FETCH_ASSOC)['total_revenue'];

// Menu Items
$query = "SELECT COUNT(*) as menu_items FROM menu_items";
$stmt = $db->prepare($query);
$stmt->execute();
$menu_items = $stmt->fetch(PDO::FETCH_ASSOC)['menu_items'];

// Daily Sales (Last 7 Days)
$query = "SELECT DATE(created_at) as sale_date, SUM(total_amount) as daily_revenue FROM orders WHERE created_at >= DATE_SUB(NOW(), INTERVAL 7 DAY) AND status = 'completed' GROUP BY DATE(created_at) ORDER BY DATE(created_at)";
$stmt = $db->prepare($query);
$stmt->execute();
$daily_sales = $stmt->fetchAll(PDO::FETCH_ASSOC);

$daily_sales_labels = [];
$daily_sales_data = [];
foreach ($daily_sales as $sale) {
    $daily_sales_labels[] = $sale['sale_date'];
    $daily_sales_data[] = $sale['daily_revenue'];
}

// Top 5 Best-Selling Products
$query = "SELECT item_name, SUM(quantity) as total_quantity FROM order_items GROUP BY item_name ORDER BY total_quantity DESC LIMIT 5";
$stmt = $db->prepare($query);
$stmt->execute();
$top_products = $stmt->fetchAll(PDO::FETCH_ASSOC);

$top_products_labels = [];
$top_products_data = [];
foreach ($top_products as $product) {
    $top_products_labels[] = $product['item_name'];
    $top_products_data[] = $product['total_quantity'];
}
?>

<h1 class="text-3xl font-bold text-warm-brown mb-6">Dashboard</h1>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
    
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-xl font-semibold mb-2">Total Orders</h2>
        <p class="text-3xl font-bold text-gray-800"><?php echo $total_orders; ?></p>
    </div>

    <div class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-xl font-semibold mb-2">Pending Orders</h2>
        <p class="text-3xl font-bold text-banana-dark"><?php echo $pending_orders; ?></p>
    </div>

    <div class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-xl font-semibold mb-2">Total Revenue</h2>
        <p class="text-3xl font-bold text-gray-800">৳<?php echo number_format($total_revenue, 2); ?></p>
    </div>

    <div class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-xl font-semibold mb-2">Menu Items</h2>
        <p class="text-3xl font-bold text-gray-800"><?php echo $menu_items; ?></p>
    </div>

</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-6">
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-xl font-semibold mb-4">Daily Sales (Last 7 Days)</h2>
        <canvas id="daily-sales-chart"></canvas>
    </div>
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-xl font-semibold mb-4">Top 5 Best-Selling Products</h2>
        <canvas id="top-products-chart"></canvas>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Daily Sales Chart
    const dailySalesCtx = document.getElementById('daily-sales-chart').getContext('2d');
    new Chart(dailySalesCtx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($daily_sales_labels); ?>,
            datasets: [{
                label: 'Daily Sales',
                data: <?php echo json_encode($daily_sales_data); ?>,
                backgroundColor: 'rgba(212, 175, 55, 0.7)',
                borderColor: 'rgba(212, 175, 55, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Top Products Chart
    const topProductsCtx = document.getElementById('top-products-chart').getContext('2d');
    new Chart(topProductsCtx, {
        type: 'pie',
        data: {
            labels: <?php echo json_encode($top_products_labels); ?>,
            datasets: [{
                label: 'Top 5 Products',
                data: <?php echo json_encode($top_products_data); ?>,
                backgroundColor: [
                    'rgba(247, 220, 111, 0.7)',
                    'rgba(244, 208, 63, 0.7)',
                    'rgba(212, 175, 55, 0.7)',
                    'rgba(139, 69, 19, 0.7)',
                    'rgba(250, 240, 230, 0.7)'
                ],
                borderColor: [
                    'rgba(247, 220, 111, 1)',
                    'rgba(244, 208, 63, 1)',
                    'rgba(212, 175, 55, 1)',
                    'rgba(139, 69, 19, 1)',
                    'rgba(250, 240, 230, 1)'
                ],
                borderWidth: 1
            }]
        }
    });
</script>

<?php include 'includes/footer.php'; ?>