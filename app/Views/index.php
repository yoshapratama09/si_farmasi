<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header m-1">
    <div class="container-fluid">
      <div class="row mb-2">
        <div>
          <h1 class="title-form tf1 text-right">QUICK ACCESS</h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Master Data -->
  <section class="content mb-5">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-6 col-6">
          <!-- small box -->
          <div class="small-box boxQC boxQC1" onclick="location.href='/Obat'">
            <div class="inner">
              <p>Daftar Obat</p>
            </div>
            <div class="icon">
              <!-- <i class="fas fa-solid fa-pills"></i> -->
              <img src="<?= base_url('template/img/medicine.png'); ?>" alt="">
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-6 col-6">
          <!-- small box -->
          <div class="small-box boxQC boxQC2" onclick="location.href='/supplier'">
            <div class="inner">
              <p>Daftar Supplier</p>
            </div>
            <div class="icon">
              <!-- <i class="fas fa-solid fa-users-gear"></i> -->
              <img src="<?= base_url('template/img/supply-chain.png'); ?>" alt="">
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-6 col-6">
          <!-- small box -->
          <div class="small-box boxQC boxQC3" onclick="location.href='/persediaan/opname'">
            <div class="inner">
              <p>Stok Obat</p>
            </div>
            <div class="icon">
              <!-- <i class="fas fa-solid fa-user-doctor"></i> -->
              <img src="<?= base_url('template/img/stokObat.png'); ?>" alt="">
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-6 col-6">
          <!-- small box -->
          <div class="small-box boxQC boxQC4">
            <div class="inner">
              <p>Pembelian Obat</p>
            </div>
            <div class="icon">
              <!-- <i class="fas fa-solid fa-users"></i> -->
              <img src="<?= base_url('template/img/pembelianObat.png'); ?>" alt="">
            </div>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <div class="col-lg-6 col-6">
          <!-- small box -->
          <div class="small-box boxQC boxQC5">
            <div class="inner">
              <p>Penjualan Obat</p>
            </div>
            <div class="icon">
              <!-- <i class="ion ion-bag"></i> -->
              <img src="<?= base_url('template/img/penjualanObat.png'); ?>" alt="">
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-6 col-6">
          <!-- small box -->
          <div class="small-box boxQC boxQC6">
            <div class="inner">
              <p>Laporan</p>
            </div>
            <div class="icon">
              <!-- <i class="ion ion-stats-bars"></i> -->
              <img src="<?= base_url('template/img/laporan.png'); ?>" alt="">
            </div>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->

</div>
<!-- /.content-wrapper -->