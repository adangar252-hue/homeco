<?php
require '../config/db.php';

$err = '';

$redirect = $_POST['redirect'] ?? $_GET['redirect'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $s = $pdo->prepare(
        'SELECT * FROM users WHERE email=? AND password=?'
    );

    $s->execute([
        $_POST['email'],
        hash('sha256', $_POST['password'])
    ]);

    $u = $s->fetch();

    if ($u) {

        $_SESSION['user'] = $u;

        // Contact Us પરથી login કર્યું હોય તો પાછા Contact Us
        if ($redirect === 'contact') {
            header('Location: ../guest/contact.php');
        }
        // Admin
        elseif ($u['role'] === 'admin') {
            header('Location: ../admin/dashboard.php');
        }
        // Normal User
        else {
            header('Location: ../user/dashboard.php');
        }

        exit;
    }

    $err = 'Invalid email or password';
}

$pageTitle = 'Login';

require '../config/header.php';
?>

<div class="auth-wrap">

    <div class="form-box">

        <h2>LOGIN</h2>

        <?php if ($err): ?>
            <div class="alert">
                <?= e($err) ?>
            </div>
        <?php endif; ?>

        <form method="post">

            <!-- Login પછી ક્યાં જવું તે યાદ રાખશે -->
            <input
                type="hidden"
                name="redirect"
                value="<?= e($redirect) ?>"
            >

            <input
                type="email"
                name="email"
                placeholder="Email"
                required
            >

           
<div class="password-row">
    <input
        type="password"
        name="password"
        placeholder="Password"
        required
    >
</div>


            <button class="btn" type="submit">
                LOGIN
            </button>

        </form>
    <p>
        <a href="register.php?redirect=contact">Create account</a>
    ·
        <a href="forgot.php">Forgot Password?</a>
    </p>

    </div>

</div>

<?php require '../config/footer.php'; ?>