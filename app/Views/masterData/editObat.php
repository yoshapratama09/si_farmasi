  <!-- form edit obat -->

  <div class="container formTambahObat" id="formTambahObat">
      <div class="row">
          <div class="col">
              <h1 class="mb-3">Update Obat</h1>
              <form action="/updObat/<?= $medicine['medicine_id']; ?>" method="POST">
                  <?= csrf_field(); ?>
                  <div class="row mb-3">
                      <label for="idObat" class="col-sm-2 col-form-label">Id Obat</label>
                      <div class="col-sm-10">
                          <input type="text" class="form-control" id="idObat" name="idObat" value="<?= $medicine['medicine_id']; ?>" readonly>
                          <div class="invalid-feedback">
                              <?= $validation->getError('idObat'); ?>
                          </div>
                      </div>
                  </div>
                  <div class="row mb-3">
                      <label for="namaObat" class="col-sm-2 col-form-label">nama Obat</label>
                      <div class="col-sm-10">
                          <input type="text" class="form-control <?= ($validation->hasError('namaObat')) ? 'is-invalid' : ''; ?>" id="namaObat" name="namaObat" value="<?= $medicine['medicine_name']; ?>">
                          <div class="invalid-feedback">
                              <?= $validation->getError('namaObat'); ?>
                          </div>
                      </div>
                  </div>
                  <div class="row mb-3">
                      <label for="stokObat" class="col-sm-2 col-form-label">Stok Obat</label>
                      <div class="col-sm-10">
                          <input type="text" class="form-control <?= ($validation->hasError('stokObat')) ? 'is-invalid' : ''; ?>" id="stokObat" name="stokObat" value="<?= $medicine['medicine_stock']; ?>">
                          <div class="invalid-feedback">
                              <?= $validation->getError('stokObat'); ?>
                          </div>
                      </div>
                  </div>
                  <div class="row mb-3">
                      <label for="hargaObat" class="col-sm-2 col-form-label">Password</label>
                      <div class="col-sm-10">
                          <input type="text" class="form-control <?= ($validation->hasError('hargaObat')) ? 'is-invalid' : ''; ?>" id="hargaObat" name="hargaObat" value="<?= $medicine['medicine_price']; ?>">
                          <div class="invalid-feedback">
                              <?= $validation->getError('hargaObat'); ?>
                          </div>
                      </div>
                  </div>

                  <button type="submit" class="btn btn-primary" name="submitObat" id="submitObat">Update</button>


              </form>
          </div>
      </div>
  </div>
  <!-- end form edit obat -->