  <!-- form edit obat -->

  <div class="container-fluid formEditKategoriObat" id="formEditKategriObat">
      <div class=" row">
          <div class="col">
              <h1 class="title-form tf1">MASTER DATA</h1>
              <h3 class="title-form tf2">Update Kategori Obat</h3>
              <div hidden class="alert" data-flashdata="<?= session()->getFlashdata('Pesan') ?>"></div>
              <div class="bg-form">
                  <form action="/updKategoriObat/<?= $category['category_id']; ?>" method="POST">
                      <?= csrf_field(); ?>
                      <div class="row mb-3">
                          <label for="idKategori" class="col-sm-2 col-form-label">Id Kategori Obat</label>
                          <div class="col-sm-10">
                              <input type="text" class="form-control <?= ($validation->hasError('idKategori')) ? 'is-invalid' : ''; ?>" id="idKategori" name="idKategori" value="<?= $category['category_id']; ?>" readonly>
                              <div class="invalid-feedback">
                                  <?= $validation->getError('idKategori'); ?>
                              </div>
                          </div>
                      </div>
                      <div class="row mb-3">
                          <label for="namaKategori" class="col-sm-2 col-form-label">Nama Kategori Obat</label>
                          <div class="col-sm-10">
                              <input type="text" class="form-control <?= ($validation->hasError('namaKategori')) ? 'is-invalid' : ''; ?>" id="namaKategori" name="namaKategori" value="<?= $category['category_name']; ?>">
                              <div class="invalid-feedback"> <?= $validation->getError('namaKategori'); ?></div>
                          </div>
                      </div>
                      <button type="submit" class="btn submitObat mx-auto d-block" name="submitObat" id="submitObat">Update Data</button>
                  </form>
              </div>
          </div>
      </div>
  </div>
  <!-- end form edit obat -->