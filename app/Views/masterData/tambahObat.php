<!-- form tambah obat -->
<div class="content-wrapper ">
    <!-- Content Header (Page header) -->
    <div class="content-header m-1">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="title-form tf1">MASTER DATA</h1>
                    <h3 class="title-form tf2">Tambah Obat</h3>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="container-fluid formTambahObat" id="formTambahObat">
        <div class=" row">
            <div class="col">
                <div hidden class="alert" data-flashdata="<?= session()->getFlashdata('Pesan') ?>"></div>
                <div class="bg-form containe-fluid">
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
                            <label for="namaObat" class="col-sm-2 col-form-label">Nama Obat</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control <?= ($validation->hasError('namaObat')) ? 'is-invalid' : ''; ?>" id="namaObat" name="namaObat" value="<?= old('namaObat'); ?>">
                                <div class="invalid-feedback"> <?= $validation->getError('namaObat'); ?></div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="mfdObat" class="col-sm-2 col-form-label">MFD</label>
                            <div class="col-sm-4">
                                <input type="date" class=" mfdInput form-control <?= ($validation->hasError('mfdObat')) ? 'is-invalid' : ''; ?>" id="mfdObat" name="mfdObat" value="<?= old('mfdObat'); ?>">
                                <div class="invalid-feedback">Harus diisi</div>
                            </div>
                            <label for="expObat" class="col-sm-1 col-form-label">EXP</label>
                            <div class="col-sm-5 expInput">
                                <input type="date" class="form-control <?= ($validation->hasError('expObat')) ? 'is-invalid' : ''; ?>" id="expObat" name="expObat" value="<?= old('expObat'); ?>">
                                <div class="invalid-feedback">Harus diisi</div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="stokObat" class="col-sm-2 col-form-label">Stok Obat</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control <?= ($validation->hasError('stokObat')) ? 'is-invalid' : ''; ?>" id="stokObat" name="stokObat" value="<?= old('stokObat'); ?>">
                                <div class="invalid-feedback"> <?= $validation->getError('stokObat'); ?></div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="satuan1" class="col-sm-2 col-form-label">Satuan</label>
                            <div class="col-sm-10">
                                <select class="select <?= ($validation->hasError('satuan1')) ? 'is-invalid' : ''; ?>" id="satuan1" name="satuan1">
                                    <option class="form-select " id="satuan1" name="satuan1" value="<?= old('satuan1'); ?>">Satuan</option>
                                    <?php foreach ($satuan as $s) : ?>
                                        <option value="<?= $s['satuan_name']; ?>"><?= $s['satuan_name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback">Satuan harus diisi</div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="satuan2" class="col-sm-2 col-form-label">Satuan (mg)</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control <?= ($validation->hasError('satuan2')) ? 'is-invalid' : ''; ?>" id="satuan2" name="satuan2" value="<?= old('satuan2'); ?>">
                                <div class="invalid-feedback"> <?= $validation->getError('satuan2'); ?></div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="modalObat" class="col-sm-2 col-form-label">Modal Obat</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control <?= ($validation->hasError('modalObat')) ? 'is-invalid' : ''; ?>" id="modalObat" name="modalObat" value="<?= old('modalObat'); ?>">
                                <div class="invalid-feedback"> <?= $validation->getError('modalObat'); ?></div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="tipeObat" class="col-sm-2 col-form-label">Tipe obat</label>
                            <div class="col-sm-10 option">
                                <select class="select <?= ($validation->hasError('tipeObat')) ? 'is-invalid' : ''; ?>" id="tipeObat" name="tipeObat">
                                    <option class="form-select" id="tipeObat" name="tipeObat" value="<?= old('satuan1'); ?>">Tipe</option>
                                    <?php foreach ($type as $t) : ?>
                                        <option value="<?= $t['type_name']; ?>"><?= $t['type_name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback">Tipe Obat harus diisi</div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="kategoriObat" class="col-sm-2 col-form-label">Kategori Obat</label>
                            <div class="col-sm-10">
                                <select class="select <?= ($validation->hasError('kategoriObat')) ? 'is-invalid' : ''; ?>" id="kategoriObat" name="kategoriObat">
                                    <option class="form-select" id="kategoriObat" name="kategoriObat" value="<?= old('kategoriObat'); ?>">Kategori</option>
                                    <?php foreach ($category as $c) : ?>
                                        <option value="<?= $c['category_name']; ?>"><?= $c['category_name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback">Kategori obat harus diisi</div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="komposisiObat" class="col-sm-2 col-form-label">Komposisi Obat</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control <?= ($validation->hasError('komposisiObat')) ? 'is-invalid' : ''; ?>" id="komposisiObat" name="komposisiObat" value="<?= old('komposisiObat'); ?>"></input>
                                <div class="invalid-feedback"><?= $validation->getError('komposisiObat'); ?></div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="fungsiObat" class="col-sm-2 col-form-label">Fungsi Obat</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control <?= ($validation->hasError('fungsiObat')) ? 'is-invalid' : ''; ?>" id="fungsiObat" name="fungsiObat" value="<?= old('fungsiObat'); ?>"></input>
                                <div class="invalid-feedback"><?= $validation->getError('fungsiObat'); ?></div>
                            </div>
                        </div>
                        <button type="submit" class="btn submitObat mx-auto d-block" name="submitObat" id="submitObat">Tambah Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- end form tambah obat -->


<script src="<?= base_url('template/js/alertTambah.js'); ?>"></script>

<script>
    // var Toast = Swal.mixin({
    //     toast: true,
    //     position: 'top-end',
    //     showConfirmButton: false,
    //     timer: 3000
    // });

    // const flashData = $('.alert').data('flashdata');

    // var mfdDate = document.getElementById('mfdObat');
    // var expDate = document.getElementById('expObat');
    // var btnSubmit = document.getElementById('submitObat');

    // let compare = () => {
    //     let mfdValue = (new Date(mfdDate.value)).getDate();
    //     let expValue = (new Date(expDate.value)).getDate();

    //     if (expValue < mfdValue) {
    //         Toast.fire({
    //             icon: 'warning',
    //             title: 'Tanggal expired harus setelah tanggal dibuatnya obat'
    //         });
    //     } else {
    //         messageDiv.innerHTML = '';
    //         submitButton.disabled = false;
    //     }
    // };

    // btnSubmit.addEventListener('click', compare);
</script>