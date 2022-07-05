<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <!-- <div class="row mb-2"> -->
                <!-- <div class="col-sm-6"> -->
                    <h1 class="me-1 text-right" style="font-size: 50px;">PERSEDIAAN</h1>
                <!-- </div>/.col -->

            <!-- </div> -->
            <!-- /.row -->    
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content mt-2 mb-2">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box boxMD boxMD1">
                        <div class="inner">
                            <h3><?= $dataExp; ?></h3>

                            <p>Daftar Obat Expired</p>
                        </div>

                        <div class="icon icon-md">
                            <i class="fas fa-solid fa-pills"></i>
                        </div>
                        <a href="<?= base_url('persediaan/dataExp'); ?>" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box boxMD boxMD2">
                        <div class="inner">
                            <h3>
                                <?php foreach($itemIn as $i){
                                    echo $i;
                                } ?>
                            </h3>

                            <p>Item In</p>
                        </div>
                        <div class="icon icon-md">
                            <i class="fas fa-solid fa-clock-rotate-left"></i>
                        </div>
                        <a href="<?= base_url('persediaan/itemIn'); ?>" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box boxMD boxMD3">
                        <div class="inner">
                            <h3>
                                <?php foreach($itemOut as $i){
                                    echo $i;
                                } ?>
                            </h3>

                            <p>Item Out</p>
                        </div>
                        <div class="icon icon-md">
                        <i class="fas fa-solid fa-share-from-square"></i>
                        </div>
                        <a href="<?= base_url('persediaan/itemOut'); ?>" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

            </div>
            <!-- /.row -->

            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->