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
      <button type="button" class="float-end col-lg-3 btn btn-block btn-success mb-2 btnTambahObat" id="btnTambahObat" onclick="location.href='/Obat/Tambah'">
        <i class="fas fa-plus"></i>
        Tambah Obat
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
            <th scope="col">Nama</th>
            <th scope="col">Tipe</th>
            <th scope="col">Kategori</th>
            <th scope="col">Stok</th>
            <th scope="col" class="action">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($medicine as $m) : ?>
            <tr>
              <th scope="row"><?= $m['medicine_id']; ?></th>
              <td><?= $m['medicine_name']; ?></td>
              <td id="tdF"><?= $m['medicine_type']; ?></td>
              <td id="tdF"><?= $m['medicine_category']; ?></td>
              <td><?= $m['stock_qty']; ?></td>
              <td class="action">
                <div class="row justify-content-center">
                  <div class="col-lg-4">
                    <button id="btnDetail" type="button" class="btn btn-block btn-warning btnDetail" data-name="<?= $m['medicine_name']; ?>" data-type="<?= $m['medicine_type']; ?>" data-category="<?= $m['medicine_category']; ?>" data-comp="<?= $m['medicine_comp']; ?>" data-func="<?= $m['medicine_func']; ?>" data-toggle="modal" data-target="#exampleModalCenter">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                      </svg></button>
                  </div>
                  <div class="col-lg-4">
                    <button type="button" class="btn btn-block btn-primary" onclick="location.href='/updateObat/<?= $m['medicine_id'] ?>'">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                      </svg></button>
                  </div>
                  <div class="col-lg-4">
                    <button type="button" class="btn btn-block btn-danger" onclick="location.href='/delObat/<?= $m['medicine_id'] ?>'"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                      </svg></button>
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

<!--modal-->

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
      rowReorder: true,
      columnDefs: [{
        orderable: false,
        className: 'reorder',
        targets: 5
      }]
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