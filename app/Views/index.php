<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard v1</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>150</h3>

              <p>New Orders</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>53<sup style="font-size: 20px">%</sup></h3>

              <p>Bounce Rate</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>44</h3>

              <p>User Registrations</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>65</h3>

              <p>Unique Visitors</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->

      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->

  <!--button insert-->
  <div class="container">
    <div class="row">
      <div class="col-lg-2">
        <button type="button" class="btn btn-block btn-primary mb-2 btnDaftarObat" id="btnDaftarObat">Daftar Obat</button>
      </div>
      <div class="col-lg-2">
        <button type="button" class="btn btn-block btn-primary mb-2 btnTambahObat" id="btnTambahObat">Tambah Obat</button>
      </div>
    </div>
  </div>

  <!-- tabel obat-->
  <div class="container tabelObat" id="tabelObat">
    <div class="row">
      <div class="col">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Nama Obat</th>
              <th scope="col">Stok</th>
              <th scope="col">Harga</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($medicine as $m) : ?>
              <tr>
                <th scope="row"><?= $m['medicine_id']; ?></th>
                <td><?= $m['medicine_name']; ?></td>
                <td><?= $m['medicine_stock']; ?></td>
                <td><?= $m['medicine_price']; ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <!-- end tabel obat-->



  <!-- form tambah obat -->
  <div class="container formTambahObat" id="formTambahObat" style="display: none;">
    <div class="row">
      <div class="col">
        <label for="idObat">ID Obat</label>
        <input type="text" name="idObat" id="idObat">
      </div>
    </div>
  </div>
  <!-- end form tambah obat -->

  <!--script obat-->
  <script src="template/js/medicine.js"></script>

  <script>
  </script>


</div>
<!-- /.content-wrapper -->