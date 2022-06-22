var table = document.getElementById('table');
var tablePH = document.getElementById('tablePH');

for(var i = 1; i < table.rows.length; i++)
{
    table.rows[i].onclick = function()
    {
            document.getElementById("medId").value = this.cells[0].innerHTML;
            document.getElementById("medName").value = this.cells[1].innerHTML;
            table.rows[i].className.add('table-active');
    };
} 

for(var i = 1; i < tablePH.rows.length; i++)
{
    tablePH.rows[i].onclick = function()
    {
            document.getElementById("medId").value = this.cells[0].innerHTML;
            document.getElementById("medName").value = this.cells[1].innerHTML;
            tablePH.rows[i].className.add('table-active');
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
if(alert != null){
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: alert,
    })
}


