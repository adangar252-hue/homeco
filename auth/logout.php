<?php
require '../config/db.php';

session_destroy();

header('Location: ../guest/index.php');

exit;
?>