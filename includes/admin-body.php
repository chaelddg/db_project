
<?php require 'pdo.php'; ?>

<div class="container">


    <div>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Customer With Balance</a></li>
    <li role="presentation"><a href="#list" aria-controls="list" role="tab" data-toggle="tab">List</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="home">

        <div class="row" style="margin-top: 20px">
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

    </div>
    <div role="tabpanel" class="tab-pane" id="list">

        <div class="row" style="margin-top: 20px">

            <?php
            $query = $db->query("SELECT *  FROM  customers C, invoices I WHERE  I.CustNo = C.CustNo");

            echo "<table id='customer_account_table' class='table'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th>Customer No</th>";
            echo "<th>Company Name</th>";
            echo "<th>Contact Person</th>";
            echo "<th>Contact Address</th>";
            echo "<th>Invoice Date</th>";
            echo "<th>Status</th>";
            echo "</tr>";
            echo "<thead>";
            echo "<tbody>";

            while ($r = $query->fetch()) {
                echo "<tr>";
                    echo "<td>" . $r['CustNo'] ."</td>";
                    echo "<td>" . $r['CustCompanyName'] ."</td>";
                    echo "<td>" . $r['ContactPerson'] . '</td>';
                    echo "<td>" . $r['CustAddr'] . '</td>';
                    echo "<td>" . $r['InvoiceDate'] . '</td>';
                    echo "<td>" . $r['STATUS'] . '</td>';
                echo "</tr>" . "\n";
            }
            echo "</tbody>";
            echo "</table>";

             ?>

        </div>

    </div>
  </div>

</div>

</div>
</div>
