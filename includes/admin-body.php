
<?php require 'pdo.php'; ?>

<div class="container">


    <div class="row">
              <div class="col-lg-12">
                <h3 class="page-header"><i class="fa fa-laptop"></i> Customer Lists</h3>
                <ol class="breadcrumb">
                  <li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
                  <li><i class="fa fa-laptop"></i>Customer List</li>
                </ol>
              </div>

    <table id="customer_table">
        <thead>
            <tr>
                <th>Customer No.</th>
                <th>Company Name</th>
                <th>Contact Person</th>
                <th>Contact Address</th>
                <th>Invoice Date</th>
            </tr>
        </thead>
        <tbody>

            <?php

                 $query = $db->query("SELECT * FROM customers C , invoices I WHERE C.CustNo = I.CustNo AND BalanceAmt != '0'");

                 while ($r = $query->fetch()) {
                     echo "<tr>";
                        echo "<td><a href='view.php?id=" . $r['CustNo'] . "'>". $r['CustNo'] ."</a></td>";
                        echo "<td>" . $r['CustCompanyName'] . '</td>';
                        echo "<td>" . $r['ContactPerson'] . '</td>';
                        echo "<td>" . $r['CustAddr'] . '</td>';
                        echo "<td>" . $r['InvoiceDate'] . '</td>';
                    echo "</tr>" . "\n";
                }

                             ?>
        </tbody>
    </table>

</div>
