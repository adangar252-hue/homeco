<?php
require '../config/db.php';
requireAdmin();

if (isset($_GET['close'])) {

    $pdo->prepare(
        'UPDATE enquiries SET status="closed" WHERE id=?'
    )->execute([(int)$_GET['close']]);

    header('Location: messages.php');
    exit;
}

$rows = $pdo->query(
    'SELECT * FROM enquiries ORDER BY id DESC'
)->fetchAll();

$pageTitle = 'Messages';

require '../config/header.php';
?>

<div class="dashboard">

    <aside class="side">

        <h2>HOMCO ADMIN</h2>

        <a href="dashboard.php">Dashboard</a>
        <a href="users.php">Users</a>
        <a href="services.php">Services</a>
        <a href="projects.php">Projects</a>
        <a href="messages.php">Messages</a>
        <a href="../auth/logout.php">Logout</a>

    </aside>

    <main class="dash-main">

        <h1>Contact Enquiries</h1>

        <table class="table">

            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Message</th>
                <th>Status</th>
            </tr>

            <?php foreach ($rows as $r): ?>

                <tr>

                    <td>
                        <?= e($r['name']) ?>
                    </td>

                    <td>
                        <?= e($r['email']) ?>
                    </td>

                    <td>
                        <?= e($r['phone']) ?>
                    </td>

                    <td>
                        <?= e($r['message']) ?>
                    </td>

                    <td>
                        <a
                            class="tag"
                            href="?close=<?= e($r['id']) ?>"
                            onclick="return confirm('Close this enquiry?')"
                        >
                            <?= e($r['status']) ?>
                        </a>
                    </td>

                </tr>

            <?php endforeach; ?>

        </table>

    </main>

</div>

<?php
require '../config/footer.php';
?>