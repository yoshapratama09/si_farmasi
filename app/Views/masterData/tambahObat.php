<!-- form tambah obat -->
<div class="container formTambahObat" id="formTambahObat">
    <div class=" row">
        <div class="col">
            <h1 class="mb-2">Tambah Obat</h1>
            <div hidden class="alert" data-flashdata="<?= session()->getFlashdata('Pesan') ?>"></div>
            <form action="/tambahObat" method="POST">
                <?= csrf_field(); ?>
                <label for="idObat" class="labelObat">ID Obat</label>
                <input type="text" name="idObat" id="idObat" class="inputObat" placeholder="12345">
                <label for="namaObat" class="labelObat">Nama Obat</label>
                <input type="text" name="namaObat" id="namaObat" class="inputObat">
                <label for="stokObat" class="labelObat">Stok Obat</label>
                <input type="text" name="stokObat" id="stokObat" class="inputObat">
                <label for="hargaObat" class="labelObat">Harga Obat</label>
                <input type="text" name="hargaObat" id="hargaObat" class="inputObat">
                <br>
                <input type="hidden" name="" id="cek" value="<?php echo (isset($value)) ? $value : ''; ?>">
                <input type="submit" name="submitObat" id="submitObat" value="Submit">
            </form>
        </div>
    </div>
</div>
<!-- end form tambah obat -->


<script src="<?= base_url('template/js/alertTambah.js'); ?>"></script>