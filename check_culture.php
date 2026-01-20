<?php
$pdo = new PDO('mysql:host=localhost;dbname=catanduanes_tourism', 'root', '');
$stmt = $pdo->query("SELECT * FROM culture");
while($row = $stmt->fetch()) {
    echo 'ID: ' . $row['id'] . ', Title: ' . $row['title'] . ', Image: ' . $row['image'] . ', Date: ' . $row['festival_date'] . PHP_EOL;
}
?>
