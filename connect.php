<?php
$host = '127.0.0.1';
$db   = 'aiwear';
$user = 'root';
$pass = 'root';
$port = "8889";
$charset = 'utf8mb4';

$options = [
    \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
    \PDO::ATTR_EMULATE_PREPARES   => false,
];

$dsn = "mysql:host=$host;dbname=$db;charset=$charset;port=$port";
try {

    $pdo = new \PDO($dsn, $user, $pass, $options);
    //Show the connection status

} catch (\PDOException $e) {
    print_r($e->getMessage());
}
