<?php
session_start();

$arr = $_SESSION['arr'] ?? [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $d = rand(5, 10);
    $arr[] = $d;
    $_SESSION['arr'] = $arr;
    header('Location: http://localhost/pingvinai/018/k/index2.php');
    die;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document K</title>
</head>
<body>
    <h1>K</h1>
    <ul>
    <?php foreach($arr as $li) : ?>

        <li><?= $li ?></li>

    <?php endforeach ?>
    </ul>
    <form action="http://localhost/pingvinai/018/k/index2.php" method="post">
        <button type="submit">add random</button>
    </form>
    
</body>
</html>