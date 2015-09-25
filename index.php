<?php include('./includes/header.php') ?>

 <div class="container">

    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <div class="account-wall">
                <h1 class="text-center">Administrator</h1>
                <form class="form-signin" action="login.php" method="POST">
                    <input type="text" class="form-control" name="username"placeholder="Username" required autofocus>
                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                    <button class="btn btn-lg btn-primary btn-block" type="submit">Log in</button>
                </form>
            </div>
        </div>
    </div>

</div>

<?php include('./includes/footer.php') ?>

