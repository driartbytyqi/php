<?php
$host = 'localhost';  // Database server
$user = 'root';       // Database username
$pass = '';           // Database password (leave empty if not set)
$dbname = 'real_estate'; // Database name

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Could not connect to the database $dbname :" . $e->getMessage());
}
?>
