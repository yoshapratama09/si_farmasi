  <!-- form edit obat -->

  <div class="container formTambahObat" id="formTambahObat">
      <div class="row">
          <div class="col">
              <h1 class="mb-3">Update Obat</h1>
              <form action="/updObat/<?= $medicine['medicine_id']; ?>" method="POST">
                  <?= csrf_field(); ?>
                  <label for="idObat" class="labelObat">ID Obat</label>
                  <input type="text" name="idObat" id="idObat" class="inputObat" value="<?= $medicine['medicine_id']; ?>" placeholder="12345" readonly>
                  <label for="namaObat" class="labelObat">Nama Obat</label>
                  <input type="text" name="namaObat" id="namaObat" class="inputObat" value="<?= $medicine['medicine_name']; ?>">
                  <label for="stokObat" class="labelObat">Stok Obat</label>
                  <input type="text" name="stokObat" id="stokObat" class="inputObat" value="<?= $medicine['medicine_stock']; ?>">
                  <label for="hargaObat" class="labelObat">Harga Obat</label>
                  <input type="text" name="hargaObat" id="hargaObat" class="inputObat" value="<?= $medicine['medicine_price']; ?>">
                  <br>
                  <input type="submit" name="btnUpdObat" id="submitObat" value="Update">
              </form>
          </div>
      </div>
  </div>
  <!-- end form edit obat -->