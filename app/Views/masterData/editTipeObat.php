  <!-- form edit obat -->

  <div class="container formEditTipeObat" id="formEditTipeObat">
      <div class="row">
          <div class="col">
              <h1 class="mb-3">Update Tipe Obat</h1>
              <form action="/updTipeObat/<?= $type['type_id']; ?>" method="POST">
                  <?= csrf_field(); ?>
                  <div class="row mb-3">
                      <label for="idTipe" class="col-sm-2 col-form-label">Id Tipe</label>
                      <div class="col-sm-10">
                          <input type="text" class="form-control" id="idTipe" name="idTipe" value="<?= $type['type_id']; ?>" readonly>
                          <div class="invalid-feedback">
                              <?= $validation->getError('idTipe'); ?>
                          </div>
                      </div>
                  </div>
                  <div class="row mb-3">
                      <label for="namaTipe" class="col-sm-2 col-form-label">nama Tipe</label>
                      <div class="col-sm-10">
                          <input type="text" class="form-control <?= ($validation->hasError('namaTipe')) ? 'is-invalid' : ''; ?>" id="namaTipe" name="namaTipe" value="<?= $type['type_name']; ?>">
                          <div class="invalid-feedback">
                              <?= $validation->getError('namaTipe'); ?>
                          </div>
                      </div>
                  </div>
                  <button type="submit" class="btn btn-primary" name="submitTipe" id="submitTipe">Update</button>

              </form>
          </div>
      </div>
  </div>
  <!-- end form edit obat -->