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
                            <h1 class="mb-2">Daftar Supplier</h1>
                            <div class="alert" data-flashdata="<?= session()->getFlashdata('Pesan') ?>"></div>
                            <div class="alert alert-info" role="alert">
                                <?= session()->getFlashdata('Pesan') ?>
                            </div>
                            <button type="button" class="float-start col-lg-2 btn btn-block btn-success mb-2 btnTambahsupplier" data-bs-toggle="modal" data-bs-target="#exampleModal" id="btnTambahsupplier">Tambah Supplier
                            </button>
                            <form action="/supplier/Cari" method="post" class="mb-2">
                                <div class="input-group inputCari w-25 float-end">
                                    <input name="cari" id="cari" placeholder="Nama Supplier" type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
                                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Cari</button>
                                </div>
                            </form>
                            <br>
                            <br>
                            <table class="table" id="myTable" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Nama Supplier</th>
                                        <th scope="col">Nomor Telp Supplier</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Alamat</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data as $m) : ?>
                                        <tr>
                                            <th scope="row"><?= $m['supplier_id']; ?></th>
                                            <td><?= $m['supplier_name']; ?></td>
                                            <td><?= $m['supplier_phone']; ?></td>
                                            <td><?= $m['supplier_email']; ?></td>
                                            <td><?= $m['supplier_address']; ?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-info">Action</button>
                                                    <button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                                        <span class="sr-only">Toggle Dropdown</span>
                                                    </button>
                                                    <div class="dropdown-menu" role="menu">
                                                        <a class="dropdown-item" id="set_dtl" data-bs-toggle="modal" data-bs-target="#exampleModal1" data-id1="<?= $m['supplier_id']; ?>" data-nama="<?= $m['supplier_name']; ?>" data-kontak="<?= $m['supplier_phone']; ?>" data-email="<?= $m['supplier_email']; ?>" data-alamat="<?= $m['supplier_address']; ?>" data-provinsi="<?= $m['supplier_country']; ?>">Detail</a>
                                                        <a class="dropdown-item tampilModalUbah" href="/editsupplier/<?= $m['supplier_id'] ?>">Update</a>
                                                        <a class="dropdown-item btnDel" href="/hapus_supplier/<?= $m['supplier_id'] ?>" onclick="return confirm('apakah anda yakin ?')">Hapus</a>
                                                    </div>
                                                </div>
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
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabel">Tambah Data Supplier</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/tambahSupplier" method="post">
                    <?= csrf_field(); ?>
                    <div class="form-group">
                        <label for="idSup">ID</label>
                        <input type="text" class="form-control " name="idSup">
                    </div>
                    <div class="form-group">
                        <label for="namaSup">Nama</label>
                        <input type="text" class="form-control" name="namaSup">
                    </div>
                    <div class="form-group">
                        <label for="phoneSup">Kontak</label>
                        <input type="number" class="form-control " name="phoneSup">
                    </div>
                    <div class="form-group">
                        <label for="emailSup">Email</label>
                        <input type="email" class="form-control " name="emailSup">
                    </div>
                    <div class="form-group">
                        <label for="alamatSup">Alamat</label>
                        <input type="text" class="form-control " name="alamatSup">
                    </div>
                    <div class="form-group">
                        <label for="negaraSup">Provinsi</label>
                        <input type="text" class="form-control" name="negaraSup">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Tambah Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end tabel supplier-->

<!-- Modal 1 -->
<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Supplier</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered no-margin">
                    <tr>
                        <th>ID</th>
                        <td><span id="id3"></span></td>
                    </tr>
                    <tr>
                        <th>Nama</th>
                        <td><span id="nama1"></span></td>
                    </tr>
                    <tr>
                        <th>Kontak</th>
                        <td><span id="kontak1"></span></td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td><span id="email1"></span></td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td><span id="alamat1"></span></td>
                    </tr>
                    <tr>
                        <th>Provinsi</th>
                        <td><span id="provinsi1"></span></td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--script filter-->

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
            var id2 = $(this).data('id1');
            var nama2 = $(this).data('nama');
            var kontak2 = $(this).data('kontak');
            var email2 = $(this).data('email');
            var alamat2 = $(this).data('alamat');
            var provinsi2 = $(this).data('provinsi');
            $('#id3').text(id2);
            $('#nama1').text(nama2);
            $('#kontak1').text(kontak2);
            $('#email1').text(email2);
            $('#alamat1').text(alamat2);
            $('#provinsi1').text(provinsi2);

        })
    })
</script>