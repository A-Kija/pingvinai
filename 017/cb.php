<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $count = count($_POST['cb'] ?? []);
    header('Location: http://localhost/pingvinai/017/cb.php?c='.$count);
    die;
}

if (isset($_GET['c'])) {
    $color = 'white';
    $show = $_GET['c'];
}
else {
    $color = 'black';
    $letters = range('A', 'J');
    $count = rand(3, 10);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CB</title>
</head>

<body style="background: <?= $color ?>">

    <?php if(isset($show)) : ?>

    <h1> CHECKED: <?= $show ?> </h1>

    <?php else : ?>

    <form action="http://localhost/pingvinai/017/cb.php" method="post">

        <?php for($i = 0; $i < $count; $i++) : ?>

        <h2>
            <input type="checkbox" name="cb[]" value="<?= $letters[$i] ?>">
            <label style="color: orange;"><?= $letters[$i] ?></label>
        </h2>

        <?php endfor ?>

        <button type="submit">GO</button>

    </form>

    <?php endif ?>

</body>

</html>