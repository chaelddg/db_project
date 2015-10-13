<?php

    session_start();
    require 'pdo.php';
?>

<?php include('./includes/header.php') ?>
<?php include('./includes/nav-header.php') ?>

<div class="container">
   <div class="row">
              <div class="col-lg-12">
                <h3 class="page-header"><i class="fa fa-laptop"></i> Job Orders</h3>
                <ol class="breadcrumb">
                  <li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
                  <li><i class="fa fa-laptop"></i>Job Orders</li>
                </ol>
              </div>


<?php


    if (isset($_SESSION['username'])) {
        $id = $_GET['id'];

        $query = $db->query("SELECT * FROM JOB_ORDERS J,SERVICES S , INVOICES I WHERE I.CustNo ='$id' AND J.InvoiceNo = I.InvoiceNo AND J.ServiceNo= S.ServiceNo");

        echo "<h1>" . $id . "</h1>";
        echo "<table id='customer_account_table' class='table'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>Job No</th>";
        echo "<th>Job Location</th>";
        echo "<th>Job Start Date</th>";
        echo "<th>Job End Date</th>";
        echo "<th>Defects</th>";
        echo "<th>Qty</th>";
        echo "<th>Unit Price</th>";
        echo "<th>Amount</th>";
        echo "<th>Employees</th>";
        echo "<th>Service Description</th>";
        echo "<th>Invoice No</th>";
        echo "</tr>";
        echo "<thead>";
        echo "<tbody>";

        while ($r = $query->fetch()) {
            echo "<tr>";
                echo "<td><a href='bill.php?id=" . $r['jobNO'] . "'>". $r['jobNO'] ."</a></td>";
                echo "<td>" . $r['JobLocation'] ."</a></td>";
                echo "<td>" . $r['JobStrDate'] . '</td>';
                echo "<td>" . $r['JobEnDate'] . '</td>';
                echo "<td>" . $r['Defects'] . '</td>';
                echo "<td>" . $r['Qty'] . '</td>';
                echo "<td>" . $r['UnitPrice'] . '</td>';
                echo "<td>" . $r['Amount'] . '</td>';
                echo "<td>" . $r['EmpNo'] . '</td>';
                echo "<td>" . $r['ServiceDesc'] . '</td>';
                echo "<td>" . $r['InvoiceNo'] . '</td>';
            echo "</tr>" . "\n";
        }
        echo "</tbody>";
        echo "</table>";
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
