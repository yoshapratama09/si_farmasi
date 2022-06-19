<!-- form tambah obat -->
<div class="container formTambahObat" id="formTambahObat">
    <div class=" row">
        <div class="col">
            <h1 class="mb-2">Tambah Tipe Obat</h1>

            <div hidden class="alert" data-flashdata="<?= session()->getFlashdata('Pesan') ?>"></div>
            <form action="/tambahTipeObat" method="POST">
                <?= csrf_field(); ?>
                <div class="row mb-3">
                    <label for="idTipe" class="col-sm-2 col-form-label">Id Tipe Obat</label>
                    <div class="col-sm-10">
                        <input type="text" class=" w-25 form-control <?= ($validation->hasError('idTipe')) ? 'is-invalid' : ''; ?>" id="idTipe" name="idTipe" value="<?= old('idTipe'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('idTipe'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="namaTipe" class="col-sm-2 col-form-label">Tipe Obat</label>
                    <div class="col-sm-10">
                        <input type="text" class="w-25 form-control <?= ($validation->hasError('namaTipe')) ? 'is-invalid' : ''; ?>" id="namaTipe" name="namaTipe" value="<?= old('namaTipe'); ?>">
                        <div class="invalid-feedback">Nama Tipe obat harus diisi</div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" name="submitObat" id="submitObat">Tambah</button>
            </form>
        </div>
    </div>
</div>
<!-- end form tambah obat -->


<script src="<?= base_url('template/js/alertTambah.js'); ?>"></script>