<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Info Box -->
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

    <section class="content">
        <div class="row">
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box bg-info">
                    <span class="info-box-icon"><i class="far fa-bookmark"></i></span>
                <div class="info-box-content">
                
                <span class="info-box-text">Bookmarks</span>
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
                <span class="info-box-text">Likes</span>
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
                <span class="info-box-text">Events</span>
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
                <span class="info-box-text">Comments</span>
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
    </section>
    

    <!-- Data Supplier -->
    <div class="container">
        <div class="row">
            <div class="col">
            <table class="table">
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
    </div>

    <!-- End Data Supplier -->

</div>
<!-- /.content-wrapper -->