<?php

define('COLORS', [
    'pink',
    'crimson',
    'skyblue',
    'green',
    'yellow'
]);

if (preg_match('/^[0-9a-f]{6}/', $_GET['color'] ?? '')) {
    $color = '#'.$_GET['color'];
} elseif(in_array($_GET['color'] ?? '', COLORS)) {
    $color = $_GET['color'];
} else {
    header('Location: http://localhost/pingvinai/015/error.php');
    // header('Location: http://localhost/pingvinai/015/get.php?color=crimson');
    die;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>

    <div class="sq" style="background: <?= $color ?>;">
        <?= $color ?>
    </div>

    <form action="http://localhost/pingvinai/015/get.php" method="get">
        <input type="text" name="color">
        <button type="submit">GO!</button>
    </form>
</body>
</html>