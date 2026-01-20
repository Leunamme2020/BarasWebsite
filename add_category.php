<?php
require_once __DIR__ . '/config.php';

try {
    $pdo->exec("ALTER TABLE culture ADD COLUMN category VARCHAR(255) DEFAULT NULL AFTER festival_date");
    echo "Category column added successfully to culture table!";
} catch (PDOException $e) {
    echo "Error adding category column: " . $e->getMessage();
}
?>
