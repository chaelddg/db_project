
<nav class="navbar navbar-default" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-3">
            <span class="sr-only">Toggle navigation</span>
        </button>
        <a class="navbar-brand" href="index.php">LRA</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="navbar-collapse-3">
        <ul class="nav navbar-nav navbar-right">
            <?php

                if (isset($_SESSION['username'])) {

                    echo "<li><a href='admin-page.php'>You are Logged In as {$_SESSION['firstname']} </a></li>";
                    echo "<li><a href='logout.php'>Log out</a></li>";

                }
                else {
                    echo "";
                }

             ?>
        </ul>
    </div><!-- /.navbar-collapse -->
</nav>
