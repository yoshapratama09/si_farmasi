<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- tabel supplier-->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="container-fluid daftarObat" id="tableDaftarObat" style="display: block;">
                    <div class="row">
                        <div class="col">
                            <h1 class="mb-2">Daftar Rumah Sakit</h1>
                            <div class="alert" data-flashdata="<?= session()->getFlashdata('Pesan') ?>"></div>
                            <button type="button" class="float-start col-lg-3 btn btn-block btn-success mb-2 btnTambahsupplier" data-bs-toggle="modal" data-bs-target="#exampleModal" id="btnTambahsupplier">Tambah Data Rumah Sakit</button>
                            <form action="/Obat/Cari" method="post" class="mb-2">
                                <div class="input-group inputCari w-25 float-end">
                                    <input name="cari" id="cari" placeholder="Nama Rumah Sakit" type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
                                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Cari</button>
                                </div>
                            </form>
                            <br>
                            <br>
                            <table class="table" id="myTable" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Nomor</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Kategori</th>
                                        <th scope="col">kontak</th>
                                        <th scope="col">Alamat</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data as $m) : ?>
                                        <tr>
                                            <th scope="row"><?= $m['no_RS']; ?></th>
                                            <td><?= $m['nama_RS']; ?></td>
                                            <td><?= $m['kategori_RS']; ?></td>
                                            <td><?= $m['kontak_RS']; ?></td>
                                            <td><?= $m['alamat_RS']; ?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-info">Action</button>
                                                    <button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                                        <span class="sr-only">Toggle Dropdown</span>
                                                    </button>
                                                    <div class="dropdown-menu" role="menu">
                                                        <a class="dropdown-item" id="set_dtl" data-bs-toggle="modal" data-bs-target="#exampleModal1" data-id1="<?= $m['no_RS']; ?>" data-nama="<?= $m['nama_RS']; ?>" data-kategori="<?= $m['kategori_RS']; ?>" data-kontak="<?= $m['kontak_RS']; ?>" data-alamat="<?= $m['alamat_RS']; ?>">Detail</a>
                                                        <a class="dropdown-item" href="/editrumahsakit/<?= $m['no_RS'] ?>">Update</a>
                                                        <a class="dropdown-item btnDel" href="/hapus_rumahsakit/<?= $m['no_RS'] ?>">Hapus</a>
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Rumah Sakit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/tambahRumahsakit" method="post">
                    <?= csrf_field(); ?>
                    <div class="form-group">
                        <label for="noRS">Nomor Rumah Sakit</label>
                        <input type="text" class="form-control " name="noRS">
                    </div>
                    <div class="form-group">
                        <label for="namaRS">Nama Rumah Sakit</label>
                        <input type="text" class="form-control" name="namaRS">
                    </div>
                    <div class="form-group">
                        <label for="namaRS">Kontak Rumah Sakit</label>
                        <input type="number" class="form-control" name="kontakRS">
                    </div>
                    <div class="form-group">
                        <label for="alamatRS">Alamat</label>
                        <input type="text" class="form-control " name="alamatRS">
                    </div>
                    <div class="form-group">
                        <label for="katRS">Kategori Rumah Sakit</label>
                        <div class="form-radio-item">
                            <input type="radio" name="katRS" value="Negeri">
                            <label for="Negeri">Negeri</label>
                        </div>
                        <div class="form-radio-item">
                            <input type="radio" name="katRS" value="Swasta">
                            <label for="Swasta">Swasta</label>
                        </div>
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
                        <th>Nomor</th>
                        <td><span id="id3"></span></td>
                    </tr>
                    <tr>
                        <th>Nama Rumah Sakit</th>
                        <td><span id="nama1"></span></td>
                    </tr>
                    <tr>
                        <th>Kontak Rumah Sakit</th>
                        <td><span id="kontak1"></span></td>
                    </tr>
                    <tr>
                        <th>Kategori Rumah Sakit</th>
                        <td><span id="kategori1"></span></td>
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
            var kategori2 = $(this).data('kategori');
            var alamat2 = $(this).data('alamat');
            var kontak2 = $(this).data('kontak');
            $('#id3').text(id2);
            $('#nama1').text(nama2);
            $('#kategori1').text(kategori2);
            $('#alamat1').text(alamat2);
            $('#kontak1').text(kontak2);
        })
    })
</script>