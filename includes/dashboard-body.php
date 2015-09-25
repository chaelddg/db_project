<?php
    require 'pdo.php';
    $query = $db->query("SELECT * FROM CUSTOMERS");
?>

<div class="container">

    <div class="panel panel-default">
        <div class="panel-heading">Actions</div>
        <div class="panel-body">
            <button class="btn btn-primary">Add Customer</button>
        </div>
    </div>

    <h4>Customer List</h4>
    <hr>

    <table id="customerTable" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Contact No.</th>
                <th>Customer Company Name</th>
                <th>Contact Person</th>
                <th>Customer Address</th>
                <th>Customer Phone No.</th>
                <th>Customer Email</th>
            </tr>
        </thead>
        <tbody>
            <?php
                while ($r = $query->fetch()) {
                    echo "<tr>";
                    echo "<td>" . $r['CustNo'] . '</td>';
                    echo "<td>" . $r['CustCompanyName'] . '</td>';
                    echo "<td>" . $r['ContactPerson'] . '</td>';
                    echo "<td>" . $r['CustAddr'] . '</td>';
                    echo "<td>" . $r['CustPhoneNo'] . '</td>';
                    echo "<td>" . $r['CustEmail'] . '</td>';
                    echo "</tr>" . "\n";
                }

             ?>
        </tbody>
    </table>

</div>