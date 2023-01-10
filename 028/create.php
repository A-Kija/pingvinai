<?php
session_start();
$host = '127.0.0.1';
$db   = 'miskas';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

$pdo = new PDO($dsn, $user, $pass, $options);

// INSERT INTO table_name (column1, column2, column3, ...)
// VALUES (value1, value2, value3, ...);

// $sql = "
//     INSERT INTO `trees`
//     (title, height, type)
//     VALUES ('". $_POST['title'] ."', ". $_POST['height'] .", ". $_POST['type'] .")
// ";

$sql = "
    INSERT INTO `trees`
    (title, height, type)
    VALUES (:t, :h, :type)
";
$_SESSION['csql'] = $sql;


// $pdo->query($sql);
$stmt = $pdo->prepare($sql);
$stmt->execute([
    'type' => $_POST['type'],
    'h' => $_POST['height'],
    't' => $_POST['title']
]);

header('Location: http://localhost/pingvinai/028/');