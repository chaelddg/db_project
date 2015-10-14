<?php

    session_start();
    require 'pdo.php';

    include('./includes/header.php');

    if (isset($_SESSION['username'])) {

        $customer_no = $_POST['customer_no_modal'];
        $job_no = $_POST['job_no_modal'];
        $customer_balance = $_POST['customer_balance_modal'];
        $date = $_POST['date'];
        $mode_of_payment = $_POST['mode_of_payment'];
        $amount_tendered = doubleval($_POST['amount_tendered']);
        $invoice_no = $_POST['invoice_no_modal'];

        $amount_paid = $customer_balance - $amount_tendered;

        $status = "SENT";

        if ($mode_of_payment == 'CASH ON DELIVERY' && $amount_paid == 0) {
            $status = 'PAID';
        }

        if ($mode_of_payment == 'CASH ON DELIVERY' && $amount_paid != 0) {
            die("<h3>Something went wrong .... </h3>");
        }

        if ($mode_of_payment == 'INSTALLMENT' && $amount_paid != 0) {
            $status = 'PARTIALLY PAID';
        }

        if ($customer_balance == 0) {
            die('<h3>You have paid already</h3>');
        }

        $query = $db->query("INSERT INTO payments(PaymentDate, ModeOfPayment,PAmount, InvoiceNo, EmpNo)
            VALUES('$date', '$mode_of_payment', $amount_tendered, $invoice_no, 1)");

        $query = $db->query("UPDATE invoices SET BalanceAmt=$amount_paid, STATUS='$status' WHERE InvoiceNo=$invoice_no");

        $uri_array = explode("/", $_SERVER['REQUEST_URI']);
        $uri_link = [];
        for ($i=0; $i < sizeof($uri_array) - 1; $i++) {
            array_push($uri_link, $uri_array[$i]);
        }
        $link_redirect = implode("/",$uri_link) . "/bill.php?id=" . $job_no;
        header('Location: '.$link_redirect);
    }

    include('./includes/footer.php');

 ?>
