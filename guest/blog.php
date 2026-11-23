<?php
require '../config/db.php';

$pageTitle = 'Blog';

require '../config/header.php';

$rows = $pdo->query(
    'SELECT * FROM blog_posts ORDER BY id DESC'
)->fetchAll();
?>

<div class="page-head">

    <div class="eyebrow">BLOG</div>

    <h1>Interior Design Blog</h1>

</div>

<section class="section">

    <div class="blog-grid">

        <?php foreach ($rows as $r): ?>

            <article class="image-card">

                <img src="../assets/images/<?= e($r['image']) ?>">

                <div class="inside">

                    <h3>
                        <?= e($r['title']) ?>
                    </h3>

                    <p>
                        <?= e($r['content']) ?>
                    </p>

                    <a
                        class="btn"
                        href="post.php?id=<?= $r['id'] ?>"
                    >
                        READ MORE
                    </a>

                </div>

            </article>

        <?php endforeach; ?>

    </div>

</section>

<?php
require '../config/footer.php';
?>