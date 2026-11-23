<?php
require '../config/db.php';

requireAdmin();

$counts = [
    'users' => $pdo->query(
        'SELECT COUNT(*) c FROM users WHERE role="user"'
    )->fetch()['c'],

    'services' => $pdo->query(
        'SELECT COUNT(*) c FROM services'
    )->fetch()['c'],

    'projects' => $pdo->query(
        'SELECT COUNT(*) c FROM projects'
    )->fetch()['c'],

    'messages' => $pdo->query(
        'SELECT COUNT(*) c FROM enquiries'
    )->fetch()['c']
];

$pageTitle = 'Admin Dashboard';

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

        <h1>Admin Dashboard</h1>

        <div class="kpis">

            <div class="kpi">

                <b><?= $counts['users'] ?></b>

                <p>Users</p>

            </div>

            <div class="kpi">

                <b><?= $counts['services'] ?></b>

                <p>Services</p>

            </div>

            <div class="kpi">

                <b><?= $counts['projects'] ?></b>

                <p>Projects</p>

            </div>

            <div class="kpi">

                <b><?= $counts['messages'] ?></b>

                <p>Enquiries</p>

            </div>

        </div>

    </main>

</div>

<?php
require '../config/footer.php';
?>