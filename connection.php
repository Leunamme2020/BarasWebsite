<?php
/**
 * Database Connection Configuration
 * Catanduanes Tourism Website
 */

// Database connection parameters
$host = 'sql205.infinityfree.com';
$dbname = 'if0_40891630_catanduanes_tourism';
$username = 'if0_40891630';
$password = ''; // Add your password here if required

// Create PDO connection
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    
    // Set PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Set default fetch mode to associative array
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    
    // Set emulated prepares to false for better security
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    
} catch(PDOException $e) {
    // Log error and display user-friendly message
    error_log("Database Connection Error: " . $e->getMessage());
    
    // Display user-friendly error message
    die("Connection failed. Please try again later.");
}

/**
 * Function to check database connection
 * @return bool
 */
function isDatabaseConnected() {
    global $pdo;
    return $pdo instanceof PDO;
}

/**
 * Function to get database instance
 * @return PDO
 */
function getDatabase() {
    global $pdo;
    return $pdo;
}
?>
