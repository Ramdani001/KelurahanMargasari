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

    <div id="content" class="" style="overflow-y: none !important;">
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
                        <a class="nav-link " href="<?= $main_url ?>index.php/ktp">KTP</a>
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
                <li class="nav-item position-relative ps-2 bg-primary rounded" style=" list-style: none;">
                    <a href="<?= $main_url ?>index.php/datang" class="nav-link text-center" style="text-decoration: none;">LOGOUT</a>
                </li>
            </div>
            </div>
        </nav>
    <!-- End Navbar -->

    <!-- Modal Tambah-->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Pengajuan Surat Pindah</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="" method="post">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="290 KTP/2023" name="noPelayanan" disabled>
                    <label for="floatingInput">
                        290 PDH/2023
                    </label>
                </div>
                <div class="form-floating mb-3">
                    <input type="date" class="form-control" id="floatingInput" name="tanggal">
                    <label for="floatingInput">
                        Tanggal Pengajuan
                    </label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" name="nik" placeholder="NIK">
                    <label for="floatingInput">
                        NIK
                    </label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="Jenis Pelayanan" name="jenisPelayanan">
                    <label for="floatingInput">
                        Jenis Pelayanan
                    </label>
                </div>
                
                <div class="form-floating">
                    <textarea class="form-control" placeholder="Keterangan" id="floatingTextarea" name="keterangan"></textarea>
                    <label for="floatingTextarea">Keterangan</label>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" name="pindah" class="btn btn-primary">Submit</button>
        </div>
        </div>
    </div>
    </div>
    <!-- End Modal -->

<!-- Table -->
<div class="container-fluid mt-5" style="position: fixed; top: 20%;">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    Tambah
    </button>
    <div class="bg-light rounded mt-2 p-2"> 
        <table class="table table-striped table-hover dtabel text-center">
            <thead>
                <tr>
                    <th>No</th>
                    <th>No Pelayan</th>
                    <th>Tanggal Pengajuan</th>
                    <th>NIK</th>
                    <th>Jenis Pelayanan</th>
                    <th>Keterangan</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody> 
                <tr>
                    <td>1</td>
                    <td>108 PDH/2023</td>
                    <td>23-03-2023</td>
                    <td>2303202311</td>
                    <td>Pembuatan Pindah</td>
                    <td>Pengajuan Pindah Dikarenakan Kerja</td>
                    <td>Selesai</td>
                </tr>
            </tbody>
        </table>
        
    </div>
</div>
<!-- End Table -->

 <script src="<?= $main_url?>assets/style/dataTables/jquery.js"></script>
 <script src="js/jquery.js"></script>

 <script src="<?= $main_url?>assets/style/dataTables/jquerydataTables.min.js"></script>
 <script>
 $(document).ready(function() {
  $('.dtabel').DataTable();
 } );
 </script>


    
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