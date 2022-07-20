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
                            <form action="/dokter/cari" method="post" class="mb-2">
                                <div class="input-group inputCari w-25 float-end">
                                    <input name="cari" id="cari" placeholder="Nama Dokter" type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
                                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Cari</button>
                                </div>
                            </form>
                            <br>
                            <br>
                            <table class="table" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">NAMA</th>
                                        <th scope="col">DOB</th>
                                        <th scope="col">JABATAN</th>
                                        <th scope="col">ALAMAT</th>
                                        <th scope="col">STATUS</th>
                                        <th scope="col">ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data as $m) : ?>
                                        <tr>
                                            <th scope="row"><?= $m['dokter_id']; ?></th>
                                            <td><?= $m['dokter_nama']; ?></td>
                                            <td><?= $m['dokter_dob']; ?></td>
                                            <td><?= $m['jabatan']; ?></td>
                                            <td><?= $m['dokter_alamat']; ?></td>
                                            <td><?= $m['status']; ?></td>
                                            <td>
                                                <button type="button" style="margin-right: 10px; color:white;" class="btn btn-warning" id="set_dtl" data-bs-toggle="modal" data-bs-target="#exampleModal1" data-id1="<?= $m['dokter_id']; ?>" data-nama="<?= $m['dokter_nama']; ?>" data-kontak="<?= $m['dokter_kontak']; ?>" data-dob="<?= $m['dokter_dob']; ?>" data-jab="<?= $m['jabatan']; ?>" data-jk="<?= $m['dokter_jk']; ?>" data-status="<?= $m['status']; ?>" data-alamat="<?= $m['dokter_alamat']; ?>" rounded>DETAIL</button>
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
                        <th>DOB</th>
                        <td><span id="dob1"></span></td>
                    </tr>
                    <tr>
                        <th>Jenis Kelamin</th>
                        <td><span id="jk1"></span></td>
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
                        <th>Kontak</th>
                        <td><span id="kontak1"></span></td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td><b><span id="status1" style="color:green ;"></span></td>
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
            var dob2 = $(this).data('dob');
            var jk2 = $(this).data('jk');
            var jabatan2 = $(this).data('jab');
            var alamat2 = $(this).data('alamat');
            var status2 = $(this).data('status');
            $('#id3').text(id2);
            $('#nama1').text(nama2);
            $('#kontak1').text(kontak2);
            $('#dob1').text(dob2);
            $('#jk1').text(jk2);
            $('#jabatan1').text(jabatan2);
            $('#alamat1').text(alamat2);
            $('#status1').text(status2);

        })
    })
</script>