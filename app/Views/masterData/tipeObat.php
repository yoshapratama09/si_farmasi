<!-- tabel type obat -->


<div class="container tabelObat" id="tabelTipeObat">
    <div class="row">
        <div class="col">
            <h1 class="mb-2">Tipe Obat</h1>
            <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Tipe</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($type as $t) : ?>
                            <tr>
                                <th scope="row"><?= $t['type_id']; ?></th>
                                <td><?= $t['type_name']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- end tabel type obat -->