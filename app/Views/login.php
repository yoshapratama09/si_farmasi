<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="template/css/adminlte.min.css">
    <link rel="stylesheet" href="template/css/login.css">
    <title>RSUD Jombang || Login</title>
</head>
<body>
    
    <section class="login_box">
            <div class="row justify-content-center align-items-center">
                <div class="col-12 m-5">
                    <div class="card pt-5" style="border-radius: 1rem;">
                        <h5 class="text-center mb-0" >SISTEM INFORMASI FARMASI</h5>
                        <h3 class="text-center mt-0">RSUD JOMBANG</h3>
                        <div class="card-body p-5" id="card-body">
                            <section class="form-login" id="form-login">
                                <?php 
                                    if(session()->getFlashdata('msg') !== NULL):       
                                ?>
                                <div class="alert alert-danger">
                                    <strong>Gagal!</strong> <?php echo session()->getFlashdata('msg'); ?>
                                </div>
                                <?php endif;?>
                                
                                <form action="<?php echo base_url(); ?>/login/loginAuth" method="post">
                                    <div class="input-group mb-3">
                                        <input type="text" name="username" class="form-control text-center rounded-lg shadow" placeholder="Username" required>
                                    </div>
                                    <div class="input-group mb-4">
                                        <input type="password" name="password" class="form-control text-center rounded-lg shadow" placeholder="Password" required>
                                    </div>
                                    <div class="mb-3 text-center">
                                        <button type="submit" class="btn btn-primary rounded-lg-50 shadow-lg">Login</button>
                                    </div>
                                </form>
                                
                                <div class="text-center mt-5">
                                    <p class="">Belum memiliki akun? <a href="#!" class="text-blue-50 fw-bold" id="regis">Buat Akun</a></p>
                                </div>
                            </section>

                            <section class="buatAkun" id="buatAkun" style="display: none;">
                                <div class="text-center mb-3" >
                                    <h5 class="m-0 p-0" style="font-weight: 500">SILAHKAN MENGHUBUNGI ADMIN IT</h5>
                                    <h5 class="m-0 p-0" style="font-weight: 500">UNTUK PEMBUATAN AKUN</h5>
                                </div>
                                <div class="mb-3 mt-5 text-center">
                                    <button type="submit" class="btn btn-primary rounded-lg shadow" id="kembali">Kembali</button>
                                </div>
                            </section>
                            
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="template/js/adminlte.min.js"></script>
    <script src="template/js/login.js"></script>

</body>
</html>