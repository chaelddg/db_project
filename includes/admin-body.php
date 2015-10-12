
<?php require 'pdo.php'; ?>

<div class="container">

    <h3>Customer Lists</h3>
    <hr>

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

                $query = $db->query("SELECT * FROM CUSTOMERS C , INVOICES I WHERE C.CustNo = I.CustNo AND BalanceAmt != '0'");

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
