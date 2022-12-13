<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    



<?php


echo '<pre>';


print_r($_GET);

?>

<a href="http://localhost/pingvinai/014/get.php?color=skyblue&text=blue">BLUE</a>
<a href="http://localhost/pingvinai/014/get.php?color=crimson&text=red">RED</a>
<a href="http://localhost/pingvinai/014/get.php?color=black">RESET</a>

<form action="http://localhost/pingvinai/014/get.php">

    <input type="text" name="color">
    <input type="text" name="text">

    <button type="submit">GO</button>
</form>


<h1 style="color:<?= $_GET['color'] ?? '#000' ?>;"><?= $_GET['text'] ?? 'no no' ?></h1>



</body>
</html>