<?php
require '../config/db.php';

/* Login check */
if (!isLogin()) {
    header('Location: ../auth/login.php?redirect=contact');
    exit;
}

$msg = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $s = $pdo->prepare(
        'INSERT INTO enquiries(name,email,phone,message,status)
         VALUES(?,?,?,?,?)'
    );

    $s->execute([
        $_POST['name'],
        $_POST['email'],
        $_POST['phone'],
        $_POST['message'],
        'open'
    ]);

    $msg = 'Your enquiry has been sent successfully.';
}

$pageTitle = 'Contact Us';

require '../config/header.php';
?>

<div class="page-head">
    <div class="eyebrow">CONTACT US</div>
    <h1>Lets Change Your Home</h1>
</div>

<section class="section">

    <div class="form-box" style="margin:auto;max-width:650px">

        <?php if ($msg): ?>
            <div class="tag">
                <?= e($msg) ?>
            </div>
        <?php endif; ?>

        <form method="post">

            <input
                name="name"
                placeholder="Name"
                required
            >

            <input
                name="email"
                type="email"
                placeholder="Email"
                required
            >

            <input
                name="phone"
                placeholder="Phone"
            >

            <textarea
                name="message"
                rows="6"
                placeholder="Your message"
                required
            ></textarea>

            <button class="btn" type="submit">
                SEND MESSAGE
            </button>

        </form>

    </div>

</section>

<?php require '../config/footer.php'; ?>