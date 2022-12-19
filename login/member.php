<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: http://localhost/pingvinai/login/login.php');
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
    <title>Member</title>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1>Welcome to Member page, <?= $_SESSION['user']['name'] ?></h1>
                <form action="http://localhost/pingvinai/login/login.php?logout" method="post">
                    <button type="submit" class="btn btn-outline-info mt-4">Log Out</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>