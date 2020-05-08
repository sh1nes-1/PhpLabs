<?php
$serverhost = "localhost";    
$username = "root";
$password = "";    
$dbname = "lab6";

$dsn = "mysql:host=$serverhost;dbname=$dbname";

$db = null;

try {
    $db = new PDO($dsn, $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Database connection failed: ' . $e->getMessage());
}