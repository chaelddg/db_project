$(document).ready(function () {
    $('#customer_table').DataTable();
    $('#customer_account_table').DataTable();
    $('#customer_table')
        .removeClass( 'display' )
        .addClass('table table-striped table-bordered');
    $('#customer_account_table')
        .removeClass( 'display' )
        .addClass('table table-striped table-bordered');
});
