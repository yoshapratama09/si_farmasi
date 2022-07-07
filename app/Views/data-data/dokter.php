<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- tabel supplier-->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="container-fluid daftarObat" id="tableDaftarObat" style="display: block;">
                    <div class="row">
                        <div class="col">
                            <h1 class="mb-2">Daftar Dokter</h1>
                            <div class="alert" data-flashdata="<?= session()->getFlashdata('Pesan') ?>"></div>
                            <button type="button" class="float-start col-lg-2 btn btn-block btn-success mb-2 btnTambahsupplier" data-bs-toggle="modal" data-bs-target="#exampleModal" id="btnTambahsupplier">Tambah Dokter</button>
                            <form action="/Obat/Cari" method="post" class="mb-2">
                                <div class="input-group inputCari w-25 float-end">
                                    <input name="cari" id="cari" placeholder="Nama Dokter" type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
                                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Cari</button>
                                </div>
                            </form>
                            <br>
                            <br>
                            <table class="table" id="myTable" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Nama Lengkap</th>
                                        <th scope="col">Alamat</th>
                                        <th scope="col">Kontak</th>
                                        <th scope="col">Jabatan</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data as $m) : ?>
                                        <tr>
                                            <th scope="row"><?= $m['dokter_id']; ?></th>
                                            <td><?= $m['dokter_nama']; ?></td>
                                            <td><?= $m['dokter_alamat']; ?></td>
                                            <td><?= $m['dokter_kontak']; ?></td>
                                            <td><?= $m['jabatan']; ?></td>
                                            <td>terakhir update pada <?= $m['status_update']; ?> </td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-info">Action</button>
                                                    <button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                                        <span class="sr-only">Toggle Dropdown</span>
                                                    </button>
                                                    <div class="dropdown-menu" role="menu">
                                                        <a class="dropdown-item" id="set_dtl" data-bs-toggle="modal" data-bs-target="#exampleModal1" data-id1="<?= $m['dokter_id']; ?>" data-nama="<?= $m['dokter_nama']; ?>" data-kontak="<?= $m['dokter_kontak']; ?>" data-jabatan="<?= $m['jabatan']; ?>" data-alamat="<?= $m['dokter_alamat']; ?>" data-status="<?= $m['status_update']; ?>">Detail</a>
                                                        <a class="dropdown-item" href="/editdokter/<?= $m['dokter_id'] ?>">Update</a>
                                                        <a class="dropdown-item btnDel" href="/hapus_dokter/<?= $m['dokter_id'] ?>" onclick="return confirm('apakah anda yakin ?')">Hapus</a>
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

<!-- end tabel dokter-->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Dokter</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/tambahDokter" method="post">
                    <?= csrf_field(); ?>
                    <div class="form-group">
                        <label for="idDok">ID Dokter</label>
                        <input type="text" class="form-control " name="idDok">
                    </div>
                    <div class="form-group">
                        <label for="namaDok">Nama Dokter</label>
                        <input type="text" class="form-control" name="namaDok">
                    </div>
                    <div class="form-group">
                        <label for="alamatDok">Alamat Dokter</label>
                        <input type="text" class="form-control " name="alamatDok">
                    </div>
                    <div class="form-group">
                        <label for="kontakDok">Kontak</label>
                        <input type="number" class="form-control " name="kontakDok">
                    </div>
                    <div class="form-group">
                        <label for="jabatanDok">Jabatan</label>
                        <input type="text" class="form-control " name="jabatanDok">
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
                        <th>Jabatan</th>
                        <td><span id="jabatan1"></span></td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td><span id="alamat1"></span></td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>Update Terakhir pada :<span id="status1"></span></td>
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

<script>
    $('#myTable').ddTableFilter();
</script>

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
            var jabatan2 = $(this).data('jabatan');
            var alamat2 = $(this).data('alamat');
            var status2 = $(this).data('status');
            $('#id3').text(id2);
            $('#nama1').text(nama2);
            $('#kontak1').text(kontak2);
            $('#jabatan1').text(jabatan2);
            $('#alamat1').text(alamat2);
            $('#status1').text(status2);

        })
    })
</script>