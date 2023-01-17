<?php 
    if($_SESSION["dataLogin"]!=null){
        header("Location: beranda");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Users</title>
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?php echo $main_url?>assets/style/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $main_url?>assets/style/bootstrap/css/bootstrap.css">
    
    <!-- MyStyle -->
    <link rel="stylesheet" href="<?php echo $main_url?>assets/style/style.css">

    <!-- Fontawesome -->
    <link rel="stylesheet" href="<?php echo $main_url?>assets/style/fontawesome.css">
    <link rel="stylesheet" href="<?php echo $main_url?>assets/style/fontawesome.min.css">

</head>
<body>

    <div class="container mt-5">
        <div class="box m-auto w-75">
            <div class="card p-5 w-50 m-auto text-center shadow">
                <div class="card-header" style="margin-top: -30px;">
                    <img src="<?php echo $main_url?>assets/img/logoKel.png" width="80" alt="">
                    <h3>Kelurahan</h3>
                </div>
                <div class="card-body">
                    <form action="<?=$main_url?>functionLogin" method="post">
                        <?php if($_SESSION["isFailed"]){?>
                        <div class="input-group flex-nowrap mb-3">
                            <span class="input-group-text" id="addon-wrapping">
                                <i class="fa-solid fa-close"></i>
                            </span> <font color="red">&nbsp;NIK / Password Tidak terdaftar</font>
                        </div>
                        <?php } ?>
                        <div class="input-group flex-nowrap mb-3">
                            <span class="input-group-text" id="addon-wrapping">
                                <i class="fa-solid fa-user"> </i>
                            </span>
                            <input type="text" class="form-control" placeholder="NIK / Username" aria-label="nik" aria-describedby="addon-wrapping" name="nik">
                        </div>
                        <div class="input-group flex-nowrap mb-3">
                            <span class="input-group-text" id="addon-wrapping">
                                <i class="fa-solid fa-lock"></i>
                            </span>
                            <input type="password" class="form-control" placeholder="Password" aria-label="password" aria-describedby="addon-wrapping" name="password">
                        </div>
                        <div class="">
                            <button type="submit" class="btn btn-primary mb-2" class="" style="padding-left: 30px; padding-right: 30px;" name="submit">
                                Login
                            </button>
                            <button type="button" class="btn btn-secondary mb-2" class="" style="padding-left: 30px; padding-right: 30px;">
                                <a href="<?php echo $main_url?>index.php/" class="text-decoration-none text-white">
                                    Batal
                                </a>
                            </button>
                        </div>
                    </form>
                </div>
                </div>

        </div>
    </divc>    

    <!-- Bootstrap -->
    <script src="<?php echo $main_url?>assets/style/bootstrap/js/bootstrap.js"></script>
    <script src="<?php echo $main_url?>assets/style/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo $main_url?>assets/style/bootstrap/js/bootstrap.bundle.js"></script>

    <!-- Fontawesome -->
    <script src="<?php echo $main_url?>assets/style/js/fontawesome.all.min.js"></script>
    <script src="<?php echo $main_url?>assets/style/js/jquery-3.3.1.min.js"></script>

</body>
</html>