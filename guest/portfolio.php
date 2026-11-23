<?php
require '../config/db.php';

$pageTitle = 'Portfolio Gallery';

require '../config/header.php';

$imgs = [
    'img13.jpeg',
    'img7.jpeg',
    'img11.jpeg',
    'img16.jpeg',
    'img2.jpeg',
    'img24.jpeg',
    'img6.jpeg',
    'img41.jpeg',
    'img25.jpeg',
    'img31.jpeg',
    'img39.jpeg',
    'img47.jpeg',
    'img50.jpeg',
    'img53.jpeg',
    'img57.jpeg'
];
?>

<div class="page-head">

    <div class="eyebrow">PORTFOLIO GALLERY</div>

    <h1>Our Recent Work</h1>

</div>

<section class="section">

    <div
        class="gallery"
        style="grid-template-columns:repeat(3,1fr)"
    >

        <?php foreach ($imgs as $im): ?>

            <img
                style="height:240px"
                src="../assets/images/<?= $im ?>"
            >

        <?php endforeach; ?>

    </div>

</section>

<?php
require '../config/footer.php';
?>