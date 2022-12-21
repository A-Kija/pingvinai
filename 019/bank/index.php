<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BANK</title>
</head>

<body>
    <h1>DIZAINAS TRAGIŠKAS</h1>
    <ul style="background: gray;">
        <?php foreach (unserialize(file_get_contents(__DIR__ . '/data')) as $user) : ?>
        <li>
            <span style="color:<?= $user['color'] ?>;"><?= $user['name'] ?> TREES: <?= $user['trees'] ?></span>
            <a href="http://localhost/pingvinai/019/bank/add-page.php?id=<?= $user['id'] ?>">[ADD TREES]</a>
            <form action="http://localhost/pingvinai/019/bank/delete.php?id=<?= $user['id'] ?>" method="post">
                <button type="submit">DELETE</button>
            </form>
        </li>
        <?php endforeach ?>
    </ul>
</body>

</html>