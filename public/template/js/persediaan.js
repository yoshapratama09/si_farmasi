var table = document.getElementById('table');

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
    if(checkBox.checked == true){
        input.dataset.target = "";
        input.readOnly = true;
    }else{
        input.dataset.target = "#exampleModalCenter";
        input.readOnly = false;
    }
});

// function check() {
//     var checkBox = document.getElementById("filter");
//     var input = document.getElementById("medId");
//     if(checkBox.checked == true){
//         input.readOnly = true;
//     }else{
//         input.readOnly = false;
//     }
// }

