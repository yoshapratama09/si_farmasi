<!-- tabel Pasien-->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- tabel supplier-->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="container-fluid daftarPasien" id="tableDaftarOPasien" style="display: block;">
                    <div class="row">
                        <div class="col">
                            <h1 class="mb-2">Daftar Pasien</h1>
                            <button type="button" class="float-start col-lg-2 btn btn-block btn-success mb-2 btnTambahsupplier" data-bs-toggle="modal" data-bs-target="#exampleModal" id="btnTambahsupplier">Tambah Pasien</button>
                            <form action="/pasien/Cari" method="post" class="mb-2">
                                <div class="input-group inputCari w-25 float-end">
                                    <input name="cari" id="cari" placeholder="Nama Pasien" type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
                                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Cari</button>
                                </div>
                            </form>
                            <br>
                            <br>
                            <table class="table" id="myTable" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Nama Pasien</th>
                                        <th scope="col">Kontak Pasien</th>
                                        <th scope="col">Tanggal Lahir</th>
                                        <th scope="col">Jenis Kelamin</th>
                                        <th scope="col">Alamat</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data as $m) : ?>
                                        <tr>
                                            <th scope="row"><?= $m['pasien_id']; ?></th>
                                            <td><?= $m['pasien_nama']; ?></td>
                                            <td><?= $m['pasien_phone']; ?></td>
                                            <td><?= $m['pasien_dob']; ?></td>
                                            <td><?= $m['pasien_gender']; ?></td>
                                            <td><?= $m['pasien_address']; ?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-info">Action</button>
                                                    <button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                                        <span class="sr-only">Toggle Dropdown</span>
                                                    </button>
                                                    <div class="dropdown-menu" role="menu">
                                                        <a class="dropdown-item" id="set_dtl" data-bs-toggle="modal" data-bs-target="#exampleModal1" data-id1="<?= $m['pasien_id']; ?>" data-nama="<?= $m['pasien_nama']; ?>" data-kontak="<?= $m['pasien_phone']; ?>" data-ttl="<?= $m['pasien_dob']; ?>" data-gender="<?= $m['pasien_gender']; ?>" data-alamat="<?= $m['pasien_address']; ?>">Detail</a>
                                                        <a class="dropdown-item" href="/editpasien/<?= $m['pasien_id'] ?>">Update</a>
                                                        <a class="dropdown-item btnDel" href="/hapus_pasien/<?= $m['pasien_id'] ?>">Hapus</a>
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
<!-- end tabel supplier-->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Pasien</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/tambahPasien" method="post">
                    <?= csrf_field(); ?>
                    <div class="form-group">
                        <label for="idPas">ID Pasien</label>
                        <input type="text" class="form-control " name="idPas">
                    </div>
                    <div class="form-group">
                        <label for="namaPas">Nama Pasien</label>
                        <input type="text" class="form-control" name="namaPas">
                    </div>
                    <div class="form-group">
                        <label for="ttl">Tanggal Lahir Pasien</label>
                        <input type="date" name="ttl" class="form-control form-control-default">
                    </div>
                    <div class="form-group">
                        <label for="gender">Jenis Kelamin</label>
                        <div class="form-radio-item">
                            <input type="radio" name="gender" value="Laki-Laki">
                            <label for="laki">Laki-Laki</label>
                        </div>
                        <div class="form-radio-item">
                            <input type="radio" name="gender" value="Perempuan">
                            <label for="perempuan">Perempuan</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="kontakPas">Nomor Telp </label>
                        <input type="number" class="form-control " name="kontakPas">
                    </div>
                    <div class="form-group">
                        <label for="alamatPas">Alamat Pasien</label>
                        <input type="text" class="form-control " name="alamatPas">
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

<!-- Modal 1 -->
<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Dokter</h5>
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
                        <th>Tanggal Lahir</th>
                        <td><span id="ttl1"></span></td>
                    </tr>
                    <tr>
                        <th>Jenis Kelamin</th>
                        <td><span id="jk1"></span></td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td><span id="alamat1"></span></td>
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
<script src="<?= base_url('template/js/ddtf.js'); ?>"></script>

<script>
    $('#myTable').ddTableFilter();
</script>

<script src="<?= base_url('template/js/alertTambah.js'); ?>"></script>
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
            var ttl2 = $(this).data('ttl');
            var alamat2 = $(this).data('alamat');
            var jk2 = $(this).data('gender');
            $('#id3').text(id2);
            $('#nama1').text(nama2);
            $('#kontak1').text(kontak2);
            $('#ttl1').text(ttl2);
            $('#alamat1').text(alamat2);
            $('#jk1').text(jk2);

        })
    })
</script>