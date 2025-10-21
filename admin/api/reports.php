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
    $report_type = $_GET['type'] ?? 'daily';
    $date = $_GET['date'] ?? date('Y-m-d');

    if ($report_type === 'daily') {
        // Daily sales report
        $sales_query = "SELECT * FROM daily_sales WHERE sale_date = ?";
        $sales_stmt = $db->prepare($sales_query);
        $sales_stmt->execute([$date]);
        $daily_sales = $sales_stmt->fetch();

        // Get detailed orders for the day
        $orders_query = "
            SELECT o.*, COUNT(oi.id) as item_count
            FROM orders o
            LEFT JOIN order_items oi ON o.id = oi.order_id
            WHERE DATE(o.created_at) = ?
            GROUP BY o.id
            ORDER BY o.created_at DESC
        ";
        $orders_stmt = $db->prepare($orders_query);
        $orders_stmt->execute([$date]);
        $orders = $orders_stmt->fetchAll();

        // Get top selling items
        $top_items_query = "
            SELECT oi.item_name, 
                   SUM(oi.quantity) as total_quantity,
                   SUM(oi.subtotal) as total_revenue,
                   COUNT(DISTINCT oi.order_id) as order_count
            FROM order_items oi
            JOIN orders o ON oi.order_id = o.id
            WHERE DATE(o.created_at) = ?
            GROUP BY oi.menu_item_id, oi.item_name
            ORDER BY total_quantity DESC
            LIMIT 10
        ";
        $top_items_stmt = $db->prepare($top_items_query);
        $top_items_stmt->execute([$date]);
        $top_items = $top_items_stmt->fetchAll();

        sendJsonResponse([
            'success' => true,
            'report_type' => 'daily',
            'date' => $date,
            'summary' => $daily_sales ?: [
                'sale_date' => $date,
                'total_orders' => 0,
                'total_revenue' => 0,
                'total_vat' => 0,
                'cash_sales' => 0,
                'card_sales' => 0,
                'mobile_sales' => 0
            ],
            'orders' => $orders,
            'top_selling_items' => $top_items
        ]);

    } else if ($report_type === 'weekly') {
        // Weekly sales report
        $start_date = date('Y-m-d', strtotime($date . ' -7 days'));
        $end_date = $date;

        $weekly_query = "
            SELECT sale_date,
                   total_orders,
                   total_revenue,
                   cash_sales,
                   card_sales,
                   mobile_sales
            FROM daily_sales
            WHERE sale_date BETWEEN ? AND ?
            ORDER BY sale_date
        ";
        $weekly_stmt = $db->prepare($weekly_query);
        $weekly_stmt->execute([$start_date, $end_date]);
        $weekly_data = $weekly_stmt->fetchAll();

        // Calculate weekly totals
        $weekly_totals = [
            'total_orders' => 0,
            'total_revenue' => 0,
            'total_vat' => 0,
            'cash_sales' => 0,
            'card_sales' => 0,
            'mobile_sales' => 0
        ];

        foreach ($weekly_data as $day) {
            $weekly_totals['total_orders'] += $day['total_orders'];
            $weekly_totals['total_revenue'] += $day['total_revenue'];
            $weekly_totals['cash_sales'] += $day['cash_sales'];
            $weekly_totals['card_sales'] += $day['card_sales'];
            $weekly_totals['mobile_sales'] += $day['mobile_sales'];
        }

        sendJsonResponse([
            'success' => true,
            'report_type' => 'weekly',
            'start_date' => $start_date,
            'end_date' => $end_date,
            'daily_breakdown' => $weekly_data,
            'weekly_totals' => $weekly_totals
        ]);

    } else if ($report_type === 'monthly') {
        // Monthly sales report
        $month = $_GET['month'] ?? date('Y-m');

        $monthly_query = "
            SELECT 
                SUM(total_orders) as total_orders,
                SUM(total_revenue) as total_revenue,
                SUM(cash_sales) as cash_sales,
                SUM(card_sales) as card_sales,
                SUM(mobile_sales) as mobile_sales,
                AVG(total_orders) as avg_daily_orders,
                AVG(total_revenue) as avg_daily_revenue
            FROM daily_sales
            WHERE sale_date LIKE ?
        ";
        $monthly_stmt = $db->prepare($monthly_query);
        $monthly_stmt->execute([$month . '%']);
        $monthly_totals = $monthly_stmt->fetch();

        // Get daily breakdown for the month
        $daily_query = "
            SELECT * FROM daily_sales
            WHERE sale_date LIKE ?
            ORDER BY sale_date
        ";
        $daily_stmt = $db->prepare($daily_query);
        $daily_stmt->execute([$month . '%']);
        $daily_breakdown = $daily_stmt->fetchAll();

        sendJsonResponse([
            'success' => true,
            'report_type' => 'monthly',
            'month' => $month,
            'monthly_totals' => $monthly_totals,
            'daily_breakdown' => $daily_breakdown
        ]);
    }

} catch(Exception $e) {
    handleError("Error generating report: " . $e->getMessage());
}
?>