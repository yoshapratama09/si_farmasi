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
                            <form action="/pasien/Cari" method="post" class="mb-2">
                                <div class="input-group inputCari w-25 float-end">
                                    <input name="cari" id="cari" placeholder="Nama Pasien" type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
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
                                        <th scope="col">STATUS</th>
                                        <th scope="col">ALAMAT</th>
                                        <th scope="col">ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data as $m) : ?>
                                        <tr>
                                            <th scope="row"><?= $m['pasien_id']; ?></th>
                                            <td><?= $m['pasien_nama']; ?></td>
                                            <td><?= $m['pasien_dob']; ?></td>
                                            <td><?= $m['pasien_status']; ?></td>
                                            <td><?= $m['pasien_address']; ?></td>
                                            <td>
                                                <button type="button" style="margin-right: 10px; color:white;" class="btn btn-warning" id="set_dtl" data-bs-toggle="modal" data-bs-target="#exampleModal1" data-id1="<?= $m['pasien_id']; ?>" data-nama="<?= $m['pasien_nama']; ?>" data-kontak="<?= $m['pasien_phone']; ?>" data-ttl="<?= $m['pasien_dob']; ?>" data-gender="<?= $m['pasien_gender']; ?>" data-status="<?= $m['pasien_status']; ?>" data-alamat="<?= $m['pasien_address']; ?>" rounded>DETAIL</button>
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
                <table class="table">
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
                        <td><span id="ttl1"></span></td>
                    </tr>
                    <tr>
                        <th>Jenis Kelamin</th>
                        <td><span id="jk1"></span></td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td><span id="status1"></span></td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td><span id="alamat1"></span></td>
                    </tr>
                    <tr>
                        <th>Kontak</th>
                        <td><span id="kontak1"></span></td>
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
            var status2 = $(this).data('status');
            var alamat2 = $(this).data('alamat');
            var jk2 = $(this).data('gender');
            $('#id3').text(id2);
            $('#nama1').text(nama2);
            $('#kontak1').text(kontak2);
            $('#ttl1').text(ttl2);
            $('#status1').text(status2);
            $('#alamat1').text(alamat2);
            $('#jk1').text(jk2);

        })
    })
</script>