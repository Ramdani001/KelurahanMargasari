<nav class="navbar navbar-expand-lg bg-secondary position-relative shadow">
    <div class="container-fluid">
    <a class="navbar-brand ps-3" href="#">
        <img src="<?= $main_url ?>assets/img/logoKel.png" width="40" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon">
        <i class="fa-solid fa-bars"></i>
        </span>
    </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav d-flex w-100 justify-content-center">
                <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="<?= $main_url ?>">HOME</a>
                </li>
                <?php if($dataLogin["levelUser"] == "admin"){?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $main_url ?>penduduk">PENDUDUK</a>
                </li>
                <?php }?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php if($dataLogin["levelUser"] == "admin" || $dataLogin["levelUser"] == "user"){?><?= $main_url ?>ktp<?php }else{?><?= $main_url ?>login_user<?php }?>"> KTP </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php if($dataLogin["levelUser"] == "admin" || $dataLogin["levelUser"] == "user"){?><?= $main_url ?>kk<?php }else{?><?= $main_url ?>login_user<?php }?>">KK</a>
                </li>
                <li class="nav-item">
                    <a href="<?php if($dataLogin["levelUser"] == "admin" || $dataLogin["levelUser"] == "user"){?><?= $main_url ?>kelahiran<?php }else{?><?= $main_url ?>login_user<?php }?>" class="nav-link">KELAHIRAN</a>
                </li>
                <li class="nav-item">
                    <a href="<?php if($dataLogin["levelUser"] == "admin" || $dataLogin["levelUser"] == "user"){?><?= $main_url ?>kematian<?php }else{?><?= $main_url ?>login_user<?php }?>" class="nav-link">KEMATIAN</a>
                </li>
                <li class="nav-item">
                    <a href="<?php if($dataLogin["levelUser"] == "admin" || $dataLogin["levelUser"] == "user"){?><?= $main_url ?>pindah<?php }else{?><?= $main_url ?>login_user<?php }?>" class="nav-link">PINDAH</a>
                </li>
                <li class="nav-item">
                    <a href="<?php if($dataLogin["levelUser"] == "admin" || $dataLogin["levelUser"] == "user"){?><?= $main_url ?>datang<?php }else{?><?= $main_url ?>login_user<?php }?>" class="nav-link">DATANG</a>
                </li>
            </ul>
            <?php if($dataLogin == null){?>
                <li class="nav-item position-relative ps-2 bg-primary rounded" style="list-style: none;">
                    <a href="<?= $main_url ?>login_user" class="nav-link text-center" style="text-decoration: none;">Login</a>
                </li>
            <?php }else{?>
                <li class="nav position-relative ps-2 bg-primary rounded" style="list-style: none;">
                    <div class="btn-group dropstart">
                        <button type="button" class="btn text-light dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            Profile
                        </button>
                        <ul class="dropdown-menu">
                            <div class="container">
                                <div class="col-md-12">
                                    <span class="fa fa-user"></span>
                                    &nbsp;<?=$dataLogin["namaLengkap"]?>
                                </div>
                            </div>
                            <hr>
                            <div class="container">
                                <div class="col-md-12">
                                    <a href="<?= $main_url ?>logout" class="dropdown-item text-center text-light" style="text-decoration: none; color: black !important;">Logout</a>
                                </div>
                            </div>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" class="dropdown-item cursor-pointer text-center text-light" style="text-decoration: none; color: black !important;">Ganti Password</a>
                        </ul>
                    </div>
    
                </li>
            <?php }?>
        </div>
    </div>
</nav>

<!-- Modal Ganti Password-->
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
                