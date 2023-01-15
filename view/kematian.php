<?php 
    include('controller/KematianController.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kematian | Kelurahan</title>
    
    <?php include('view/layout/head.php'); ?>
    
</head>
<body>

    <div id="content" class="" style="overflow-y: none !important;">
    <!-- Navbar -->
        <?php include('view/layout/navbar.php'); ?>
    <!-- End Navbar -->

    <!-- Modal Tambah-->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Pengajuan Surat Kematian</h1>
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
                    <input type="text" class="form-control" id="floatingInput" placeholder="NIK" name="nik">
                    <label for="floatingInput">
                        NIK
                    </label>
                </div>
                <div class="form-floating mb-3">
                    <input type="date" class="form-control" id="floatingInput" placeholder="Tanggal Kematian" name="tglKematian">
                    <label for="floatingInput">
                        Tanggal Kematian
                    </label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="Umur" name="umur">
                    <label for="floatingInput">
                        Umur
                    </label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="Tempat Kematian" name="tempatKematian">
                    <label for="floatingInput">
                        Tempat Kematian
                    </label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="Sebab Kematian" name="sebabKematina">
                    <label for="floatingInput">
                        Sebab Kematian
                    </label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="Pelapor" name="pelapor">
                    <label for="floatingInput">
                        Nama Pelapor
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
                    <th>NIK</th>
                    <th>Tanggal Kematian</th>
                    <th>Umur</th>
                    <th>Tempat</th>
                    <th>Sebab</th>
                    <th>Pelapor</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody> 
                <tr>
                    <td>1</td>
                    <td>108 KMT/2023</td>
                    <td>24-03-2023</td>
                    <td>1276283726</td>
                    <td>23-03-2023</td>
                    <td>80 Tahun</td>
                    <td>Rumah</td>
                    <td>Sakit</td>
                    <td>Sulaiman</td>
                    <td>Di Proses</td>
                </tr>
            </tbody>
        </table>
        
    </div>
</div>
<!-- End Table -->

<?php include('view/layout/footer.php'); ?>

</body>
</html>
