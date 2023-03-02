// Call the dataTables jQuery plugin
$(document).ready(function() {
    $('#dataTable').dataTable( {
        "order": [[ 0, 'desc' ]]
    } );
});
