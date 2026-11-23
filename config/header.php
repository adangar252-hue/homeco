
<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($pageTitle)) {
    $pageTitle = 'HOMCO Interior';
}

// Get the current PHP page name
$currentPage = basename($_SERVER['SCRIPT_NAME']);

// Check which page is active
function isActivePage($page, $currentPage) {
    return $page === $currentPage ? 'active' : '';
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?= e($pageTitle) ?></title>

    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>

<header class="topbar">

    <a class="logo" href="../guest/index.php">
        ⌂ HOMCO
    </a>

    <nav>

        <a href="../guest/index.php"
           class="<?= isActivePage('index.php', $currentPage) ?>">
            HOME
        </a>

        <a href="../guest/about.php"
           class="<?= isActivePage('about.php', $currentPage) ?>">
            ABOUT US
        </a>

        <a href="../guest/services.php"
           class="<?= isActivePage('services.php', $currentPage) ?>">
            OUR SERVICES
        </a>

        <a href="../guest/projects.php"
           class="<?= isActivePage('projects.php', $currentPage) ?>">
            OUR PROJECTS
        </a>

        <a href="../guest/portfolio.php"
           class="<?= isActivePage('portfolio.php', $currentPage) ?>">
            PORTFOLIO
        </a>

        <a href="../guest/faq.php"
           class="<?= isActivePage('faq.php', $currentPage) ?>">
            FAQ
        </a>

        <a href="../guest/blog.php"
           class="<?= in_array($currentPage, ['blog.php', 'post.php'], true) ? 'active' : '' ?>">
            BLOG
        </a>

        <?php if (isset($_SESSION['user'])): ?>

            <a class="login-link"
               href="<?= $_SESSION['user']['role'] === 'admin'
                   ? '../admin/dashboard.php'
                   : '../user/dashboard.php' ?>">
                DASHBOARD
            </a>

        <?php else: ?>

            <a class="login-link" href="../auth/login.php">
                LOGIN
            </a>

        <?php endif; ?>

       <button class="hamb" id="menuToggle" type="button"
        aria-label="Toggle navigation" aria-expanded="false">
    ☰
       </button>

    </nav>

</header>
