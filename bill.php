<?php

    session_start();
    require 'pdo.php';
?>

<?php include('./includes/header.php') ?>
<?php include('./includes/nav-header.php') ?>

<div class="container">

    <h1>Bill Bill</h1>
    <hr>

<?php


    if (isset($_SESSION['username'])) {
        $id = $_GET['id'];

        $query = $db->query("SELECT * FROM JOB_ORDERS J,SERVICES S , INVOICES I WHERE I.CustNo ='$id' AND J.InvoiceNo = I.InvoiceNo AND J.ServiceNo= S.ServiceNo");

    } else {
        $uri_array = explode("/", $_SERVER['REQUEST_URI']);
        $uri_link = [];
        for ($i=0; $i < sizeof($uri_array) - 1; $i++) {
            array_push($uri_link, $uri_array[$i]);
        }
        $link_redirect = implode("/",$uri_link) . "/index.php";
        header('Location: '.$link_redirect);
    }

 ?>

 </div>

<?php include('./includes/footer.php') ?>
