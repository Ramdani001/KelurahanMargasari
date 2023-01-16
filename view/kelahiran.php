<?php 
    include('controller/KelahiranController.php');
?>  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelahiran | Kelurahan</title>

    <?php include('view/layout/head.php'); ?>
    
</head>

<body>

    <div id="content" class="" style="overflow-y: none !important;">
    <!-- Navbar -->
    <?php include('view/layout/navbar.php') ?>
    <!-- End Navbar -->

    <!-- Modal Tambah-->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Pengajuan Akta Kelahiran</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="" method="post">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="290 KTP/2023" name="noPelayanan" disabled>
                    <label for="floatingInput">
                        290 KTP/2023
                    </label>
                </div>
                <div class="form-floating mb-3">
                    <input type="date" class="form-control" id="floatingInput" placeholder="Tanggal Pengajuan" name="tglPengajuan">
                    <label for="floatingInput">
                        Tanggal Pengajuan
                    </label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="Pemohon" name="pemohon">
                    <label for="floatingInput">
                        Nama Pemohon
                    </label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="Nama Bayi" name="namaBayi">
                    <label for="floatingInput">
                        Nama Bayi
                    </label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="Umur" name="umurBayi">
                    <label for="floatingInput">
                        Umur Bayi
                    </label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="Tanggal Kelahiran" name="tglKelahiran">
                    <label for="floatingInput">
                        Tanggal Kelahiran
                    </label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="Kartu Identitas Anak (KIA)" name="kia">
                    <label for="floatingInput">
                        Kartu Identitas Anak (KIA)
                    </label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="Nama Ibu" name="ibu">
                    <label for="floatingInput">
                        Nama Ibu
                    </label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="Nama Ayah" name="ayah">
                    <label for="floatingInput">
                        Nama Ayah
                    </label>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
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
                    <th>Pemohon</th>
                    <th>Nama Bayi</th>
                    <th>Umur</th>
                    <th>Tanggal Kelahiran</th>
                    <th>KIA</th>
                    <th>Ibu</th>
                    <th>Ayah</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody> 
                <tr>
                    <td>1</td>
                    <td>123 KLH/2023</td>
                    <td>23-03-2023</td>
                    <td>Shinta</td>
                    <td>Cindy Apriliani</td>
                    <td>4 Bulan</td>
                    <td>20-12-2022</td>
                    <td>1111111989</td>
                    <td>Nuy</td>
                    <td>Ramdani</td>
                    <td class="">
                            <a href="#" clas="pe-3" style="font-size: 18px !important; padding-right: 10px;">
                                <i class="fa-solid fa-pen" style="color: green;"></i>
                            </a>
                            <a href="#" class="ps-2" style="font-size: 18px !important;">
                                <i class="fa-solid fa-trash" style="color: red;"></i>
                            </a>
                        </td>
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

<?php include('view/layout/footer.php'); ?>

</body>
</html>