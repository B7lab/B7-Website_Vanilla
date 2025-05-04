<?php

try {
    $host = $_ENV['DB_HOST'];
    $db = $_ENV['DB_NAME'];
    $user =  $_ENV['DB_USER'];
    $pass =  $_ENV['DB_PASS'];
    $charset = $_ENV['DB_CHARSET']; 
    
    $emailFrom = 'admin@warehouse.com';
    $useInternalMailer = false;
    
    $pepper = $_ENV['PEPPER'];

    session_start();

    $conn = new PDO("mysql:host=$host;dbname=$db;charset=$charset", $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ]);
    $conn->exec("SET NAMES 'utf8'");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if($conn) {
        echo "Connection successful!";
    } else {
        echo "Connection failed!";
    }   

} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit;
}