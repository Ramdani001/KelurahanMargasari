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

  <!-- DataTables -->
  <link rel="stylesheet" type="text/css" href="<?= $main_url?>assets/style/dataTables/jquerydataTables.min.css">

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
                        <li class="nav-item active">
                            <a class="nav-link " aria-current="page" href="#">Home</a>
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
                        <li class="nav-item">
                            <a href="<?= $main_url ?>index.php/pindah" class="nav-link">PINDAH</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= $main_url ?>index.php/datang" class="nav-link">DATANG</a>
                        </li>
                    </ul>
                    <li class="nav-item position-relative ps-2 bg-primary rounded" style="list-style: none;">
                            <a href="<?= $main_url ?>index.php/datang" class="nav-link text-center" style="text-decoration: none;">LOGOUT</a>
                    </li>
                </div>
            </div>
        </nav>
    <!-- End Navbar -->

        <div class="container-fluid" style="position: fixed; top: 20%;">
            <div class="header text-center mx-auto w-100 pt-2">
                <div class="card w-75 mx-auto  shadow-lg">
                    <div class="card-header">
                        <h1>Profil Kelurahan Munjul</h1>
                    </div>
                    <div class="card-body">
                        <p class="text-justify">
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. At molestiae nesciunt dignissimos iste, odit non. Alias omnis, veniam explicabo recusandae ipsum rerum non, hic repudiandae asperiores reprehenderit fuga, necessitatibus cupiditate expedita! Odit reiciendis voluptatum quidem vel eum ea aliquid impedit sunt nisi quas sed debitis labore corporis fugit illum, magni iste esse commodi in totam. Repellat ut, eius id obcaecati eveniet saepe veniam! Inventore amet natus iste dicta quia assumenda nisi facilis tenetur quam exercitationem, aut voluptate odit possimus aspernatur! Explicabo voluptatem, quibusdam soluta quisquam itaque consequatur assumenda quas repellendus magnam sapiente doloremque, debitis nesciunt ut culpa non. Eveniet ut distinctio sit assumenda asperiores eum minus, iste cumque natus odit esse animi eaque obcaecati nesciunt necessitatibus aperiam quaerat? Eum ab quam nemo est soluta, iste alias recusandae id enim obcaecati rerum odit laudantium hic temporibus eos deleniti optio ut molestias? Deleniti, voluptates. Laborum, impedit voluptas id qui voluptatem, cumque placeat repudiandae eveniet itaque sunt temporibus ipsam beatae ipsa ducimus et? Inventore distinctio dicta a blanditiis, perspiciatis facilis veniam, ullam voluptates doloribus unde, saepe similique tenetur. Voluptas tempore reprehenderit doloribus! Iusto, voluptatibus eligendi? Dicta perspiciatis laudantium saepe nesciunt tenetur itaque, quibusdam minus accusantium voluptates commodi dignissimos voluptatem, autem quo deleniti nulla.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    
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