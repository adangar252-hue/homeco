<?php
require '../config/db.php';

$err = '';

$redirect = $_POST['redirect'] ?? $_GET['redirect'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if ($_POST['password'] !== $_POST['confirm']) {

        $err = 'Passwords do not match';

    } else {

        try {

            $password = hash('sha256', $_POST['password']);

            $s = $pdo->prepare(
                'INSERT INTO users(name,email,password) VALUES(?,?,?)'
            );

            $s->execute([
                $_POST['name'],
                $_POST['email'],
                $password
            ]);

            // Newly registered user ni details fetch karo
            $userId = $pdo->lastInsertId();

            $s = $pdo->prepare(
                'SELECT * FROM users WHERE id=?'
            );

            $s->execute([$userId]);

            $user = $s->fetch();

            // Automatic Login
            $_SESSION['user'] = $user;

            // Contact Us mathi registration karyu hoy
            if ($redirect === 'contact') {
                header('Location: ../guest/contact.php');
            } else {
                header('Location: ../user/dashboard.php');
            }

            exit;

        } catch (Exception $e) {

            $err = 'Email already registered';
        }
    }
}

$pageTitle = 'Register';

require '../config/header.php';
?>

<div class="auth-wrap">

    <div class="form-box">

        <h2>CREATE ACCOUNT</h2>

        <?php if ($err): ?>
            <div class="alert">
                <?= e($err) ?>
            </div>
        <?php endif; ?>

        <form method="post">

            <!-- Registration pachi kya javanu te save rakhshe -->
            <input
                type="hidden"
                name="redirect"
                value="<?= e($redirect) ?>"
            >

            <input
                name="name"
                placeholder="Full Name"
                required
            >

            <input
                name="email"
                type="email"
                placeholder="Email"
                required
            >

            <input
                name="password"
                type="password"
                placeholder="Password"
                required
            >

            <input
                name="confirm"
                type="password"
                placeholder="Confirm Password"
                required
            >

            <button class="btn" type="submit">
                REGISTER
            </button>

        </form>

    </div>

</div>

<?php require '../config/footer.php'; ?>