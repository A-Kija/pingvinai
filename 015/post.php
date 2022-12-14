<?php
session_start();


// POST scenarijus
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $rez = $_POST['x'] + $_POST['y'];
    $_SESSION['saugau'] = 'Dramblys';
    $_SESSION['mano_suma'] = $rez;
    header('Location: http://localhost/pingvinai/015/post.php');
    die;
}


// GET scenarijus
$rez = $_SESSION['mano_suma'] ?? 'nieko dar nėra';
unset($_SESSION['mano_suma']);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sumator</title>
</head>
<body>
    <h1><?= $rez ?></h1>
    <form action="http://localhost/pingvinai/015/post.php?var=varna" method="post">
        <input type="hidden" name="want" value="logout">
        <input type="text" name="x"> + <input type="text" name="y">
        <br/><br/>
        <button type="submit">make sum</button>
    </form>
</body>
</html>