<!-- form tambah obat -->
<div class="container formTambahObat" id="formTambahObat">
    <div class=" row">
        <div class="col">
            <h1 class="mb-2">Tambah Satuan Obat</h1>

            <div hidden class="alert" data-flashdata="<?= session()->getFlashdata('Pesan') ?>"></div>
            <form action="/tambahSatuanObat" method="POST">
                <?= csrf_field(); ?>
                <div class="row mb-3">
                    <label for="idSatuan" class="col-sm-2 col-form-label">Id Satuan Obat</label>
                    <div class="col-sm-10">
                        <input type="text" class=" w-25 form-control <?= ($validation->hasError('idSatuan')) ? 'is-invalid' : ''; ?>" id="idSatuan" name="idSatuan" value="<?= old('idSatuan'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('idSatuan'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="namaSatuan" class="col-sm-2 col-form-label">Satuan Obat</label>
                    <div class="col-sm-10">
                        <input type="text" class="w-25 form-control <?= ($validation->hasError('namaSatuan')) ? 'is-invalid' : ''; ?>" id="namaSatuan" name="namaSatuan" value="<?= old('namaSatuan'); ?>">
                        <div class="invalid-feedback">Nama Satuan obat harus diisi</div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" name="submitObat" id="submitObat">Tambah</button>
            </form>
        </div>
    </div>
</div>
<!-- end form tambah obat -->


<script src="<?= base_url('template/js/alertTambah.js'); ?>"></script>