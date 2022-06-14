<!-- tabel kategori obat -->

<div class="container tabelObat" id="tabelKategoriObat">
    <div class="row">
        <div class="col">
            <h1 class="mb-2">Kategori Obat</h1>
            <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Kategori</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($category as $c) : ?>
                            <tr>
                                <th scope="row"><?= $c['category_id']; ?></th>
                                <td><?= $c['category_name']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- end tabel kategori obat -->