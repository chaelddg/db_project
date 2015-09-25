 <?php include('./includes/header.php'); ?>
    <div class="container">

        <?php

            session_start();

            $username = $_POST['username'];
            $password = $_POST['password'];

            if ($username&&$password) {
                try {
                    require 'pdo.php';
                } catch (Exception $e) {
                    echo $e->getMessage();
                    die();
                }

                $query = $db->query("SELECT * FROM users WHERE username='$username'");

                $numrows = $query->rowCount();

                if ($numrows != 0) {
                    while ($r = $query->fetch()) {
                        $db_username = $r['username'];
                        $db_password = $r['password'];
                    }

                    if ($username == $db_username && $password == $db_password) {
                        $_SESSION['username'] = $db_username;

                        // after login redirect to member page
                        $uri_array = explode("/", $_SERVER['REQUEST_URI']);
                        $uri_link = [];
                        for ($i=0; $i < sizeof($uri_array) - 1; $i++) {
                            array_push($uri_link, $uri_array[$i]);
                        }
                        $link_redirect = implode("/",$uri_link) . "/dashboard.php";
                        header('Location: '.$link_redirect);
                    }
                    else
                        echo "Incorrent Password";
                }
                else
                    die("User doesn't exist");

            }
            else
                die("Please enter a username and a password");

         ?>

    </div>
 <?php include('./includes/footer.php'); ?>