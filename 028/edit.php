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

// UPDATE table_name
// SET column1 = value1, column2 = value2, ...
// WHERE condition;


// $sql = "
//     UPDATE trees
//     SET height = ".$_POST['height']."
//     WHERE id = ".$_POST['id']
// ;

$sql = "
    UPDATE trees
    SET height = ?
    WHERE id = ?
";


$_SESSION['esql'] = $sql;


// $pdo->query($sql);
$stmt = $pdo->prepare($sql);
$stmt->execute([$_POST['height'], $_POST['id']]);

header('Location: http://localhost/pingvinai/028/');