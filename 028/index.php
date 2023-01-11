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

// SKAITYMAS
// SELECT column1, column2, ...
// FROM table_name;

// INNER
// SELECT column_name(s)
// FROM table1
// INNER JOIN table2
// ON table1.column_name = table2.column_name;


$sql = "
    SELECT t.id, t.title, types.title AS type, height
    FROM trees AS t
    RIGHT JOIN types
    ON t.type_id = types.id
";



// $sql = "
//     SELECT id, title, height, type
//     FROM trees
// ";

// $sql = "
//     SELECT id, title, height
//     FROM trees
//     ORDER BY title, height DESC
// ";

// $sql = "
//     SELECT id, title, height, type
//     FROM trees
//     WHERE title = 'Obelis' OR title = 'Pušis'
// ";

// $sql = "
//     SELECT id, title, height, type
//     FROM trees
//     WHERE height > 10 AND title = 'Bannana'
// ";

// $sql = "
//     SELECT id, title, height, type
//     FROM trees
//     LIMIT 3
// ";

// $sql = "
//     SELECT id, title, height, type
//     FROM trees
//     WHERE title LIKE '%p%'
// ";

$nice = ['Obelis', 'Agrastas'];

$nice = array_map(fn($t) => "'".$t."'", $nice);

$niceLine = implode(',', $nice);

// $sql = "
//     SELECT id, title, height, type
//     FROM trees
//     WHERE title IN ($niceLine)
// ";

// $sql = "
//     SELECT DISTINCT title
//     FROM trees
// ";

$stmt = $pdo->query($sql);

$trees = $stmt->fetchAll();


//SUM
// SELECT SUM(column_name)
// FROM table_name
// WHERE condition;

$sql = "
    SELECT SUM(height) AS sum, AVG(height) AS avg, COUNT(id) AS `all`
    FROM trees
";

$stmt = $pdo->query($sql);

$ag = $stmt->fetch();


$sql = "
    SELECT types.title, SUM(height) AS sum, COUNT(t.id) AS `count`
    FROM trees AS t
    INNER JOIN types
    ON t.type_id = types.id
    GROUP BY types.title
";

$stmt = $pdo->query($sql);

$group = $stmt->fetchAll();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Rorest OR Garden?</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-4">
                <div class="card m-4">
                    <div class="card-header">
                        Plant Tree
                    </div>
                    <div class="card-body">
                        <div>
                            <pre><code><?= $_SESSION['csql'] ?? '' ?></code></pre>
                        </div>
                        <form action="http://localhost/pingvinai/028/create.php" method="post">
                            <div class="mb-3">
                                <label class="form-label">Title</label>
                                <input type="text" name="title" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">height</label>
                                <input type="text" name="height" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Type</label>
                                <select class="form-select" name="type_id">
                                    <option value="1">Lapuotis</option>
                                    <option value="2">Spygliuotis</option>
                                    <option value="5">Palmė</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-outline-warning m-3">Plant Tree</button>
                        </form>
                    </div>
                </div>
                <div class="card m-4">
                    <div class="card-header">
                        Grow Tree
                    </div>
                    <div class="card-body">
                        <div>
                            <pre><code><?= $_SESSION['esql'] ?? '' ?></code></pre>
                        </div>
                        <form action="http://localhost/pingvinai/028/edit.php" method="post">
                            <div class="mb-3">
                                <label class="form-label">height</label>
                                <input type="text" name="height" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">ID</label>
                                <input type="text" name="id" class="form-control">
                            </div>

                            <button type="submit" class="btn btn-outline-success m-3">Grow Tree</button>
                        </form>
                    </div>
                </div>
                <div class="card m-4">
                    <div class="card-header">
                        Cut Tree
                    </div>
                    <div class="card-body">
                        <div>
                            <pre><code><?= $_SESSION['dsql'] ?? '' ?></code></pre>
                        </div>
                        <form action="http://localhost/pingvinai/028/delete.php" method="post">
                            <div class="mb-3">
                                <label class="form-label">ID</label>
                                <input type="text" name="id" class="form-control">
                            </div>

                            <button type="submit" class="btn btn-outline-danger m-3">Cut Tree</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-8">
                <div class="card m-4">
                    <div class="card-header">
                        Trees
                    </div>
                    <div class="card-body">
                        <div>
                            <pre><code><?= $sql ?></code></pre>
                        </div>
                        <ul class="list-group">
                            <?php foreach ($trees as $tree) : ?>
                            <li class="list-group-item">
                                <b>ID: <?= $tree['id'] ?? '*' ?></b>
                                <h2 style="display: inline-block;"><?= $tree['title'] ?></h2>
                                <i><?= $tree['height'] ?? '*' ?>m.</i>
                                <u><?= $tree['type'] ?? '*'  ?></u>
                            </li>
                            <?php endforeach ?>
                        </ul>
                        <ul class="list-group mt-4">
                            <?php foreach ($group as $type) : ?>
                            <li class="list-group-item">
                                <b>TYPE: <?= $type['title'] ?? '*' ?></b>
                                <u><?= $type['count'] ?? '*'  ?>vnt</u>
                                <u><?= $type['sum'] ?? '*'  ?>m</u>
                            </li>
                            <?php endforeach ?>
                        </ul>
                        <h3 class="m-3">ALL: <?= $ag['all'] ?>vnt, AVG: <?= $ag['avg'] ?>m, SUM: <?= $ag['sum'] ?>m</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>