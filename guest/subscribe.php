<?php
require '../config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $s = $pdo->prepare(
        'INSERT IGNORE INTO subscriptions(email) VALUES(?)'
    );

    $s->execute([
        $_POST['email']
    ]);
}

header('Location: index.php');
exit;
?>