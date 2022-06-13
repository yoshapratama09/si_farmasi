$('.swalExit').click(function() {
    Swal.fire({
        title: 'Anda yakin menutup sistem?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya',
        cancelButtonText: 'Tidak'
      }) .then((result) => {
        if (result.isConfirmed) {
          var link = document.getElementById("logout").href = "/logout"
          window.location = link;
        }
      })
  });


