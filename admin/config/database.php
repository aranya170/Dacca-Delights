<?php

/**
 * Database Configuration for Dacca Delights POS System
 * Created: October 12, 2025
 */

class Database
{
    private $host = "localhost";
    private $db_name = "dacca_delights_pos";
    private $username = "root";  // Change this to your MySQL username
    private $password = "";      // Change this to your MySQL password
    private $conn;

    public function getConnection()
    {
        $this->conn = null;

        try {
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->db_name . ";charset=utf8mb4",
                $this->username,
                $this->password,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => false
                ]
            );
        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->conn;
    }
}

/**
 * Response helper function
 */
if (!function_exists('sendJsonResponse')) {
    function sendJsonResponse($data, $status_code = 200)
    {
        http_response_code($status_code);
        header('Content-Type: application/json');
        echo json_encode($data);
        exit;
    }
}

/**
 * Error handler function
 */
if (!function_exists('handleError')) {
    function handleError($message, $status_code = 500)
    {
        sendJsonResponse(['error' => true, 'message' => $message], $status_code);
    }
}