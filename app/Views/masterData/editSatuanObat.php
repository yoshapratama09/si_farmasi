  <!-- form edit obat -->
  <div class="content-wrapper ">
      <!-- Content Header (Page header) -->
      <div class="content-header m-1">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1 class="title-form tf1">MASTER DATA</h1>
                      <h3 class="title-form tf2">Ubah Satuan Obat</h3>
                  </div><!-- /.col -->
              </div><!-- /.row -->
          </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <div class="container-fluid formUpdateSatuanObat" id="formUpdateSatuanObat">
          <div class=" row">
              <div class="col">
                  <div hidden class="alert" data-flashdata="<?= session()->getFlashdata('Pesan') ?>"></div>
                  <div class="bg-form">
                      <form action="/updSatuanObat/<?= $satuan['satuan_id']; ?>" method="POST">
                          <?= csrf_field(); ?>
                          <div class="row mb-3">
                              <label for="idSatuan" class="col-sm-2 col-form-label">Id Satuan Obat</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control <?= ($validation->hasError('idSatuan')) ? 'is-invalid' : ''; ?>" id="idSatuan" name="idSatuan" value="<?= $satuan['satuan_id']; ?>" readonly>
                                  <div class="invalid-feedback">
                                      <?= $validation->getError('idSatuan'); ?>
                                  </div>
                              </div>
                          </div>
                          <div class="row mb-3">
                              <label for="namaSatuan" class="col-sm-2 col-form-label">Nama Satuan Obat</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control <?= ($validation->hasError('namaSatuan')) ? 'is-invalid' : ''; ?>" id="namaSatuan" name="namaSatuan" value="<?= $satuan['satuan_name']; ?>">
                                  <div class="invalid-feedback"> <?= $validation->getError('namaSatuan'); ?></div>
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