<?php
require '../config/db.php';

requireAdmin();

if (isset($_GET['delete'])) {

    $pdo->prepare(
        'DELETE FROM users WHERE id=? AND role="user"'
    )->execute([
        (int) $_GET['delete']
    ]);

    header('Location: users.php');
    exit;
}

$rows = $pdo->query(
    'SELECT id,name,email,created_at
     FROM users
     WHERE role="user"
     ORDER BY id DESC'
)->fetchAll();

$pageTitle = 'Manage Users';

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

        <h1>Users</h1>

        <table class="table">

            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Created</th>
                <th>Action</th>
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
                        <?= e($r['created_at']) ?>
                    </td>

                    <td>

                        <a
                            class="tag"
                            href="?delete=<?= $r['id'] ?>"
                            onclick="return confirm('Delete user?')"
                        >
                            DELETE
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