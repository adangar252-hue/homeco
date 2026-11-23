<?php
require '../config/db.php';

requireLogin();

$msg = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $s = $pdo->prepare(
        'UPDATE users SET name=?,email=? WHERE id=?'
    );

    $s->execute([
        $_POST['name'],
        $_POST['email'],
        $_SESSION['user']['id']
    ]);

    $_SESSION['user']['name'] = $_POST['name'];
    $_SESSION['user']['email'] = $_POST['email'];

    $msg = 'Profile updated';
}

$pageTitle = 'My Profile';

require '../config/header.php';
?>

<div class="dashboard">

    <aside class="side">

        <h2>HOMCO USER</h2>

        <a href="dashboard.php">
            Dashboard
        </a>

        <a href="profile.php">
            My Profile
        </a>

        <a href="../auth/logout.php">
            Logout
        </a>

    </aside>

    <main class="dash-main">

        <div class="form-box">

            <h2>MY PROFILE</h2>

            <?php if ($msg): ?>

                <div class="tag">
                    <?= e($msg) ?>
                </div>

            <?php endif; ?>

            <form method="post">

                <input
                    name="name"
                    value="<?= e($_SESSION['user']['name']) ?>"
                >

                <input
                    name="email"
                    type="email"
                    value="<?= e($_SESSION['user']['email']) ?>"
                >

                <button class="btn">
                    SAVE
                </button>

            </form>

        </div>

    </main>

</div>

<?php
require '../config/footer.php';
?>