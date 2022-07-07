<!-- <script>
  $(document).ready(function() {
    // window.location.hash = '#divIsi';
    // document.getElementById('divIsi').scrollIntoView(false);
    // location.href = "/Obat";
    $('html, body').animate({
      scrollTop: $("#divIsi").offset().top
    }, 100000);
  });
</script> -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- tabel supplier-->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="container-fluid daftarsupplier" id="tableDaftarsupplier" style="display: block;">
                    <div class="row">
                        <div class="col">
                            <form action="/updateRumahsakit/<?= $rumahsakit['no_RS']; ?>" method="post">
                                <?= csrf_field(); ?>
                                <div class="form-group">
                                    <label for="noRS">Nomor Rumah Sakit</label>
                                    <input type="text" class="form-control " name="noRS" value="<?= $rumahsakit['no_RS']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="namaRS">Nama Rumah Sakit</label>
                                    <input type="text" class="form-control" name="namaRS" value="<?= $rumahsakit['alamat_RS']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="namaRS">Kontak Rumah Sakit</label>
                                    <input type="number" class="form-control" name="kontakRS" value="<?= $rumahsakit['kontak_RS']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="alamatRS">Alamat</label>
                                    <input type="text" class="form-control " name="alamatRS" value="<?= $rumahsakit['alamat_RS']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="katRS">Kategori Rumah Sakit</label>
                                    <div class="form-radio-item">
                                        <input type="radio" name="katRS" value="Negeri" autofocus>
                                        <label for="Negeri">Negeri</label>
                                    </div>
                                    <div class="form-radio-item">
                                        <input type="radio" name="katRS" value="Swasta">
                                        <label for="Swasta">Swasta</label>
                                    </div>

                                    <div class="form-group">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><a href="/supplier" style="color:white;">Back</a></button>
                                        <button type="submit" class="btn btn-primary">Ubah Data</button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script src="<?= base_url('template/js/updSup.js'); ?>"></script>

<script>
    $(function() {
        $('#myTable').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>