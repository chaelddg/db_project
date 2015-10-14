<?php

    session_start();
    require 'pdo.php';
    $_SESSION['job_no'] = $_GET['id'];

    echo "<input type='hidden' id='job_no' value=\"{$_SESSION['job_no']}\" />";

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
                      <button class="btn btn-primary" id="modal_btn" data-toggle="modal" href="#addModal">
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
                  <form method="POST" action="payment.php">
                    <div class="modal-body">
                        <div class="row">
                        <div class="col-lg-12">
                            <section class="panel">
                                <header class="panel-heading primary">
                                </header>

                                <div class="panel-body">

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="" class="col-sm-4 control-label">Date</label>
                                             <div class="col-sm-8">
                                                 <input type="date" class="form-control" name="date" required="require"value="">
                                             </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="" class="col-sm-4 control-label">Mode of Payment</label>
                                             <div class="col-sm-8">
                                                 <select name="mode_of_payment" class="form-control" required = "required">
                                                  <option>CASH ON DELIVERY</option>
                                                  <option>INSTALLMENT</option>
                                                </select>
                                             </div>
                                         </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="" class="col-sm-4 control-label">Amount Tendered</label>
                                             <div class="col-sm-8">
                                                 <input type="text" class="form-control" name="amount_tendered" placeholder="0.00" value="">
                                             </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <input type="hidden" id="customer_no_modal" name="customer_no_modal" value="">
                                    </div>
                                    <div class="col-md-12">
                                        <input type="hidden" id="job_no_modal" name="job_no_modal" value="">
                                    </div>
                                    <div class="col-md-12">
                                        <input type="hidden" id="customer_balance_modal" name="customer_balance_modal" value="">
                                    </div>
                                    <div class="col-md-12">
                                        <input type="hidden" id="invoice_no_modal" name="invoice_no_modal" value="">
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

        $query = $db->query("SELECT * FROM  invoices I, job_orders J,services S, customers C  WHERE jobNO ='$id' AND J.InvoiceNo = I.InvoiceNo AND J.ServiceNo= S.ServiceNo
            AND I.CustNo = C.CustNo");

        while ($r = $query->fetch()) {
              echo "<div class='row'>";
              echo "<input type='hidden' id='invoice_no' value=" . $r['InvoiceNo'] . " />";
              echo "<div class='col-lg-6'>Customer No: <span id='customer_no'>".$r['CustNo']."</span></div>";
              echo "<div class='col-lg-6'>Customer Name: ".$r['CustCompanyName']."</div>";
              echo "<div class='col-lg-6'>Date Invoiced: ".$r['InvoiceDate']."</div>";
              echo "<div class='col-lg-6'>Invoice Description: ".$r['InvoiceDesc']."</div>";
              echo "<div class='col-lg-6'>Total Due:<b> ".$r['TotalDue']."</b></div>";
              echo "<div class='col-lg-6'>Status:<b> ".$r['STATUS']."</b></div>";
              echo "</div>";
              echo "<div class='row'>";
              echo "<div class='col-lg-6'>Balance Amount: <span id='customer_balance'><b>". $r['BalanceAmt']."</b></span></div>";

              echo "</div>";
              echo "<div class='row'>";
              echo "<div class='col-lg-6'>Discount : <b>". $r['Discount']."</b></div>";
              echo "</div>";
              echo "<div class='row'>";
              echo "</div>";

        }

        echo "<hr>";

        echo "<div class='row'>";
        echo "<div class='col-lg-6'>";
        echo "<h4>Payments</h4>";

        $query = $db->query("SELECT * FROM  payments , invoices I, job_orders J,services S, customers C WHERE jobNO ='$id' AND J.InvoiceNo = I.InvoiceNo AND J.ServiceNo= S.ServiceNo
            AND I.CustNo = C.CustNo");

        while ($r = $query->fetch()) {
            echo "<h5>Date:".$r['PaymentDate']." </h5>";
            echo "<h5>Amount: ".$r['PAmount']."</h5>";
            echo "<h5>Mode of Payment:".$r['ModeOfPayment']." </h5>";

        }

        echo "</div>";
        echo "</div>";

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

 <script type="text/javascript">

    window.onload = function() {

        $('#modal_btn').click(function (e) {
            var customer_no = $('#customer_no').text();
            console.log(' Customer No ' + customer_no);
            var job_no = $('#job_no').val();
            console.log(' Job No ' + job_no);
            var customer_balance = $('#customer_balance').text();
            console.log(' Customer Balance ' + customer_balance);
            var invoice_no = $('#invoice_no').val();

            $('#customer_no_modal').val(customer_no);
            $('#job_no_modal').val(job_no);
            $('#customer_balance_modal').val(customer_balance);
            $('#invoice_no_modal').val(invoice_no);
            console.log(invoice_no);

        });

    }

 </script>
      </div>
  </div>

      </div>

 </div>

<?php include('./includes/footer.php') ?>
