<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="<?= base_url('template/img/AdminLTELogo.png'); ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">RSUD Jombang</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?= base_url('template/img/user2-160x160.jpg'); ?>" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">Alexander Pierce</a>
      </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item menu-open">
          <a href="#" class="nav-link active">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="./index.html" class="nav-link active">
                <i class="far fa-circle nav-icon"></i>
                <p>Dashboard v1</p>
              </a>
            </li>
            <!-- <li class="nav-item">
                <a href="./index2.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v2</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index3.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v3</p>
                </a>
              </li> -->
          </ul>
        </li>
        <li class="nav-item">
          <a href="pages/widgets.html" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Widgets
              <span class="right badge badge-danger">New</span>
            </p>
          </a>
        </li>

        <!--Sidebar-->
        <li class="nav-item">
          <a href="#" class="nav-link" id="masterData">
            <p>
              Master Data
              <i class="fas fa-angle-right right"></i>
              <span class="badge badge-info right">6</span>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/Obat" class="nav-link" id="daftarObat">
                <p>Daftar Obat dan Resep</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/data" class="nav-link">
                <p>Data-data</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="-" class="nav-link">
                <p>Data pendukung</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link">
            <p>
              Persediaan
              <i class="fas fa-angle-right right"></i>
              <span class="badge badge-info right">6</span>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="-" class="nav-link">
                <p>Penyesuaian</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="-" class="nav-link">
                <p>Item masuk/keluar</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link">
            <p>
              Pembelian
              <i class="fas fa-angle-right right"></i>
              <span class="badge badge-info right">6</span>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="-" class="nav-link">
                <p>Penyesuaian</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="-" class="nav-link">
                <p>Item masuk/keluar</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link">
            <p>
              Penjualan
              <i class="fas fa-angle-right right"></i>
              <span class="badge badge-info right">6</span>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="-" class="nav-link">
                <p>Penyesuaian</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="-" class="nav-link">
                <p>Item masuk/keluar</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link">
            <p>
              Klinik
              <i class="fas fa-angle-right right"></i>
              <span class="badge badge-info right">6</span>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="-" class="nav-link">
                <p>Penyesuaian</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="-" class="nav-link">
                <p>Item masuk/keluar</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link">
            <p>
              Akuntansi
              <i class="fas fa-angle-right right"></i>
              <span class="badge badge-info right">6</span>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="-" class="nav-link">
                <p>Penyesuaian</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="-" class="nav-link">
                <p>Item masuk/keluar</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link">
            <p>
              Laporan
              <i class="fas fa-angle-right right"></i>
              <span class="badge badge-info right">6</span>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="-" class="nav-link">
                <p>Penyesuaian</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="-" class="nav-link">
                <p>Item masuk/keluar</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link">
            <p>
              Pengaturan
              <i class="fas fa-angle-right right"></i>
              <span class="badge badge-info right">6</span>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="-" class="nav-link">
                <p>Penyesuaian</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="-" class="nav-link">
                <p>Item masuk/keluar</p>
              </a>
            </li>
          </ul>
        </li>
        <!--end Sidebar-->

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>

<!--script sidebar-->
<script src="template/js/sidebar.js"></script>