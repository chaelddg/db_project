<?php include('./includes/header.php') ?>

<?php

    session_start();

    include('./includes/nav-header.php');

    if (isset($_SESSION['username'])) {
        include('./admin-page.php');
    }
    else {
        include('./includes/login-body.php');
    }

?>

<?php include('./includes/footer.php') ?>
