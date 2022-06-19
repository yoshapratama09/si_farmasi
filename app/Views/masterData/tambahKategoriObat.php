<!-- form tambah obat -->
<div class="container formTambahObat" id="formTambahObat">
    <div class=" row">
        <div class="col">
            <h1 class="mb-2">Tambah Kategori Obat</h1>

            <div hidden class="alert" data-flashdata="<?= session()->getFlashdata('Pesan') ?>"></div>
            <form action="/tambahKategoriObat" method="POST">
                <?= csrf_field(); ?>
                <div class="row mb-3">
                    <label for="idKategori" class="col-sm-2 col-form-label">Id Kategori Obat</label>
                    <div class="col-sm-10">
                        <input type="text" class=" w-25 form-control <?= ($validation->hasError('idKategori')) ? 'is-invalid' : ''; ?>" id="idKategori" name="idKategori" value="<?= old('idKategori'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('idKategori'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="namaKategori" class="col-sm-2 col-form-label">Kategori Obat</label>
                    <div class="col-sm-10">
                        <input type="text" class="w-25 form-control <?= ($validation->hasError('namaKategori')) ? 'is-invalid' : ''; ?>" id="namaKategori" name="namaKategori" value="<?= old('namaKategori'); ?>">
                        <div class="invalid-feedback">Nama obat harus diisi</div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" name="submitObat" id="submitObat">Tambah</button>
            </form>
        </div>
    </div>
</div>
<!-- end form tambah obat -->


<script src="<?= base_url('template/js/alertTambah.js'); ?>"></script>