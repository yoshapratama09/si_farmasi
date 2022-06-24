  <!-- form edit obat -->

  <div class="content-wrapper ">
      <!-- Content Header (Page header) -->
      <div class="content-header m-1">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1 class="title-form tf1">MASTER DATA</h1>
                      <h3 class="title-form tf2">Ubah Obat</h3>
                  </div><!-- /.col -->
              </div><!-- /.row -->
          </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
      <div class="container-fluid formTambahObat" id="formTambahObat">
          <div class=" row">
              <div class="col">
                  <div hidden class="alert" data-flashdata="<?= session()->getFlashdata('Pesan') ?>"></div>
                  <div class="bg-form">
                      <form action="/updObat/<?= $medicine['medicine_id']; ?>" method="POST">
                          <?= csrf_field(); ?>
                          <div class="row mb-3">
                              <label for="idObat" class="col-sm-2 col-form-label">Id Obat</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control <?= ($validation->hasError('idObat')) ? 'is-invalid' : ''; ?>" id="idObat" name="idObat" value="<?= $medicine['medicine_id']; ?>" readonly>
                                  <div class="invalid-feedback">
                                      <?= $validation->getError('idObat'); ?>
                                  </div>
                              </div>
                          </div>
                          <div class="row mb-3">
                              <label for="namaObat" class="col-sm-2 col-form-label">Nama Obat</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control <?= ($validation->hasError('namaObat')) ? 'is-invalid' : ''; ?>" id="namaObat" name="namaObat" value="<?= $medicine['medicine_name']; ?>">
                                  <div class="invalid-feedback">Nama obat harus diisi</div>
                              </div>
                          </div>
                          <div class="row mb-3">
                              <label for="mfdObat" class="col-sm-2 col-form-label">Tanggal obat dibuat</label>
                              <div class="col-sm-10">
                                  <input type="date" class="form-control <?= ($validation->hasError('mfdObat')) ? 'is-invalid' : ''; ?>" id="mfdObat" name="mfdObat" value="<?= $medicine['medicine_mfd']; ?>">
                                  <div class="invalid-feedback">Harus diisi</div>
                              </div>
                          </div>
                          <div class="row mb-3">
                              <label for="expObat" class="col-sm-2 col-form-label">Tanggal kadaluarsa obat</label>
                              <div class="col-sm-10">
                                  <input type="date" class="form-control <?= ($validation->hasError('expObat')) ? 'is-invalid' : ''; ?>" id="expObat" name="expObat" value="<?= $medicine['medicine_exp']; ?>">
                                  <div class="invalid-feedback">Harus diisi</div>
                              </div>
                          </div>
                          <div class="row mb-3">
                              <label for="satuan1" class="col-sm-2 col-form-label">Satuan</label>
                              <div class="col-sm-10">
                                  <select class="select" id="satuan1" name="satuan1">
                                      <option class="form-select <?= ($validation->hasError('satuan1')) ? 'is-invalid' : ''; ?>" id="satuan1" name="satuan1" value="<?= $medicine['medicine_satuan1']; ?>"><?= $medicine['medicine_satuan1']; ?></option>
                                      <?php foreach ($satuan as $s) : ?>
                                          <option value="<?= $s['satuan_name']; ?>"><?= $s['satuan_name']; ?></option>
                                      <?php endforeach; ?>
                                  </select>
                                  <div class="invalid-feedback">Nama Supplier harus diisi</div>
                              </div>
                          </div>
                          <div class="row mb-3">
                              <label for="tipeObat" class="col-sm-2 col-form-label">Tipe obat</label>
                              <div class="col-sm-10 option">
                                  <select class="select" id="tipeObat" name="tipeObat">
                                      <option class="form-select <?= ($validation->hasError('tipeObat')) ? 'is-invalid' : ''; ?>" id="tipeObat" name="tipeObat" value="<?= $medicine['medicine_type']; ?>"><?= $medicine['medicine_type']; ?></option>
                                      <?php foreach ($type as $t) : ?>
                                          <option value="<?= $t['type_name']; ?>"><?= $t['type_name']; ?></option>
                                      <?php endforeach; ?>
                                  </select>
                                  <div class="invalid-feedback">Nama Supplier harus diisi</div>
                              </div>
                          </div>
                          <div class="row mb-3">
                              <label for="kategoriObat" class="col-sm-2 col-form-label">Kategori Obat</label>
                              <div class="col-sm-10">
                                  <select class="select" id="kategoriObat" name="kategoriObat">
                                      <option class="form-select <?= ($validation->hasError('kategoriObat')) ? 'is-invalid' : ''; ?>" id="kategoriObat" name="kategoriObat" value="<?= $medicine['medicine_category']; ?>"><?= $medicine['medicine_category']; ?></option>
                                      <?php foreach ($category as $c) : ?>
                                          <option value="<?= $c['category_name']; ?>"><?= $c['category_name']; ?></option>
                                      <?php endforeach; ?>
                                  </select>
                                  <div class="invalid-feedback">Nama Supplier harus diisi</div>
                              </div>
                          </div>
                          <div class="row mb-3">
                              <label for="komposisiObat" class="col-sm-2 col-form-label">Komposisi Obat</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control <?= ($validation->hasError('komposisiObat')) ? 'is-invalid' : ''; ?>" id="komposisiObat" name="komposisiObat" value="<?= $medicine['medicine_comp']; ?>"></input>
                                  <div class="invalid-feedback"><?= $validation->getError('komposisiObat'); ?></div>
                              </div>
                          </div>
                          <div class="row mb-3">
                              <label for="fungsiObat" class="col-sm-2 col-form-label">Fungsi Obat</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control <?= ($validation->hasError('fungsiObat')) ? 'is-invalid' : ''; ?>" id="fungsiObat" name="fungsiObat" value="<?= $medicine['medicine_func']; ?>"></input>
                                  <div class="invalid-feedback"><?= $validation->getError('fungsiObat'); ?></div>
                              </div>
                          </div>
                          <button type="submit" class="btn submitObat mx-auto d-block" name="submitObat" id="submitObat">Update Data</button>
                      </form>
                  </div>
              </div>
          </div>
      </div>
      <!-- end form edit obat -->
  </div>