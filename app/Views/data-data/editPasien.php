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
                <div class="container-fluid daftardokter" id="tableDaftarpasien" style="display: block;">
                    <div class="row">
                        <div class="col">
                            <form action="/updatePasien/<?= $pasien['pasien_id']; ?>" method="post">
                                <?= csrf_field(); ?>
                                <div class="form-group" hidden>
                                    <label for="idPas">ID Pasien</label>
                                    <input type="text" class="form-control " name="idPas" value="<?= $pasien['pasien_id']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="namaPas">Nama Pasien</label>
                                    <input type="text" class="form-control" name="namaPas" value="<?= $pasien['pasien_nama']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="ttl">Tanggal Lahir Pasien</label>
                                    <input type="date" name="ttl" class="form-control form-control-default" value="<?= $pasien['pasien_dob']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="gender">Jenis Kelamin</label>
                                    <div class="form-radio-item">
                                        <input type="radio" name="gender" value="Laki-Laki" autofocus>
                                        <label for="laki">Laki-Laki</label>
                                    </div>
                                    <div class="form-radio-item">
                                        <input type="radio" name="gender" value="Perempuan">
                                        <label for="perempuan">Perempuan</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="kontakPas">Nomor Telp </label>
                                    <input type="number" class="form-control " name="kontakPas" value="<?= $pasien['pasien_phone']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="alamatPas">Alamat Pasien</label>
                                    <input type="text" class="form-control " name="alamatPas" value="<?= $pasien['pasien_address']; ?>">
                                </div>
                                <div class="form-group">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><a href="/pasien" style="color:white;">Back</a></button>
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