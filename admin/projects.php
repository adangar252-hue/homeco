<?php
require '../config/db.php';
requireAdmin();

if (isset($_GET['delete'])) {
    $pdo->prepare('DELETE FROM projects WHERE id=?')
        ->execute([(int)$_GET['delete']]);

    header('Location: projects.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pdo->prepare(
        'INSERT INTO projects(title,description,image) VALUES(?,?,?)'
    )->execute([
        $_POST['title'],
        $_POST['description'],
        $_POST['image']
    ]);

    header('Location: projects.php');
    exit;
}

$rows = $pdo->query(
    'SELECT * FROM projects ORDER BY id DESC'
)->fetchAll();

$pageTitle = 'Manage Projects';

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

        <h1>Projects</h1>

        <div class="admin-form">

            <form method="post">

                <input
                    name="title"
                    placeholder="Project title"
                    required
                >

                <textarea
                    name="description"
                    placeholder="Description"
                    required
                ></textarea>

                <input
                    name="image"
                    placeholder="Image filename"
                    required
                >

                <button class="btn" type="submit">
                    ADD PROJECT
                </button>

            </form>

        </div>

        <table class="table">

            <tr>
                <th>Title</th>
                <th>Image</th>
                <th>Action</th>
            </tr>

            <?php foreach ($rows as $r): ?>

                <tr>

                    <td>
                        <?= e($r['title']) ?>
                    </td>

                    <td>
                        <?= e($r['image']) ?>
                    </td>

                    <td>
                        <a
                            class="tag"
                            href="?delete=<?= e($r['id']) ?>"
                            onclick="return confirm('Delete this project?')"
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