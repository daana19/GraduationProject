<?php
$host = 'localhost';
$dbname = 'coffee_shop';
$username = 'root';
$password = '';
$port = 3306; // Add your port number here

try {
    $pub = new PDO("mysql:host=$host;port=$port;dbname=$dbname;charset=utf8", $username, $password);
    $pub->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: ". $e->getMessage());
}
?>