<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="/" class="brand-link">
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


    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->


        <!--Sidebar-->
        <li class="nav-item">
          <a href="#" class="nav-link" id="masterData">
            <p>
              Master Data
              <i class="fas fa-angle-right right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item nav1">
              <a href="/Obat" class="nav-link" id="daftarObat">
                <p>Daftar Obat dan Resep</p>
              </a>
            </li>
            <li class="nav-item nav1">
              <a href="/data" class="nav-link">
                <p>Data-data</p>
                <i class="fas fa-angle-right right"></i>
              </a>
              <!-- item data-data -->
              <ul class="nav nav-treeview">
                <li class="nav-item nav2">
                  <a href="/Obat" class="nav-link" id="daftarObat">
                    <p>Daftar Supplier</p>
                  </a>
                </li>
                <li class="nav-item nav2">
                  <a href="/data" class="nav-link">
                    <p>Daftar Pasien</p>
                  </a>
                </li>
                <li class="nav-item nav2">
                  <a href="-" class="nav-link">
                    <p>Daftar Dokter</p>
                  </a>
                </li>
                <li class="nav-item nav2">
                  <a href="-" class="nav-link">
                    <p>Daftar Rumah Sakit</p>
                  </a>
                </li>
                <li class="nav-item nav2">
                  <a href="-" class="nav-link">
                    <p>Daftar Asuransi</p>
                  </a>
                </li>
                <li class="nav-item nav2">
                  <a href="-" class="nav-link">
                    <p>Daftar Sales</p>
                  </a>
                </li>
                <li class="nav-item nav2">
                  <a href="-" class="nav-link">
                    <p>Daftar Dokter Spesialis</p>
                  </a>
                </li>
              </ul>
              <!-- end item data-data -->
            </li>
            <li class="nav-item nav1">
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
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/persediaan/opname" class="nav-link">
                <p>Opname Stok</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/persediaan/pStock" class="nav-link">
                <p>Penyesuaian Stok</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/persediaan/pHarga" class="nav-link">
                <p>Penyesuaian Harga</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/persediaan/dataExp" class="nav-link">
                <p>Data Expired</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="-" class="nav-link">
                <p>Item In</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="-" class="nav-link">
                <p>Item Out</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link">
            <p>
              Pembelian
              <i class="fas fa-angle-right right"></i>
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
<script src="<?= base_url('template/js/sidebar.js'); ?>"></script>