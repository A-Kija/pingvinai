<?php
$id = (int) $_GET['id'];
foreach (unserialize(file_get_contents(__DIR__ . '/data')) as $user) {
    if ($user['id'] == $id) {
    break;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BANK</title>
</head>

<body>
    <ul style="background: gray;">

        <li>
            <span style="color:<?= $user['color'] ?>;"><?= $user['name'] ?> TREES: <?= $user['trees'] ?></span>
            <form action="http://localhost/pingvinai/019/bank/add.php?id=<?= $user['id'] ?>" method="post">
                <input type="text" name="trees">
                <button type="submit">ADD</button>
            </form>
        </li>

    </ul>
</body>

</html>