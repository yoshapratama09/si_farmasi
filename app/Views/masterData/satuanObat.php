<!-- tabel type obat -->


<div class="container-fluid tabelObat" id="tabelSatuanObat">
    <div class="row">
        <div class="col">
            <h3 class="title-form tf2">Satuan Obat</h3>
            <div hidden class="alert" data-flashdata="<?= session()->getFlashdata('Pesan') ?>"></div>
            <button type="button" class="float-end col-lg-3 btn btn-block btn-success mb-2 btnTambahObat" id="btnTambahObat" onclick="location.href='/Obat/Satuan/Tambah'">Tambah Satuan Obat</button>
            <form action="/Obat/Satuan/Cari" method="post" class="mb-2">
                <div class="input-group inputCari w-25 float-start">
                    <input name="cari" id="cari" placeholder="Satuan Obat" type="text" class="form-control" aria-label="Recipient's username" aria-describedby="button-addon2">
                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Cari</button>
                </div>
            </form>
            <br>
            <br>
            <br>
            <table class="table" id="myTable" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Satuan</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($satuan as $s) : ?>
                        <tr>
                            <th scope="row"><?= $s['satuan_id']; ?></th>
                            <td><?= $s['satuan_name']; ?></td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-info">Action</button>
                                    <button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <div class="dropdown-menu" role="menu">
                                        <a class="dropdown-item" href="/updateSatuanObat/<?= $s['satuan_id'] ?>">Update</a>
                                        <a class="dropdown-item btnDel" href="/delSatuanObat/<?= $s['satuan_id'] ?>">Hapus</a>
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