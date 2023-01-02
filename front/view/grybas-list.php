<h1>Grybai Visi</h1>
<ul>

<?php foreach($grybai as $grybas) : ?>


<li>
    <b>id: <?= $grybas['id'] ?></b> <?= $grybas['title'] ?> <?= $grybas['color'] ?> <?= $grybas['weight'] ?>
    <a href="<?= URL . 'grybai/edit/'. $grybas['id'] ?>">Redaguoti</a>
    <form action="<?= URL . 'grybai/delete/'. $grybas['id'] ?>" method="post">
        <button type="submit">Trinti</button>
    </form>
</li>


<?php endforeach ?>


</ul>