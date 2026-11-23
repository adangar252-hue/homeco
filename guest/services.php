<?php
require '../config/db.php';

$pageTitle = 'Our Services';

require '../config/header.php';

$rows = $pdo->query(
    'SELECT * FROM services ORDER BY id DESC'
)->fetchAll();
?>

<div class="page-head">

    <div class="eyebrow">OUR SERVICES</div>

    <h1>Our Services</h1>

</div>

<section class="section">

    <div class="service-grid">

        <?php foreach ($rows as $r): ?>

            <div class="image-card">

                <img src="../assets/images/<?= e($r['image']) ?>">

                <div class="inside">

                    <h3>
                        <?= e($r['title']) ?>
                    </h3>

                    <p>
                        <?= e($r['description']) ?>
                    </p>

                    <a class="btn" href="contact.php">
                        CONTACT US
                    </a>

                </div>

            </div>

        <?php endforeach; ?>

    </div>

</section>

<?php
require '../config/footer.php';
?>