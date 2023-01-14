<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda | Kelurahan</title>

  <!-- Bootstrap -->
  <link rel="stylesheet" href="<?php echo $main_url?>assets/style/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo $main_url?>assets/style/bootstrap/css/bootstrap.css">
  
  <!-- MyStyle -->
  <link rel="stylesheet" href="<?php echo $main_url?>assets/style/style.css">

  <!-- Fontawesome -->
  <link rel="stylesheet" href="<?php echo $main_url?>assets/style/fontawesome.css">
  <link rel="stylesheet" href="<?php echo $main_url?>assets/style/fontawesome.min.css">
  <link rel="stylesheet" href="<?php echo $main_url?>assets/style/style.css">

</head>
<body>

    <div class="" style="overflow-y: none !important;">
    <!-- Navbar -->
        <nav class="navbar navbar-expand-lg bg-secondary position-relative shadow">
            <div class="container-fluid">
            <a class="navbar-brand ps-3" href="#">
                <img src="../assets/img/logoKel.png" width="40" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav d-flex w-100 justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="<?= $main_url ?>index.php/beranda">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="<?= $main_url ?>index.php/ktp">KTP</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= $main_url ?>index.php/kk">KK</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= $main_url ?>index.php/kelahiran" class="nav-link">KELAHIRAN</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= $main_url ?>index.php/kematian" class="nav-link">KEMATIAN</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= $main_url ?>index.php/pindah" class="nav-link">PINDAH</a>
                    </li>
                    <li class="nav-item ">
                        <a href="<?= $main_url ?>index.php/datang" class="nav-link">DATANG</a>
                    </li>
                </ul>
            </div>
            </div>
        </nav>
    <!-- End Navbar -->

     <!-- content -->
     <div id="content" class="container-fluid">
            <div class="header text-center mx-auto w-100 pt-2">
                <div class="card w-75 mx-auto shadow-lg">
                    <div class="card-header">
                        <h1>Pengajuan KTP</h1>
                    </div>
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data" class="w-75 mx-auto">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" placeholder="No Pelayanan" name="noPelayanan" disabled>
                                <label for="floatingInput">No Pelayanan</label>
                            </div>
                            <div class="form-floating mb-3">
                                <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="nik">
                                    <option selected>-- NIK --</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                                <label for="floatingSelect">NIK Sesuai Kartu Keluarga</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" placeholder="Pelayanan" name="jenisPelayanan" >
                                <label for="floatingInput">Jenis Pelayanan</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="date" class="form-control" id="floatingInput" name="tanggal">
                                <label for="floatingInput">Tanggal Pengajuan</label>
                            </div>
                            
                            <div class="text-start">
                                <button type="submit" class="btn btn-primary ps-5 pe-5">
                                    Submit
                                </button>
                                <button type="submit" class="btn btn-primary ps-5 pe-5">
                                    <a href="<?= $main_url ?>index.php/beranda"></a>
                                </button>
                            </div>
                            
                        </form>
                    </div>
                </div>

            </div>
        </div>
    <!-- End content -->
    
</div>


 <!-- Bootstrap -->
 <script src="<?php echo $main_url?>assets/style/bootstrap/js/bootstrap.js"></script>
 <script src="<?php echo $main_url?>assets/style/bootstrap/js/bootstrap.min.js"></script>
 <script src="<?php echo $main_url?>assets/style/bootstrap/js/bootstrap.bundle.js"></script>

 <!-- Fontawesome -->
 <script src="<?php echo $main_url?>assets/style/js/fontawesome.all.min.js"></script>
 <script src="<?php echo $main_url?>assets/style/js/jquery-3.3.1.min.js"></script>

</body>
</html>