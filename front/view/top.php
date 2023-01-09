<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageTitle ?? 'Untitled Page' ?></title>
    <script src="<?= URL . 'app.js' ?>"></script>
    <link rel="stylesheet" href="<?= URL . 'app.css' ?>">
</head>
<body>
    <?php if(isset($message)) :?>

    <h2 class="<?= $message['type'] ?>"><?= $message['text'] ?></h2>

    <?php endif ?>
    
