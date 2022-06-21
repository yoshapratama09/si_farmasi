  <!-- form edit obat -->

  <div class="container-fluid formEditTipeObat" id="formEditTipeObat">
      <div class=" row">
          <div class="col">
              <h1 class="title-form tf1">MASTER DATA</h1>
              <h3 class="title-form tf2">Ubah Tipe Obat</h3>
              <div hidden class="alert" data-flashdata="<?= session()->getFlashdata('Pesan') ?>"></div>
              <div class="bg-form">
                  <form action="/updTipeObat/<?= $type['type_id']; ?>" method="POST">
                      <?= csrf_field(); ?>
                      <div class="row mb-3">
                          <label for="idTipe" class="col-sm-2 col-form-label">Id Tipe Obat</label>
                          <div class="col-sm-10">
                              <input type="text" class="form-control <?= ($validation->hasError('idTipe')) ? 'is-invalid' : ''; ?>" id="idTipe" name="idTipe" value="<?= $type['type_id']; ?>" readonly>
                              <div class="invalid-feedback">
                                  <?= $validation->getError('idTipe'); ?>
                              </div>
                          </div>
                      </div>
                      <div class="row mb-3">
                          <label for="namaTipe" class="col-sm-2 col-form-label">Nama Tipe Obat</label>
                          <div class="col-sm-10">
                              <input type="text" class="form-control <?= ($validation->hasError('namaTipe')) ? 'is-invalid' : ''; ?>" id="namaTipe" name="namaTipe" value="<?= $type['type_name']; ?>">
                              <div class="invalid-feedback"> <?= $validation->getError('namaTipe'); ?></div>
                          </div>
                      </div>
                      <button type="submit" class="btn submitObat mx-auto d-block" name="submitObat" id="submitObat">Update Data</button>
                  </form>
              </div>
          </div>
      </div>
  </div>
  <!-- end form edit obat -->