var table = document.getElementById('table');
var minDate, maxDate;

$(function() {
    $('#tableData').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
    });
  });

for(var i = 1; i < table.rows.length; i++)
{
    table.rows[i].onclick = function()
    {
            document.getElementById("medId").value = this.cells[0].innerHTML;
            document.getElementById("medName").value = this.cells[1].innerHTML;
            table.rows[i].className.add('table-active');
    };
} 

$('#clearBtn').on('click', function () {
    document.getElementById("medId").value = "";
    document.getElementById("medName").value = "";
} );


$('#filter').on('click', function () {
    var checkBox = document.getElementById("filter");
    var input = document.getElementById("medId");
    var inputName = document.getElementById("medName");
    if(checkBox.checked == true){
        input.dataset.target = "";
        inputName.dataset.target = "";
        input.readOnly = true;
        checkBox.value = "1"
    }else{
        input.dataset.target = "#exampleModalCenter";
        inputName.dataset.target = "#exampleModalCenter";
        input.readOnly = false;
        checkBox.value ="0";
    }
});


var alert = document.getElementById('msg').value;
if(alert != 'Success'){
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: alert,
    })
}


 
// // Custom filtering function which will search data in column four between two values
// $.fn.dataTable.ext.search.push(
//     function(settings, data, dataIndex ) {
//         var min = minDate.val();
//         var max = maxDate.val();
//         var date = new Date( data[0] );
 
//         if (
//             ( min === null && max === null ) ||
//             ( min === null && date <= max ) ||
//             ( min <= date   && max === null ) ||
//             ( min <= date   && date <= max )
//         ) {
//             return true;
//         }
//         return false;
//     }
// );
 
// $(document).ready(function() {

//     // Create date inputs
//     minDate = new DateTime($('#min'), {
//         format: 'dd-mm-yy'
//     });
//     maxDate = new DateTime($('#max'), {
//         format: 'dd-mm-yy'
//     });
 
//     // DataTables initialisation
//     var table = $('#tableData').DataTable();
 
//     // Refilter the table
//     $('#min, #max').on('change', function () {
//         table.draw();
//     });
// });