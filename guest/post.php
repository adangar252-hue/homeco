<?php
require '../config/db.php';

$id = (int) ($_GET['id'] ?? 0);

$s = $pdo->prepare(
    'SELECT * FROM blog_posts WHERE id=?'
);

$s->execute([$id]);

$r = $s->fetch();

if (!$r) {
    header('Location: blog.php');
    exit;
}

$pageTitle = $r['title'];

require '../config/header.php';
?>

<div class="page-head">

    <div class="eyebrow">SINGLE POST</div>

    <h1><?= e($r['title']) ?></h1>

</div>

<section class="section split">

    <img src="../assets/images/<?= e($r['image']) ?>">

    <div>

        <p>
            <?= nl2br(e($r['content'])) ?>
        </p>

        <p>
            Interior design combines planning, materials, furniture,
            lighting and decoration to create a functional and beautiful home.
        </p>

    </div>

</section>

<?php
require '../config/footer.php';
?>