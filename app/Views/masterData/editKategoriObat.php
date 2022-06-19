  <!-- form edit obat -->

  <div class="container formEditKategoriObat" id="formEditKategoriObat">
      <div class="row">
          <div class="col">
              <h1 class="mb-3">Update Obat</h1>
              <form action="/updKategoriObat/<?= $category['category_id']; ?>" method="POST">
                  <?= csrf_field(); ?>
                  <div class="row mb-3">
                      <label for="idKategori" class="col-sm-2 col-form-label">Id Kategori</label>
                      <div class="col-sm-10">
                          <input type="text" class="form-control" id="idKategori" name="idKategori" value="<?= $category['category_id']; ?>" readonly>
                          <div class="invalid-feedback">
                              <?= $validation->getError('idKategori'); ?>
                          </div>
                      </div>
                  </div>
                  <div class="row mb-3">
                      <label for="namaKategori" class="col-sm-2 col-form-label">nama Kategori</label>
                      <div class="col-sm-10">
                          <input type="text" class="form-control <?= ($validation->hasError('namaKategori')) ? 'is-invalid' : ''; ?>" id="namaKategori" name="namaKategori" value="<?= $category['category_name']; ?>">
                          <div class="invalid-feedback">
                              <?= $validation->getError('namaKategori'); ?>
                          </div>
                      </div>
                  </div>
                  <button type="submit" class="btn btn-primary" name="submitKategori" id="submitKategori">Update</button>

              </form>
          </div>
      </div>
  </div>
  <!-- end form edit obat -->