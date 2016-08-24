<?php

$host = 'localhost';
$database = 'todo';
$username = 'root';
$password = 'password';
$db;

try {
    $db = new PDO('mysql:host=' . $host . ';dbname=' . $database, $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $db->exec("SET NAMES 'utf8'");
} catch(Exception $e){
    echo $e->getMessage();
    exit;
}

 ?>
