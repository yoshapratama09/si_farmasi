  <!-- form edit obat -->

  <div class="container formEditSatuanObat" id="formEditSatuanObat">
      <div class="row">
          <div class="col">
              <h1 class="mb-3">Update Satuan Obat</h1>
              <form action="/updSatuanObat/<?= $satuan['satuan_id']; ?>" method="POST">
                  <?= csrf_field(); ?>
                  <div class="row mb-3">
                      <label for="idSatuan" class="col-sm-2 col-form-label">Id Satuan</label>
                      <div class="col-sm-10">
                          <input type="text" class="form-control" id="idSatuan" name="idSatuan" value="<?= $satuan['satuan_id']; ?>" readonly>
                          <div class="invalid-feedback">
                              <?= $validation->getError('idSatuan'); ?>
                          </div>
                      </div>
                  </div>
                  <div class="row mb-3">
                      <label for="namaSatuan" class="col-sm-2 col-form-label">nama Satuan</label>
                      <div class="col-sm-10">
                          <input type="text" class="form-control <?= ($validation->hasError('namaSatuan')) ? 'is-invalid' : ''; ?>" id="namaSatuan" name="namaSatuan" value="<?= $satuan['satuan_name']; ?>">
                          <div class="invalid-feedback">
                              <?= $validation->getError('namaSatuan'); ?>
                          </div>
                      </div>
                  </div>
                  <button type="submit" class="btn btn-primary" name="submitSatuan" id="submitSatuan">Update</button>

              </form>
          </div>
      </div>
  </div>
  <!-- end form edit obat -->