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
      <h3 class="title-form tf2">Daftar Obat</h3>
      <div hidden class="alert" data-flashdata="<?= session()->getFlashdata('Pesan') ?>"></div>
      <button type="button" class="float-end col-lg-1 btn btn-block btn-success mb-2 btnTambahObat" id="btnTambahObat" onclick="location.href='/Obat/Tambah'">
        <i class="fas fa-plus"></i>
      </button>
      <form action="/Obat/Cari" method="post" class="mb-2">
        <div class="input-group inputCari w-25 float-start">
          <input name="cari" id="cari" placeholder="Nama Obat" type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
          <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Cari</button>
        </div>
      </form>
      <br>
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
                <div class="row">
                  <div class="col-lg-3">
                    <button id="btnDetail" type="button" class="btn btn-block btn-warning btnDetail" data-name="<?= $m['medicine_name']; ?>" data-type="<?= $m['medicine_type']; ?>" data-category="<?= $m['medicine_category']; ?>" data-comp="<?= $m['medicine_comp']; ?>" data-func="<?= $m['medicine_func']; ?>" data-toggle="modal" data-target="#exampleModalCenter">Detail</button>
                  </div>
                  <div class="col-lg-3">
                    <button type="button" class="btn btn-block btn-primary" onclick="location.href='/updateObat/<?= $m['medicine_id'] ?>'">Edit</button>
                  </div>
                  <div class="col-lg-3">
                    <button type="button" class="btn btn-block btn-danger" onclick="location.href='/delObat/<?= $m['medicine_id'] ?>'">Hapus</button>
                  </div>
                </div>
                <!-- <div class="btn-group">
                  <button type="button" class="btn btn-info">Action</button>
                  <button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown">
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <div class="dropdown-menu" role="menu">
                    <a class="dropdown-item" href="/updateObat/<?= $m['medicine_id'] ?>">Update</a>
                    <a class="dropdown-item btnDel" href="/delObat/<?= $m['medicine_id'] ?>">Hapus</a>
                  </div>
                </div> -->
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>


<!-- end tabel obat-->

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Detail Obat</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row mb-3">
          <h4 for="namaObatM" class="col-sm-5 col-form-label">Nama Obat</h4>
          <div class="col-sm-7">
            <h6 id="namaObatM"></h6>
          </div>
        </div>
        <div class="row mb-3">
          <h4 for="tipeObatM" class="col-sm-5 col-form-label">Tipe Obat</h4>
          <div class="col-sm-7">
            <h6 id="tipeObatM"></h6>
          </div>
        </div>
        <div class="row mb-3">
          <h4 for="kategoriObatM" class="col-sm-5 col-form-label">Kategori Obat</h4>
          <div class="col-sm-7">
            <h6 id="kategoriObatM"></h6>
          </div>
        </div>
        <div class="row mb-3">
          <h4 for="kompObatM" class="col-sm-5 col-form-label">Komposisi Obat</h4>
          <div class="col-sm-7">
            <h6 id="kompObatM"></h6>
          </div>
        </div>
        <div class="row mb-3">
          <h4 for="funcObatM" class="col-sm-5 col-form-label">Fungsi Obat</h4>
          <div class="col-sm-7">
            <h6 id="funcObatM"></h6>
          </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

</div>
<!-- /.content-wrapper -->





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



  $('.btnDetail').click(function() {
    // console.log(1)
    // $('#exampleModalCenter').modal();
    var name = $(this).attr('data-name');
    var type = $(this).attr('data-type');
    var category = $(this).attr('data-category');
    var comp = $(this).attr('data-comp');
    var func = $(this).attr('data-func');

    document.getElementById('namaObatM').innerHTML = name
    document.getElementById('tipeObatM').innerHTML = type
    document.getElementById('kategoriObatM').innerHTML = category
    document.getElementById('kompObatM').innerHTML = comp
    document.getElementById('funcObatM').innerHTML = func
    // console.log(name)

  })
</script>