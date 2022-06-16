<!-- form tambah obat -->
<div class="container formTambahObat" id="formTambahObat">
    <div class=" row">
        <div class="col">
            <h1 class="mb-2">Tambah Obat</h1>

            <div hidden class="alert" data-flashdata="<?= session()->getFlashdata('Pesan') ?>"></div>
            <form action="/tambahObat" method="POST">
                <?= csrf_field(); ?>
                <div class="row mb-3">
                    <label for="idObat" class="col-sm-2 col-form-label">Id Obat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('idObat')) ? 'is-invalid' : ''; ?>" id="idObat" name="idObat" value="<?= old('idObat'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('idObat'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="namaObat" class="col-sm-2 col-form-label">nama Obat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('namaObat')) ? 'is-invalid' : ''; ?>" id="namaObat" name="namaObat" value="<?= old('namaObat'); ?>">
                        <div class="invalid-feedback">Nama obat harus diisi</div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="stokObat" class="col-sm-2 col-form-label">Stok Obat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('stokObat')) ? 'is-invalid' : ''; ?>" id="stokObat" name="stokObat" value="<?= old('stokObat'); ?>">
                        <div class="invalid-feedback">Stok obat harus diisi</div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="hargaObat" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('hargaObat')) ? 'is-invalid' : ''; ?>" id="hargaObat" name="hargaObat" value="<?= old('hargaObat'); ?>">
                        <div class="invalid-feedback">Harga Obat harus diisi</div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary" name="submitObat" id="submitObat">Tambah</button>
            </form>
        </div>
    </div>
</div>
<!-- end form tambah obat -->


<script src="<?= base_url('template/js/alertTambah.js'); ?>"></script>