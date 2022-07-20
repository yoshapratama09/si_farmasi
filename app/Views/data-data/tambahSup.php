<!-- form tambah obat -->
<div class="content-wrapper ">
    <!-- Content Header (Page header) -->
    <div class="content-header m-1">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="title-form tf1">MASTER DATA</h1>
                    <h3 class="title-form tf2">Tambah Supplier</h3>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="container-fluid formTambahSup" id="formTambahSup">
        <div class=" row">
            <div class="col">
                <div hidden class="alert" data-flashdata="<?= session()->getFlashdata('Pesan') ?>"></div>
                <div class="bg-form containe-fluid">
                    <form action="/tambahSupplier" method="POST">
                        <?= csrf_field(); ?>
                        <div class="row mb-3">
                            <label for="idSup" class="col-sm-2 col-form-label">ID</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control <?= ($validation->hasError('idSup')) ? 'is-invalid' : ''; ?>" name="idSup" placeholder="000001" value="<?= old('idSup'); ?>" autofocus>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('idSup'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="namaSup" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control <?= ($validation->hasError('namaSup')) ? 'is-invalid' : ''; ?>" id="namaSup" name="namaSup" value="<?= old('namaSup'); ?>">
                                <div class="invalid-feedback"> <?= $validation->getError('namaSup'); ?></div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="alamatSup" class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control <?= ($validation->hasError('alamatSup')) ? 'is-invalid' : ''; ?>" id="alamatSup" name="alamatSup" style="height: 70px;" value="<?= old('alamatSup'); ?>">
                                <div class="invalid-feedback"> <?= $validation->getError('alamatSup'); ?></div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="kotaSup" class="col-sm-2 col-form-label">Kota</label>
                            <div class="col-sm-4">
                                <input type="text" class=" mfdInput form-control <?= ($validation->hasError('kotaSup')) ? 'is-invalid' : ''; ?>" id="kotaSup" name="kotaSup" value="<?= old('kotaSup'); ?>">
                                <div class="invalid-feedback">Harus diisi</div>
                            </div>
                            <label for="provSup" class="col-sm-1 col-form-label">Provinsi</label>
                            <div class="col-sm-5 expInput">
                                <input type="text" class="form-control <?= ($validation->hasError('provSup')) ? 'is-invalid' : ''; ?>" id="provSup" name="provSup" value="<?= old('provSup'); ?>">
                                <div class="invalid-feedback">Harus diisi</div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="posSup" class="col-sm-2 col-form-label">Kode Pos</label>
                            <div class="col-sm-4">
                                <input type="Text" class=" mfdInput form-control <?= ($validation->hasError('posSup')) ? 'is-invalid' : ''; ?>" id="posSup" name="posSup" value="<?= old('posSup'); ?>">
                                <div class="invalid-feedback">Harus diisi</div>
                            </div>
                            <label for="faxSup" class="col-sm-1 col-form-label">Fax</label>
                            <div class="col-sm-5 expInput">
                                <input type="number" class="form-control <?= ($validation->hasError('faxSup')) ? 'is-invalid' : ''; ?>" id="faxSup" name="faxSup" value="<?= old('faxSup'); ?>">
                                <div class="invalid-feedback">Harus diisi</div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="emailSup" class="col-sm-2 col-form-label">Jenis Supplier</label>
                            <div class="col-sm-10">
                                <select class="form-select" name="jenisSup" id="autoSizingSelect" style="border-color:black ;" required>
                                    <option selected> -- Pilih -- </option>
                                    <option value="Utama">Utama</option>
                                    <option value="Pilihan ke 2">Pilihan ke 2</option>
                                    <option value="Pilihan ke 3">Pilihan ke 3</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="emailSup" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control <?= ($validation->hasError('emailSup')) ? 'is-invalid' : ''; ?>" id="emailSup" name="emailSup" value="<?= old('emailSup'); ?>">
                                <div class="invalid-feedback"> <?= $validation->getError('emailSup'); ?></div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="phoneSup" class="col-sm-2 col-form-label">Kontak</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control <?= ($validation->hasError('phoneSup')) ? 'is-invalid' : ''; ?>" id="phoneSup" name="phoneSup" value="<?= old('phoneSup'); ?>">
                                <div class="invalid-feedback"> <?= $validation->getError('phoneSup'); ?></div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success mx-auto d-block">Tambah Data Supplier</button>
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