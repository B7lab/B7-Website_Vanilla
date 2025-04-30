<?php

try {
    $host = 'localhost';
    $db = 'b7_website'; 
    $user = 'webuser';
    $pass = 'af5jtcs3Gzwr';
    $charset = 'utf8mb4'; 
    
    $conn = new PDO("mysql:host=$host;dbname=$db;charset=$charset", $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ]);

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