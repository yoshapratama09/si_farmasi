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
                <div class="container-fluid daftardokter" id="tableDaftardokter" style="display: block;">
                    <div class="row">
                        <div class="col">
                            <form action="/updateDokter/<?= $dokter['dokter_id']; ?>" method="post">
                                <?= csrf_field(); ?>
                                <div class="form-group" hidden>
                                    <label for="idDok">ID Dokter</label>
                                    <input type="text" class="form-control " name="idDok" value="<?= $dokter['dokter_id']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="namaDok">Nama Dokter</label>
                                    <input type="text" class="form-control" name="namaDok" value="<?= $dokter['dokter_nama']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="alamatDok">Alamat Dokter</label>
                                    <input type="text" class="form-control " name="alamatDok" value="<?= $dokter['dokter_alamat']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="kontakDok">Kontak</label>
                                    <input type="number" class="form-control " name="kontakDok" value="<?= $dokter['dokter_kontak']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="jabatanDok">Jabatan</label>
                                    <input type="text" class="form-control " name="jabatanDok" value="<?= $dokter['jabatan']; ?>">
                                </div>
                                <div class="form-group">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><a href="/dokter" style="color:white;">Back</a></button>
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