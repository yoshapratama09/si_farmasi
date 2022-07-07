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
                            <form action="/updateSupplier/<?= $supplier['supplier_id']; ?>" method="post">
                                <?= csrf_field(); ?>
                                <div class="form-group" hidden>
                                    <label for="idSup">ID</label>
                                    <input type="text" class="form-control " name="idSup" value="<?= $supplier['supplier_id']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="namaSup">Nama</label>
                                    <input type="text" class="form-control" name="namaSup" value="<?= $supplier['supplier_name']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="phoneSup">Kontak</label>
                                    <input type="number" class="form-control " name="phoneSup" value="<?= $supplier['supplier_phone']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="emailSup">Email</label>
                                    <input type="email" class="form-control " name="emailSup" value="<?= $supplier['supplier_email']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="alamatSup">Alamat</label>
                                    <input type="text" class="form-control " name="alamatSup" value="<?= $supplier['supplier_address']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="negaraSup">Provinsi</label>
                                    <input type="text" class="form-control" name="negaraSup" value="<?= $supplier['supplier_country']; ?>">
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