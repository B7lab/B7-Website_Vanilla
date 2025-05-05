<?php

function getDatabaseConnection() {
    static $pdo = null;
echo("test");
    if ($pdo === null) {
        $host = $_ENV['DB_HOST'];
        $dbname = $_ENV['DB_NAME'];
        $user = $_ENV['DB_USER'];
        $pass = $_ENV['DB_PASS'];
        $charset = $_ENV['DB_CHARSET']; 

        $dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ];

        try {
            $pdo = new PDO($dsn, $user, $pass, $options);
        } catch (PDOException $e) {
            http_response_code(500);
            die("Datenbankverbindung fehlgeschlagen: " . $e->getMessage());
        }
    }

    return $pdo;
}
