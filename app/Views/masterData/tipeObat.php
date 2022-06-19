<!-- tabel type obat -->


<div class="container-fluid tabelObat" id="tabelTipeObat">
    <div class="row">
        <div class="col">
            <h1 class="mb-2">Tipe Obat</h1>
            <div hidden class="alert" data-flashdata="<?= session()->getFlashdata('Pesan') ?>"></div>
            <button type="button" class="float-start col-lg-3 btn btn-block btn-success mb-2 btnTambahObat" id="btnTambahObat" onclick="location.href='/Obat/Tipe/Tambah'">Tambah Tipe Obat</button>
            <form action="/Obat/Tipe/Cari" method="post" class="mb-2">
                <div class="input-group inputCari w-25 float-end">
                    <input name="cari" id="cari" placeholder="Tipe Obat" type="text" class="form-control" aria-label="Recipient's username" aria-describedby="button-addon2">
                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Cari</button>
                </div>
            </form>
            <br>
            <br>
            <table class="table" id="myTable" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Tipe</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($type as $t) : ?>
                        <tr>
                            <th scope="row"><?= $t['type_id']; ?></th>
                            <td><?= $t['type_name']; ?></td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-info">Action</button>
                                    <button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <div class="dropdown-menu" role="menu">
                                        <a class="dropdown-item" href="/updateTipeObat/<?= $t['type_id'] ?>">Update</a>
                                        <a class="dropdown-item btnDel" href="/delTipeObat/<?= $t['type_id'] ?>">Hapus</a>
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
<!-- end tabel type obat -->

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