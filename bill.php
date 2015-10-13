<?php

    session_start();
    require 'pdo.php';
?>

<?php include('./includes/header.php') ?>
<?php include('./includes/nav-header.php') ?>

<div class="container">

   <div class="row">
   <h3 class="page-header"><i class="fa fa-laptop"></i> Bills</h3>
              
                
                   <div class="col-lg-12">
                <div class="panel">
                  <div class="panel-body">
                    Actions:
                      &nbsp;&nbsp;&nbsp;
                      <button class="btn btn-primary" data-toggle="modal" href="#addModal">
                        <i class="fa fa-plus"> Make Payment</i>
                      </button>
                  </div>
                </div>
              </div>
              <div class="col-lg-12">
                <ol class="breadcrumb">
                  <li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
                  <li><i class="fa fa-laptop"></i>Bills</li>
                </ol>
              </div>

<!-- ADD Payment MODAL -->
      <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title">Make Payment</h4>
                  </div>
                  <form method="POST" action="/addNewHistoryBook">
                    <div class="modal-body">
                        <div class="row">
                        <div class="col-lg-12">
                            <section class="panel">
                                <header class="panel-heading primary">
                                   
                                </header>
                                <div class="row">
                                 <div class="col-md-6"></div>
                                 <div class="col-md-6">
                                       <div class="form-group">
                                        <label class="col-sm-2 control-label"> Date</label>
                                        <div class="col-sm-10">
                                            <input type="date" class="form-control" name="amount" placeholder="mm/dd/yy" required="required" />
                                        </div>  
                                  </div>

                                  </div>
                                </div>
                               
                                <div class="form-group">
                                    <label for="">Mode of Payment</label>
                                     <select class="form-control" required = "required">
                                      <option>CASH</option>
                                      <option>INSTALLMENT</option>
                                    </select>
                                  </div>
                                   
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label"> Amount Tendered</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="amount" placeholder="0.00" required="required" />
                                        </div>  
                                  </div>
                                  </div>
                              </section>
                         </div>
                         </div>
                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                        <button class="btn btn-success" type="submit">Submit</button>
                    </div>
                  </form>
              </div>
          </div>
      </div>
      </div>
<div class="panel panel-primary">
 <div class="panel-heading">
    <h3 class="panel-title">Bill Summary</h3>
      </div>
      <div class="panel-body primary">
       
<?php


    if (isset($_SESSION['username'])) {
        $id = $_GET['id'];

        $query = $db->query("SELECT    I.CustNo, C.CustCompanyName, I.InvoiceDate,I.InvoiceDesc,I.TotalDue,I.BalanceAmt, I.Discount  FROM  INVOICES I, JOB_ORDERS J,SERVICES S, CUSTOMERS C  WHERE I.CustNo ='$id' AND J.InvoiceNo = I.InvoiceNo AND J.ServiceNo= S.ServiceNo AND C.CustNo = I.CustNo");

   
        while ($r = $query->fetch()) {
              echo "<div class='row'>";  
              echo "<div class='col-lg-6'>Customer No:".$id."</div>";  
              echo "<div class='col-lg-6'>Customer Name: ".$r['CustCompanyName']."</div>";   
              echo "<div class='col-lg-6'>Date Invoiced: ".$r['InvoiceDate']."</div>";    
              echo "<div class='col-lg-6'>Invoice Description: ".$r['InvoiceDesc']."</div>";    
              echo "<div class='col-lg-6'>Total Due:<b> ".$r['TotalDue']."</b></div>";    
              echo "</div>";
              echo "<div class='row'>";  
              echo "<div class='col-lg-6'>Balance Amount: <b>". $r['BalanceAmt']."</b></div>";
 
              echo "</div>";
              echo "<div class='row'>";  
              echo "<div class='col-lg-6'>Discount : <b>". $r['Discount']."</b></div>"; 
              echo "<div class='col-lg-6'>";
              echo "<div class='panel panel-primary'>";
              echo " <div class='panel-heading'>Payments :</div>";
              echo " <div class='panel-body'>";   
              echo "</div>";
              echo "</div>";
              echo"</div>"; 
              echo "</div>";
              echo "<div class='row'>";  
              echo "</div>";

        }
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
  </div>

      </div>
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
