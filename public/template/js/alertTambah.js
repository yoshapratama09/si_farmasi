var Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
});

const flashData = $('.alert').data('flashdata');

if (flashData == 'Update') {
    Toast.fire({
        icon: 'success',
        title: 'Data berhasil diubah'
    });
} else if (flashData == 'Tambah') {
    Toast.fire({
        icon: 'success',
        title: 'Data berhasil ditambahkan'
    });
} else if (flashData == 'gagalTambah') {
    Toast.fire({
        icon: 'warning',
        title: 'Obat dengan id tersebut sudah tersedia'
    });
} else if (flashData == 'hapus') {
    Toast.fire({
        icon: 'success',
        title: 'Data berhasil dihapus'
    });
}


$('.btnDel').on('click', function (e) {
    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
        title: 'Apakah anda yakin?',
        text: "Data obat akan dihapus",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus data!'
    }).then((result) => {
        if (result.isConfirmed) {
            document.location.href = href;
            // Swal.fire(
            //     'Data obat',
            //     'Berhasil dihapus',
            //     'success'
            // )
            // document.location.href = '/Obat';
        }
    })
})

