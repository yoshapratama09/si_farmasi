<!-- tabel obat-->

<div class="container tabelObat" id="tabelObat">
  <div class="row">
    <div class="col">
      <h1 class="mb-2">Daftar Obat</h1>

      <button type="button" class=" col-lg-2 btn btn-block btn-success mb-2 btnTambahObat" id="btnTambahObat" onclick="location.href='/Obat/Tambah'">Tambah Obat</button>
      <form action="/Obat/Cari" method="post" class="mb-2">
        <input type="search" name="cari" id="cari" placeholder="Nama Obat">
        <button type="submit">Cari</button>
      </form>
      <!-- <div class="card-body"> -->
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