<!-- form tambah obat -->
<div class="content-wrapper ">
    <!-- Content Header (Page header) -->
    <div class="content-header m-1">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="title-form tf1">MASTER DATA</h1>
                    <h3 class="title-form tf2">Tambah Satuan Obat</h3>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="container-fluid formTambahSatuanObat" id="formTambahSatuanObat">
        <div class=" row">
            <div class="col">
                <div hidden class="alert" data-flashdata="<?= session()->getFlashdata('Pesan') ?>"></div>
                <div class="bg-form">
                    <form action="/tambahSatuanObat" method="POST">
                        <?= csrf_field(); ?>
                        <div class="row mb-3">
                            <label for="idSatuan" class="col-sm-2 col-form-label">Id Satuan Obat</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control <?= ($validation->hasError('idSatuan')) ? 'is-invalid' : ''; ?>" id="idSatuan" name="idSatuan" value="<?= old('idSatuan'); ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('idSatuan'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="namaSatuan" class="col-sm-2 col-form-label">Nama Satuan Obat</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control <?= ($validation->hasError('namaSatuan')) ? 'is-invalid' : ''; ?>" id="namaSatuan" name="namaSatuan" value="<?= old('namaSatuan'); ?>">
                                <div class="invalid-feedback"> <?= $validation->getError('namaSatuan'); ?></div>
                            </div>
                        </div>
                        <button type="submit" class="btn submitObat mx-auto d-block" name="submitObat" id="submitObat">Tambah Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end form tambah obat -->
</div>

<script src="<?= base_url('template/js/alertTambah.js'); ?>"></script>