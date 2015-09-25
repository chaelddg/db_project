 <?php include('./includes/header.php'); ?>

    <?php
        session_start();

        if ($_SESSION['username']) {
            include('./includes/dashboard-header.php');
            include('./includes/dashboard-body.php');
        }
        else
            die("<a href='index.php'>Click</a> to Log in");
     ?>

 <?php include('./includes/footer.php'); ?>