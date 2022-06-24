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
        title: 'Data Obat berhasil diubah'
    });
} else if (flashData == 'tanggal') {
    Toast.fire({
        icon: 'warning',
        title: 'Tanggal expired harus setelah tanggal dibuatnya obat'
    });
} else if (flashData == 'Tambah') {
    Toast.fire({
        icon: 'success',
        title: 'Data Obat berhasil ditambahkan'
    });
} else if (flashData == 'gagalTambah') {
    Toast.fire({
        icon: 'warning',
        title: 'Obat dengan id tersebut sudah tersedia'
    });
} else if (flashData == 'hapus') {
    Toast.fire({
        icon: 'success',
        title: 'Data Obat berhasil dihapus'
    });
} else if (flashData == 'TambahKategori') {
    Toast.fire({
        icon: 'success',
        title: 'Data Kategori berhasil ditambahkan'
    });
} else if (flashData == 'gagalTambahKategori') {
    Toast.fire({
        icon: 'warning',
        title: 'Kategori Obat dengan id tersebut sudah tersedia'
    });
} else if (flashData == 'hapusKategori') {
    Toast.fire({
        icon: 'success',
        title: 'Data Kategori Obat berhasil dihapus'
    });
} else if (flashData == 'UpdateKategori') {
    Toast.fire({
        icon: 'success',
        title: 'Data Kategori Obat berhasil diubah'
    });
} else if (flashData == 'TambahTipe') {
    Toast.fire({
        icon: 'success',
        title: 'Data Tipe berhasil ditambahkan'
    });
} else if (flashData == 'gagalTambahTipe') {
    Toast.fire({
        icon: 'warning',
        title: 'Tipe Obat dengan id tersebut sudah tersedia'
    });
} else if (flashData == 'hapusTipe') {
    Toast.fire({
        icon: 'success',
        title: 'Data Tipe Obat berhasil dihapus'
    });
} else if (flashData == 'UpdateTipe') {
    Toast.fire({
        icon: 'success',
        title: 'Data Tipe Obat berhasil diubah'
    });
} else if (flashData == 'TambahSatuan') {
    Toast.fire({
        icon: 'success',
        title: 'Data Satuan berhasil ditambahkan'
    });
} else if (flashData == 'gagalTambahSatuan') {
    Toast.fire({
        icon: 'warning',
        title: 'Satuan Obat dengan id tersebut sudah tersedia'
    });
} else if (flashData == 'hapusSatuan') {
    Toast.fire({
        icon: 'success',
        title: 'Data Satuan Obat berhasil dihapus'
    });
} else if (flashData == 'UpdateSatuan') {
    Toast.fire({
        icon: 'success',
        title: 'Data Satuan Obat berhasil diubah'
    });
}


$('.btnDel').on('click', function (e) {
    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
        title: 'Apakah anda yakin?',
        text: "Data akan dihapus",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus data'
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

$('#tabelObat').load('/Obat #tabelObat')

