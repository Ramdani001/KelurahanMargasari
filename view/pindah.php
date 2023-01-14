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
                        <a class="nav-link" href="<?= $main_url ?>index.php/ktp">KTP</a>
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
                    <li class="nav-item active">
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

    <h1>Pindah</h1>
    
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