<!-- <script>
  $(document).ready(function() {
    // window.location.hash = '#divIsi';
    // document.getElementById('divIsi').scrollIntoView(false);
    // location.href = "/Obat";
    $('html, body').animate({
      scrollTop: $("#divIsi").offset().top
    }, 100000);
  });
</script> -->

<!-- tabel obat-->

<div class="container-fluid daftarObat" id="tableDaftarObat" style="display: block;">
  <div class="row">
    <div class="col">
      <h1 class="mb-2">Daftar Obat</h1>
      <div hidden class="alert" data-flashdata="<?= session()->getFlashdata('Pesan') ?>"></div>
      <button type="button" class="float-start col-lg-2 btn btn-block btn-success mb-2 btnTambahObat" id="btnTambahObat" onclick="location.href='/Obat/Tambah'">Tambah Obat</button>
      <form action="/Obat/Cari" method="post" class="mb-2">
        <div class="input-group inputCari w-25 float-end">
          <input name="cari" id="cari" placeholder="Nama Obat" type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
          <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Cari</button>
        </div>
      </form>
      <br>
      <br>
      <table class="table" id="myTable" class="table table-bordered table-hover">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Nama Obat</th>
            <th scope="col">Tipe</th>
            <th scope="col">Kategori</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($medicine as $m) : ?>
            <tr>
              <th scope="row"><?= $m['medicine_id']; ?></th>
              <td><?= $m['medicine_name']; ?></td>
              <td><?= $m['medicine_type']; ?></td>
              <td><?= $m['medicine_category']; ?></td>
              <td>
                <div class="btn-group">
                  <button type="button" class="btn btn-info">Action</button>
                  <button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown">
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <div class="dropdown-menu" role="menu">
                    <a class="dropdown-item" href="/updateObat/<?= $m['medicine_id'] ?>">Update</a>
                    <a class="dropdown-item btnDel" href="/delObat/<?= $m['medicine_id'] ?>">Hapus</a>
                  </div>
                </div>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>


<!-- end tabel obat-->

<!-- tabel kategori obat -->

<!-- <div class="container-fluid tabelObat" id="tabelKategoriObat" style="display: none;">
  <div class="row">
    <div class="col">
      <h1 class="mb-2">Kategori Obat</h1>
      <div hidden class="alert" data-flashdata="<?= session()->getFlashdata('Pesan') ?>"></div>
      <button type="button" class="float-start col-lg-3 btn btn-block btn-success mb-2 btnTambahObat" id="btnTambahObat" onclick="location.href='/Obat/Kategori/Tambah'">Tambah Kategori Obat</button>
      <form action="/Obat/Kategori/Cari" method="post" class="mb-2">
        <div class="input-group inputCari w-25 float-end">
          <input name="cari" id="cari" placeholder="Nama Obat" type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
          <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Cari</button>
        </div>
      </form>
      <br>
      <br>
      <table class="table" id="myTable" class="table table-bordered table-hover">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Kategori Obat</th>
            <th scope="col">Option</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($category as $c) : ?>
            <tr>
              <th scope="row"><?= $c['category_id']; ?></th>
              <td><?= $c['category_name']; ?></td>
              <td>
                <div class="btn-group">
                  <button type="button" class="btn btn-info">Action</button>
                  <button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown">
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <div class="dropdown-menu" role="menu">
                    <a class="dropdown-item" href="/updateKategoriObat/<?= $c['category_id'] ?>">Update</a>
                    <a class="dropdown-item btnDel" href="/delKategoriObat/<?= $c['category_id'] ?>">Hapus</a>
                  </div>
                </div>
              </td>
            </tr>

          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div> -->
<!-- end tabel kategori obat -->

<!-- tabel type obat -->
<!-- <div class="container-fluid tabelObat" id="tabelTipeObat" style="display: none;">
  <div class="row">
    <div class="col">
      <h1 class="mb-2">Tipe Obat</h1>
      <div hidden class="alert" data-flashdata="<?= session()->getFlashdata('Pesan') ?>"></div>
      <button type="button" class="float-start col-lg-3 btn btn-block btn-success mb-2 btnTambahObat" id="btnTambahObat" onclick="location.href='/Obat/Kategori/Tambah'">Tambah Tipe Obat</button>
      <form action="/Obat/Cari" method="post" class="mb-2">
        <div class="input-group inputCari w-25 float-end">
          <input name="cari" id="cari" placeholder="Nama Obat" type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
          <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Cari</button>
        </div>
      </form>
      <br>
      <br>
      <table class="table" id="myTable" class="table table-bordered table-hover">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Tipe</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($type as $t) : ?>
            <tr>
              <th scope="row"><?= $t['type_id']; ?></th>
              <td><?= $t['type_name']; ?></td>
              <td>
                <div class="btn-group">
                  <button type="button" class="btn btn-info">Action</button>
                  <button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown">
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <div class="dropdown-menu" role="menu">
                    <a class="dropdown-item" href="/updateKategoriObat/<?= $c['category_id'] ?>">Update</a>
                    <a class="dropdown-item btnDel" href="/delKategoriObat/<?= $c['category_id'] ?>">Hapus</a>
                  </div>
                </div>
              </td>
            </tr>

          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div> -->
<!-- end tabel type obat -->






<!--script filter-->
<script src="<?= base_url('template/js/ddtf.js'); ?>"></script>

<script>
  $('#myTable').ddTableFilter();
</script>

<script src="<?= base_url('template/js/alertTambah.js'); ?>"></script>
<script>
  $(function() {
    $('#myTable').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>