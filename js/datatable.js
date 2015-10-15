$(document).ready(function () {
    $('#customer_table').DataTable();
    $('#customer_account_table').DataTable();
    $('#bill_summary').DataTable();
    $('#customer_table')
        .removeClass( 'display' )
        .addClass('table table-striped table-bordered');
    $('#customer_account_table')
        .removeClass( 'display' )
        .addClass('table table-striped table-bordered');
    $('#bill_summary')
        .removeClass( 'display' )
        .addClass('table table-striped table-bordered');

});
