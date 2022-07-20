<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- tabel supplier-->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="container-fluid daftarsupplier" id="tableDaftarsupplier" style="display: block;">
                    <div class="row">
                        <div class="col">
                            <h1 class="mb-2">Daftar Supplier</h1>
                            <br>
                            <button type="button" class="float-end col-2 btn btn-block btn-success mb-2" id="btnTambahSup" onclick="location.href='/supplier/Tambah'"> Tambah Supplier
                                <i class="fas fa-plus"></i>
                            </button>
                            <form action="/supplier/Cari" method="post" class="mb-2">
                                <div class="input-group inputCari w-25 float-start">
                                    <input name="cari" id="cari" placeholder="Nama Supplier" type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
                                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Cari</button>
                                </div>
                                <br>
                                <table class="table" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Nama Supplier</th>
                                            <th scope="col">ALAMAT</th>
                                            <th scope="col">JENIS</th>
                                            <th scope="col">ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data as $m) : ?>
                                            <tr>
                                                <th scope="row"><?= $m['supplier_id']; ?></th>
                                                <td><?= $m['supplier_name']; ?></td>
                                                <td><?= $m['supplier_address']; ?></td>
                                                <td><?= $m['supplier_jenis']; ?></td>
                                                <td>
                                                    <button type="button" style="margin-right: 10px; color:white;" class="btn btn-warning" id="set_dtl" data-bs-toggle="modal" data-bs-target="#exampleModal1" data-nama="<?= $m['supplier_name']; ?>" data-alamat="<?= $m['supplier_address']; ?>" data-jenis="<?= $m['supplier_jenis']; ?>" data-kontak="<?= $m['supplier_phone']; ?>" data-email="<?= $m['supplier_email']; ?>" rounded>HUBUNGI</button>
                                                    <a class="btn btn-primary" href="/editsupplier/<?= $m['supplier_id'] ?>" role="button" style="margin-right: 10px;" rounded>EDIT</a>
                                                    <a class="btn btn-danger" href="/hapus_supplier/<?= $m['supplier_id'] ?>" onclick="return confirm('apakah anda yakin ?')" role="button" rounded>HAPUS</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Modal 1 -->
<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Supplier</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <tr>
                        <th>Nama</th>
                        <td><span id="nama1"></span></td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td><span id="alamat1"></span></td>
                    </tr>
                    <tr>
                        <th>Jenis</th>
                        <td><span id="jenis1"></span></td>
                    </tr>
                    <tr>
                        <th>Kontak</th>
                        <td><span id="kontak1"></span></td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td><span id="email1"></span></td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
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

<script>
    $(document).ready(function() {
        $(document).on('click', '#set_dtl', function() {
            var nama2 = $(this).data('nama');
            var kontak2 = $(this).data('kontak');
            var email2 = $(this).data('email');
            var alamat2 = $(this).data('alamat');
            var jenis2 = $(this).data('jenis');
            $('#nama1').text(nama2);
            $('#kontak1').text(kontak2);
            $('#email1').text(email2);
            $('#alamat1').text(alamat2);
            $('#jenis1').text(jenis2);

        })
    })
</script>