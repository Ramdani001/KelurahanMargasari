<?php 
    include('controller/KKController.php');
?>  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda | Kelurahan</title>

    <?php include('view/layout/head.php'); ?>

</head>
<body>

    <div id="content" class="" style="overflow-y: none !important;">
    <!-- Navbar -->
    <?php include('view/layout/navbar.php');?>
    <!-- End Navbar -->

<!-- End Modal -->

    <!-- Modal Tambah-->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Pengajuan Kartu Keluarga</h1>
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
                        <input type="date" class="form-control" id="floatingInput" name="tanggal">
                        <label for="floatingInput">
                            Tanggal Pengajuan
                        </label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" name="nnik">
                        <label for="floatingInput">
                            NIK
                        </label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" name="nama">
                        <label for="floatingInput">
                            Nama
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
                        <th>Tanggal</th>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Keterangan</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody> 
                    <tr>
                        <td>1</td>
                        <td>108 KK/2023</td>
                        <td>23-03-2023</td>
                        <td>099875678888</td>
                        <td>Ramdani</td>
                        <td>Pengajuran KK</td>
                        <td>Di Proses</td>
                    </tr>
                </tbody>
            </table>
            
        </div>
    </div>
<!-- End Table -->

<?php include('view/layout/footer.php');?>

</body>
</html>