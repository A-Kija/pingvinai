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

// DELETE FROM table_name WHERE condition;



// $sql = "
//     DELETE FROM trees
//     WHERE id = ".$_POST['id']
// ;

$sql = "
    DELETE FROM trees
    WHERE id = ? "
;


$_SESSION['dsql'] = $sql;


// $pdo->query($sql);

$stmt = $pdo->prepare($sql);
$stmt->execute([$_POST['id']]);



header('Location: http://localhost/pingvinai/028/');