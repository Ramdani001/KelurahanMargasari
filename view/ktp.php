<!-- Wajib Panggil / Buat Controller -->
<?php include('controller/KtpController.php'); ?>  

<!DOCTYPE html>
<html lang="en">
<!-- Panggil Tag <head> -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KTP | Kelurahan</title>
    
    <?php include('view/layout/head.php'); ?>
    
</head>
<body>
    <div id="content" class="" style="overflow-y: none !important;">
        <!-- Navbar -->
        <?php include('view/layout/navbar.php');?> 
        <!-- End Navbar -->
        
        <!-- Content -->
        <!-- Modal Tambah-->
        <div class="modal fade" id="staticBackdrop" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Pengajuan KTP</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="noPelayanan"  name="noPelayanan" readonly value="<?=$noPelayananGenerate?>">
                                <label for="floatingInput">
                                    No Pelayanan
                                </label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="jenisPelayanan" placeholder="Jenis Pelayanan" name="jenisPelayanan">
                                <label for="floatingInput">
                                    Jenis Pelayanan
                                </label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="date" class="form-control" id="tanggal" name="tanggal">
                                <label for="floatingInput">
                                    Tanggal Pengajuan
                                </label>
                            </div>
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Keterangan" id="keterangan" name="keterangan"></textarea>
                                <label for="floatingTextarea">Keterangan</label>
                            </div>             
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" onclick="clearData()" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" name="submit" onclick="submitData()" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal -->
        <!-- Table -->
        <div class="container-fluid mt-5" style="position: fixed; top: 20%;">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" onclick="showModal()">
            Tambah
            </button>
            <div class="bg-light rounded mt-2 p-2"> 
                <table class="table table-striped table-hover dtabel text-center" id="tableData" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No Pelayan</th>
                            <th>Tanggal Pengajuan</th>
                            <th>NIK</th>
                            <th>Jenis Pelayanan</th>
                            <th>Keterangan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody> 
                       
                    </tbody>
                </table>
                
            </div>
        </div>
        <!-- End Table -->

        <!-- End Content -->
        
    </div>
    
    <!-- Script Src / Footer -->
    <?php include('view/layout/footer.php');?> 
    <!-- End Script Src / Footer -->
    <!-- Custom Script Disini -->
    <script>
        
        var table;

        $(function(){
            table = $('#tableData').DataTable({
               "processing": true, "serverSide": true,
               "ajax":{
                   "url": "<?=$main_url;?>index.php/functionKtp",
                   "data": function ( d ) {
                       d.function = "readDataTable"
                    },
                    "dataType": "json",
                    "type": "POST"
                },
                "columns": [
                    { "data": "no" },
                    { "data": "noPelayanan" },
                    { "data": "tanggal" },
                    { "data": "nik" },
                    { "data": "jenisPelayanan" },
                    { "data": "keterangan" },
                    { "data": "status" },
                    { "data": "aksi" },
                ]       
            });
        });

        function showModal(){
            clearData();
            $("#staticBackdrop").modal('toggle');
        }

        function clearData(){
           $("#jenisPelayanan").val("");
           $("#tanggal").val("");
           $("#keterangan").val("");
       }

        function submitData(){
            // Inisialisasi Variable & Ambil data dari id text input
            var noPelayanan = $("#noPelayanan").val();
            var jenisPelayanan = $("#jenisPelayanan").val();
            var keterangan = $("#keterangan").val();
            var tanggal = $("#tanggal").val();

            // Validasi 
            if(jenisPelayanan == "" || tanggal == "" || keterangan == ""){
                return alert("Beberapa Form Belum Lengkap");
            }else{
                // Post Data Dengan Ajax
                $.ajax({
                    url:"<?=$main_url;?>index.php/functionKtp",
                    method:"POST",
                    data:{
                        // function diantaranya : create, update, delete, dll... sesuaikan dengan kebutuhan
                        function : "create",
                        // Opsional Data yg akan di post
                        noPelayanan : noPelayanan,
                        jenisPelayanan : jenisPelayanan,
                        keterangan : keterangan,
                        tanggal : tanggal
                    },
                    success:function(response) {
                        // Kalo Sukses
                        if(response == 200){
                            alert("Success Menambahkan Data");
                            $("#staticBackdrop").modal('toggle');
                            clearData();
                            table.ajax.reload(null, false);
                        }
                    },
                    error:function(){
                        // Kalo Gagal
                        alert("Terjadi Kesalahan");
                    }
                });
            }
        }

        function deleteData(id){
            $.ajax({
                    url:"<?=$main_url;?>index.php/functionKtp",
                    method:"POST",
                    data:{function : "delete",id : id},
                    success:function(response) {
                        if(response == 200){
                            alert("Success Menghapus Data");
                            table.ajax.reload(null, false);
                        }
                    },
                    error:function(){
                        alert("Terjadi Kesalahan");
                    }
                });
        }

       
    </script>
    <!-- End Custom Script  -->
    
</body>
</html>