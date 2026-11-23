<?php
require '../config/db.php';

requireLogin();

$pageTitle = 'User Dashboard';

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

        <a href="../guest/services.php">
            Services
        </a>

        <a href="../guest/projects.php">
            Projects
        </a>

        <a href="../guest/contact.php">
            Contact
        </a>

        <a href="../auth/logout.php">
            Logout
        </a>

    </aside>

    <main class="dash-main">

        <h1>
            Welcome, <?= e($_SESSION['user']['name']) ?>
        </h1>

        <div class="kpis">

            <div class="kpi">

                <b>Design</b>

                <p>
                    Explore services
                </p>

            </div>

            <div class="kpi">

                <b>Projects</b>

                <p>
                    View portfolio
                </p>

            </div>

            <div class="kpi">

                <b>Profile</b>

                <p>
                    Update details
                </p>

            </div>

            <div class="kpi">

                <b>Support</b>

                <p>
                    Contact team
                </p>

            </div>

        </div>

    </main>

</div>

<?php
require '../config/footer.php';
?>