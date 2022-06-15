let submit = document.getElementById('submit');
let cekInput = document.getElementById('cek').value;
if (cekInput === 'false') {
    submit.classList.add('swalDefaultWarning');
}


$(function () {
    var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });
    $('.swalDefaultWarning').click(function () {
        Toast.fire({
            icon: 'warning',
            title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
    });
});