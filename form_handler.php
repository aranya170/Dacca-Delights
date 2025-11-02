<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if this is a contact form submission
    if (isset($_POST['message'])) {
        $name = strip_tags(trim($_POST["name"]));
        $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
        $phone = strip_tags(trim($_POST["phone"]));
        $message = strip_tags(trim($_POST["message"]));

        if (empty($name) || empty($message) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            http_response_code(400);
            echo "Please complete the form and try again.";
            exit;
        }

        $recipient = "info@daccadelights.com";
        $subject = "New contact from $name";
        $email_content = "Name: $name\n";
        $email_content .= "Email: $email\n";
        if (!empty($phone)) {
            $email_content .= "Phone: $phone\n";
        }
        $email_content .= "Message:\n$message\n";

        $email_headers = "From: $name <$email>";

        if (mail($recipient, $subject, $email_content, $email_headers)) {
            http_response_code(200);
            echo "Thank You! Your message has been sent.";
        } else {
            http_response_code(500);
            echo "Oops! Something went wrong and we couldn't send your message.";
        }
    } 
    // Handle checkout form submission
    else if (isset($_POST['order_items'])) {
        include 'admin/config/database.php';
        $database = new Database();
        $db = $database->getConnection();

        $name = strip_tags(trim($_POST["name"]));
        $phone = strip_tags(trim($_POST["phone"]));
        $address = strip_tags(trim($_POST["address"]));
        $delivery_instructions = strip_tags(trim($_POST["delivery_instructions"]));
        $order_items = json_decode($_POST['order_items'], true);
        $order_total = strip_tags(trim($_POST['order_total']));

        $email = strip_tags(trim($_POST["email"]));
        $payment_method = strip_tags(trim($_POST["payment_method"]));
        $bkash_transaction_id = strip_tags(trim($_POST["bkash_transaction_id"]));

        if (empty($name) || empty($phone) || empty($address) || empty($email) || empty($order_items)) {
            http_response_code(400);
            echo "Please fill out all required fields and try again.";
            exit;
        }

        $order_number = 'DD' . date('Ymd') . rand(1000, 9999);

        $query = "INSERT INTO orders (order_number, customer_name, customer_phone, email, customer_address, delivery_instructions, total_amount, payment_method, bkash_transaction_id, status) VALUES (:order_number, :customer_name, :customer_phone, :email, :customer_address, :delivery_instructions, :total_amount, :payment_method, :bkash_transaction_id, 'pending')";
        $stmt = $db->prepare($query);

        $stmt->bindParam(':order_number', $order_number);
        $stmt->bindParam(':customer_name', $name);
        $stmt->bindParam(':customer_phone', $phone);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':customer_address', $address);
        $stmt->bindParam(':delivery_instructions', $delivery_instructions);
        $stmt->bindParam(':total_amount', $order_total);
        $stmt->bindParam(':payment_method', $payment_method);
        $stmt->bindParam(':bkash_transaction_id', $bkash_transaction_id);

        if ($stmt->execute()) {
            $order_id = $db->lastInsertId();

            foreach ($order_items as $item) {
                $query = "INSERT INTO order_items (order_id, menu_item_id, item_name, item_price, quantity, subtotal) VALUES (:order_id, :menu_item_id, :item_name, :item_price, :quantity, :subtotal)";
                $stmt = $db->prepare($query);

                $subtotal = $item['price'] * $item['quantity'];

                $stmt->bindParam(':order_id', $order_id);
                $stmt->bindParam(':menu_item_id', $item['id']);
                $stmt->bindParam(':item_name', $item['name']);
                $stmt->bindParam(':item_price', $item['price']);
                $stmt->bindParam(':quantity', $item['quantity']);
                $stmt->bindParam(':subtotal', $subtotal);
                $stmt->execute();
            }

            header("Location: thank_you.php");
            exit;
        } else {
            http_response_code(500);
            echo "Oops! Something went wrong and we couldn't place your order.";
        }
    }
} else {
    http_response_code(403);
    echo "There was a problem with your submission, please try again.";
}