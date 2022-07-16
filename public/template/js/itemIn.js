// Custom filtering function which will search data in column four between two values
$.fn.dataTable.ext.search.push(
    function(settings, data, dataIndex ) {
        var min = minDate.val();
        var max = maxDate.val();
        var date = new Date( data[0] );
 
        if (
            ( min === null && max === null ) ||
            ( min === null && date <= max ) ||
            ( min <= date   && max === null ) ||
            ( min <= date   && date <= max )
        ) {
            return true;
        }
        return false;
    }
);
 
$(document).ready(function() {

    // Create date inputs
    minDate = new DateTime($('#min'), {
        format: 'yyyy-mm-dd'
    });
    maxDate = new DateTime($('#max'), {
        format: 'yyyy-mm-dd'
    });
 
    // DataTables initialisation
    var table = $('#tableData').DataTable();
 
    // Refilter the table
    $('#min, #max').on('change', function () {
        table.draw();
    });
});