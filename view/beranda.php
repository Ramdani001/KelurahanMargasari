<?php 
    $_SESSION["isFailed"] = false;
    $dataLogin = $_SESSION["dataLogin"];
?>  

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
                <span class="navbar-toggler-icon">
                <i class="fa-solid fa-bars"></i>
                </span>
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
                    <?php if($dataLogin == null){?>
                        <li class="nav-item position-relative ps-2 bg-primary rounded" style="list-style: none;">
                            <a href="<?= $main_url ?>index.php/login_user" class="nav-link text-center" style="text-decoration: none;">Login</a>
                        </li>
                    <?php }else{?>
                        <li class="nav position-relative ps-2 bg-primary rounded" style="list-style: none;">
                            <div class="btn-group dropstart">
                                <button type="button" class="btn text-light dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    Profile
                                </button>
                                    <ul class="dropdown-menu">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" class="dropdown-item cursor-pointer text-center text-light" style="text-decoration: none; color: black !important;">Ganti Password</a>
                                        <hr>
                                        <a href="<?= $main_url ?>index.php/logout" class="dropdown-item text-center text-light" style="text-decoration: none; color: black !important;">Logout</a>
                                    </ul>
                            </div>

                        </li>
                    <?php }?>
                </div>
            </div>
        </nav>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Ganti Password</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="poast" >
        <div class="input-group mb-3">
                    <input type="password" class="form-control" id="pass" placeholder="Password Lama" name="passwordLama" aria-describedby="basic-addon2">
                    
                    <label for="pass" class="input-group-text" id="basic-addon2">
                        <span id="show1" class="">
                            <i class="fa-solid fa-eye-slash"></i>
                        </span>
                        <span id="show4" class="d-none">
                            <i class="fa-solid fa-eye"></i>
                        </span>
                    </label>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" id="passBaru" placeholder="Password Baru" name="passwordBaru" aria-describedby="basic-addon2">
                    
                    <label for="passBaru" class="input-group-text">
                        <span id="show2" name="" class="show">
                            <i class="fa-solid fa-eye-slash"></i>
                        </span>
                        <span id="show3" name="" class="d-none hide">
                            <i class="fa-solid fa-eye"></i>
                        </span>
                    </label>
                    
                </div>
            <div class="mb-3">
                <label for="pass" class="form-label">Konfirmasi Password</label>
                <input type="password" class="form-control" id="passBaru1" placeholder="Konfirmasi Password" name="confPass">
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- End Modal -->


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

 <!-- Show Password -->
 
 <script>
    document.getElementById("show1").addEventListener("click", showPass1);
    document.getElementById("show2").addEventListener("click", showPass2);
    document.getElementById("show3").addEventListener("click", showPass3);
    document.getElementById("show4").addEventListener("click", showPass4);

    function showPass1(){
        var pass = document.getElementById('pass');
        if(pass.type == 'password'){
            document.getElementById('pass').setAttribute('type','text');
            document.getElementById('show1').classList.add('d-none');
            document.getElementById('show4').classList.remove('d-none');
        }
    }

    function showPass4(){
        var pass = document.getElementById('pass');
        if(pass.type == 'text'){
            document.getElementById('show1').classList.remove('d-none');
            document.getElementById('show4').classList.add('d-none');
            document.getElementById('pass').setAttribute('type','password');
        }
    }

    function showPass2(){
        var pass = document.getElementById('passBaru');
        var pass1 = document.getElementById('passBaru1');


        if(pass.type == 'password'  && pass1.type == 'password'){
            document.getElementById('show3').classList.remove('d-none');
            document.getElementById('show2').classList.add('d-none');

            document.getElementById('passBaru').setAttribute('type','text');
            document.getElementById('passBaru1').setAttribute('type','text');
        }
    }

    function showPass3(){
        var pass = document.getElementById('passBaru');
        var pass1 = document.getElementById('passBaru1');


        if(pass.type == 'text'  && pass1.type == 'text'){
            document.getElementById('show3').classList.add('d-none');
            document.getElementById('show2').classList.remove('d-none');

            document.getElementById('passBaru').setAttribute('type','password');
            document.getElementById('passBaru1').setAttribute('type','password');
        }
    }

 </script>

</body>
</html>