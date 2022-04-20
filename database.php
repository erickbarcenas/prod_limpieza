<?php

$server = 'localhost';
$username = 'root';
$password = '12345678';
$database = 'promedik_textil'; 

try {
  $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
} catch (PDOException $e) {
  die('Connection Failed: ' . $e->getMessage());
}

?>
