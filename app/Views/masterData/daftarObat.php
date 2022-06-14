<!-- tabel obat-->

<div class="container tabelObat" id="tabelObat">
  <div class="row">
    <div class="col">
      <h1 class="mb-2">Daftar Obat</h1>
      <div class="col-lg-2">
        <button type="button" class="btn btn-block btn-success mb-2 btnTambahObat" id="btnTambahObat" onclick="location.href='/Obat/Tambah'">Tambah Obat</button>
      </div>
      <div class="card-body">
        <table id="example2" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Nama Obat</th>
              <th scope="col">Stok</th>
              <th scope="col">Harga</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($medicine as $m) : ?>
              <tr>
                <th scope="row"><?= $m['medicine_id']; ?></th>
                <td><?= $m['medicine_name']; ?></td>
                <td><?= $m['medicine_stock']; ?></td>
                <td><?= $m['medicine_price']; ?></td>
                <td>
                  <div class="btnUpdDel">
                    <button type="button" class="btn btn-block btn-primary btnUpd" onclick="location.href='/updateObat/<?= $m['medicine_id'] ?>';">Edit</button>
                    <button type="button" class="btn btn-block btn-danger btnDlt" onclick="location.href='/delObat/<?= $m['medicine_id'] ?>';">Delete</button>
                  </div>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
</div>
<!-- end tabel obat-->








<!-- form tambah obat -->
<div class="container formTambahObat" id="formTambahObat" style="display: none;">
  <div class="row">
    <div class="col">
      <h1 class="mb-2">Tambah Obat</h1>
      <form action="/tambahObat" method="POST">
        <?= csrf_field(); ?>
        <label for="idObat" class="labelObat">ID Obat</label>
        <input type="text" name="idObat" id="idObat" class="inputObat" placeholder="12345">
        <label for="namaObat" class="labelObat">Nama Obat</label>
        <input type="text" name="namaObat" id="namaObat" class="inputObat">
        <label for="stokObat" class="labelObat">Stok Obat</label>
        <input type="text" name="stokObat" id="stokObat" class="inputObat">
        <label for="hargaObat" class="labelObat">Harga Obat</label>
        <input type="text" name="hargaObat" id="hargaObat" class="inputObat">
        <br>
        <input type="submit" name="" id="submitObat">
      </form>
    </div>
  </div>
</div>
<!-- end form tambah obat -->

<!-- tabel kategori obat -->

<div class="container tabelObat" id="tabelKategoriObat" style="display: none;">
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

<!-- tabel type obat -->


<div class="container tabelObat" id="tabelTipeObat" style="display: none;">
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