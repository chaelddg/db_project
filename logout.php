<?php include('./includes/header.php'); ?>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
               <h1>You have logged out</h1>
               <hr>
               <?php
                   session_start();

                   session_destroy();

                   echo "<a href='index.php'>Click To Login</a>";

                ?>
            </div>
        </div>
    </div>

<?php include('./includes/footer.php'); ?>
