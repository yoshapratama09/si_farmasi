<!-- tabel type obat -->


<div class="container-fluid tabelObat" id="tabelTipeObat">
    <div class="row">
        <div class="col">
            <h3 class="title-form tf2">Tipe Obat</h3>
            <div hidden class="alert" data-flashdata="<?= session()->getFlashdata('Pesan') ?>"></div>
            <button type="button" class="float-end col-lg-3 btn btn-block btn-success mb-2 btnTambahObat" id="btnTambahObat" onclick="location.href='/Obat/Tipe/Tambah'"> <i class="fas fa-plus"></i>
                Tambah Tipe Obat
            </button>
            <form action="/Obat/Tipe/Cari" method="post" class="mb-2">
                <div class="input-group inputCari w-25 float-start">
                    <input name="cari" id="cari" placeholder="Tipe Obat" type="text" class="form-control" aria-label="Recipient's username" aria-describedby="button-addon2">
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
                        <th scope="col">Tipe</th>
                        <th scope="col" class="action">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($type as $t) : ?>
                        <tr>
                            <th scope="row"><?= $t['type_id']; ?></th>
                            <td><?= $t['type_name']; ?></td>
                            <td>
                                <div class="row justify-content-center">
                                    <div class="col-lg-3">
                                        <button type="button" class="btn btn-block btn-primary" onclick="location.href='/updateTipeObat/<?= $t['type_id'] ?>'">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                            </svg></button>
                                    </div>
                                    <div class="col-lg-3">
                                        <button type="button" class="btn btn-block btn-danger" onclick="location.href='/delTipeObat/<?= $t['type_id'] ?>'"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg></button>
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
</div>
<!-- /.content-wrapper -->

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
            rowReorder: true,
            columnDefs: [{
                orderable: false,
                className: 'reorder',
                targets: 2
            }]
        });
    });
</script>