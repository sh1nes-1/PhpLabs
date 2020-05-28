<?php
$serverhost = "localhost";    
$username = "root";
$password = "";    
$dbname = "lab10";

$dsn = "mysql:host=$serverhost;dbname=$dbname";

$db;
try {
    $db = new PDO($dsn, $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Database connection failed: ' . $e->getMessage());
}