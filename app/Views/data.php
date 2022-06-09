<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Info Box -->
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Data</h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box bg-info">
                    <span class="info-box-icon"><i class="far fa-bookmark"></i></span>
                <div class="info-box-content">
                
                <span class="info-box-text">Supplier</span>
                <span class="info-box-number">41,410</span>

                <div class="progress">
                    <div class="progress-bar" style="width: 70%"></div>
                </div>
                <span class="progress-description">
                    70% Increase in 30 Days
                </span>
            </div>
                <!-- /.info-box-content -->
        </div>
        
        <!-- /.info-box -->
        </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box bg-success">
                    <span class="info-box-icon"><i class="far fa-thumbs-up"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Pasien</span>
                        <span class="info-box-number">41,410</span>

                        <div class="progress">
                            <div class="progress-bar" style="width: 70%"></div>
                        </div>  
                        <span class="progress-description">
                            70% Increase in 30 Days
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            <!-- /.info-box -->
            </div>
            
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box bg-warning">
                    <span class="info-box-icon"><i class="far fa-calendar-alt"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Dokter</span>
                        <span class="info-box-number">41,410</span>

                        <div class="progress">
                            <div class="progress-bar" style="width: 70%"></div>
                        </div>
                        <span class="progress-description">
                            70% Increase in 30 Days
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box bg-danger">
                    <span class="info-box-icon"><i class="fas fa-comments"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Sales</span>
                        <span class="info-box-number">41,410</span>

                        <div class="progress">
                            <div class="progress-bar" style="width: 70%"></div>
                        </div>
                        <span class="progress-description">
                            70% Increase in 30 Days
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- Container -->
    </section>
    

    
    <div class="container">
        <!-- Data Supplier -->
        <div class="row">
            <h4>Data Supplier</h3>
            <div class="col">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nama Supplier</th>
                    <th scope="col">Alamat </th>
                    <th scope="col">Nomor Telepon</th>
                    <th scope="col">Email</th>
                    <th scope="col">Negara</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($data as $sp) : ?>
                    <tr>
                    <th scope="row"><?= $sp['supplier_id']; ?></th>
                    <td><?= $sp['supplier_name']; ?></td>
                    <td><?= $sp['supplier_address']; ?></td>
                    <td><?= $sp['supplier_phone']; ?></td>
                    <td><?= $sp['supplier_email']; ?></td>
                    <td><?= $sp['supplier_country']; ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            </div>
        </div>
        <!-- End Row Data Supplier -->

        <!-- Data Pasien -->
        <div class="row mt-2">
        <h4>Data Pasien</h3>
            <div class="col">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nama Supplier</th>
                    <th scope="col">Alamat </th>
                    <th scope="col">Nomor Telepon</th>
                    <th scope="col">Email</th>
                    <th scope="col">Negara</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($data as $sp) : ?>
                    <tr>
                    <th scope="row"><?= $sp['supplier_id']; ?></th>
                    <td><?= $sp['supplier_name']; ?></td>
                    <td><?= $sp['supplier_address']; ?></td>
                    <td><?= $sp['supplier_phone']; ?></td>
                    <td><?= $sp['supplier_email']; ?></td>
                    <td><?= $sp['supplier_country']; ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            </div>
        </div>
        <!-- End Row Data Pasien -->

        <!-- Data Dokter -->
        <div class="row mt-2">
        <h4>Data Dokter</h3>
            <div class="col">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nama Supplier</th>
                    <th scope="col">Alamat </th>
                    <th scope="col">Nomor Telepon</th>
                    <th scope="col">Email</th>
                    <th scope="col">Negara</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($data as $sp) : ?>
                    <tr>
                    <th scope="row"><?= $sp['supplier_id']; ?></th>
                    <td><?= $sp['supplier_name']; ?></td>
                    <td><?= $sp['supplier_address']; ?></td>
                    <td><?= $sp['supplier_phone']; ?></td>
                    <td><?= $sp['supplier_email']; ?></td>
                    <td><?= $sp['supplier_country']; ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            </div>
        </div>
        <!-- End Row Data Dokter -->

        <!-- Data Rumah Sakit -->
        <div class="row mt-2">
        <h4>Data Lainnya</h3>
            <div class="col">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nama Supplier</th>
                    <th scope="col">Alamat </th>
                    <th scope="col">Nomor Telepon</th>
                    <th scope="col">Email</th>
                    <th scope="col">Negara</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($data as $sp) : ?>
                    <tr>
                    <th scope="row"><?= $sp['supplier_id']; ?></th>
                    <td><?= $sp['supplier_name']; ?></td>
                    <td><?= $sp['supplier_address']; ?></td>
                    <td><?= $sp['supplier_phone']; ?></td>
                    <td><?= $sp['supplier_email']; ?></td>
                    <td><?= $sp['supplier_country']; ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            </div>
        </div>
        <!-- End Row Data Sales -->

    </div>
    

</div>
<!-- /.content-wrapper -->