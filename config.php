<?php
session_start();

$host = 'localhost';
$db   = 'catanduanes_tourism';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    die('Database connection failed: ' . htmlspecialchars($e->getMessage()));
}

function is_logged_in(): bool {
    return isset($_SESSION['user_id']);
}

function is_admin(): bool {
    return isset($_SESSION['role']) && $_SESSION['role'] === 'admin';
}

function redirect(string $url): void {
    header('Location: ' . $url);
    exit;
}

/**
 * Send verification email with the provided code
 * 
 * @param string $to Recipient email address
 * @param string $name Recipient name
 * @param string $verificationCode The verification code to send
 * @return bool True if the email was sent successfully, false otherwise
 */
