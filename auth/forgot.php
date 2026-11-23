<?php
require '../config/db.php';

$message = 'Enter your registered email. For this local demo, contact admin to reset the password.';

$pageTitle = 'Forgot Password';

require '../config/header.php';
?>

<div class="auth-wrap">

    <div class="form-box">

        <h2>FORGOT PASSWORD</h2>

        <p>
            <?= $message ?>
        </p>

        <form method="post">

            <input
                type="email"
                placeholder="Email"
                required
            >

            <button class="btn">
                SUBMIT
            </button>

        </form>

    </div>

</div>

<?php
require '../config/footer.php';
?>