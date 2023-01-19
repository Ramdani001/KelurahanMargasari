<!-- Wajib Panggil / Buat Controller -->
<?php 
    include('controller/KematianController.php'); 
    // Tambahkan Kondisi ini jika user belum login maka tidak bisa ke halaman ini
    if($_SESSION["dataLogin"] == null){
        header("Location: login_user");
    }
?>  
 
<!DOCTYPE html>
<html lang="en">
<!-- Panggil Tag <head> -->
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
        <?php include('view/layout/navbar.php');?> 
        <!-- End Navbar -->
        
        <!-- Content -->
        <!-- Modal Tambah-->
        <div class="modal fade" id="staticBackdrop" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Pengajuan Kematian</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post">
                            <div class="form-floating mb-3">
                                <input type="hidden" class="form-control" id="id"  name="id" readonly value="">
                                <input type="text" class="form-control" id="noPelayanan"  name="noPelayanan" readonly value="">
                                <label for="floatingInput">
                                    No Pelayanan
                                </label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="date" class="form-control" id="tanggalPengajuan"  name="tanggalPengajuan">
                                <label for="floatingInput">
                                    Tanggal Pengajuan
                                </label>
                            </div>
                            <?php// if($dataLogin["levelUser"] == "admin"){?>
                            <div class="form-floating mb-3">
                                <select name="nik" id="nik" class="form-control">
                                    <?php for($i = 0; $i<count($nikData); $i++){?>
                                    <option class="optStatus" value="<?=$nikData[$i]["nik"]?>"><?=$nikData[$i]["nik"]?> - <?=$nikData[$i]["namaLengkap"]?></option>
                                    <?php }?>
                                </select>
                                <label for="floatingInput">
                                    NIK
                                </label>
                            </div>  
                            <?php // }?>
                            <div class="form-floating mb-3">
                                <input type="date" class="form-control" id="tanggalKematian" placeholder="Tanggal Kematian" name="tanggalKematian">
                                <label for="floatingInput">
                                    Tanggal Kematian
                                </label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="umur" name="umur">
                                <label for="floatingInput">
                                    Umur
                                </label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" placeholder="Tempat Kematian" id="tempatKematian" name="tempatKematian"></input>
                                <label for="floatinginput">Tempat Kematian</label>
                            </div>             
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" placeholder="Sebab Kematian" id="sebabKematian" name="sebabKematian"></input>
                                <label for="floatinginput">Sebab Kematian</label>
                            </div>             
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" placeholder="Nama Pelapor" id="namaPelapor" name="namaPelapor"></input>
                                <label for="floatinginput">Nama Pelapor</label>
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

        <!-- Modal Ganti Status -->
        <div class="modal fade" id="changeStatusModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Update Status Pengajuan</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="noStatus" name="noStatus" readonly>
                                <label for="floatingInput">
                                    No Pelayanan
                                </label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="hidden" class="form-control" id="idStatus"  name="idStatus" readonly value="">
                                <label for="floatingInput">
                                    Status
                                </label>
                                <select name="statusPelayanan" id="statusPelayanan" class="form-control">
                                    <option class="optStatus" value="Diajukan">Diajukan</option>
                                    <option class="optStatus" value="Diproses">Diproses</option>
                                    <option class="optStatus" value="Disetujui">Disetujui</option>
                                    <option class="optStatus" value="Ditolak">Ditolak</option>
                                </select>
                            </div>      
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" onclick="closeModalStatus()" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" name="submit" onclick="submitStatus()" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal -->

        <!-- Table -->
        <div class="container-fluid mt-5 pb-5" style="position: relative !important; top: 10%; !important width: 100% !important;">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" onclick="showModal()">
            Tambah
            </button>
            <div class="bg-light rounded text-center mt-2 p-2"> 
                <table class="table table-striped table-hover dtabel text-center" id="tableData" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No Pelayanan</th>
                            <th>Tanggal Pengajuan</th>
                            <th>NIK</th>
                            <th>Tanggal Kematian</th>
                            <th>Umur</th>
                            <th>Tempat Kematian</th>
                            <th>Sebab Kematian</th>
                            <th>Nama Pelapor</th>
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
                   "url": "<?=$main_url;?>functionKematian",
                   "data": function ( d ) {
                       d.function = "readDataTable"
                    },
                    "dataType": "json",
                    "type": "POST"
                },
                "columns": [
                    { "data": "no" },
                    { "data": "noPelayanan" },
                    { "data": "tanggalPengajuan" },
                    { "data": "nik" },
                    { "data": "tanggalKematian" },
                    { "data": "umur" },
                    { "data": "tempatKematian" },
                    { "data": "sebabKematian" },
                    { "data": "namaPelapor" },
                    { "data": "status" },
                    { "data": "aksi" },
                ]       
            });
        });

        function showModal(){
            clearData();
            $.ajax({
                url:"<?=$main_url;?>functionKematian",
                method:"POST",
                data:{function : "getKode"},
                success:function(response) {
                    $("#noPelayanan").val(response)
                },
                error:function(){
                    alert("Terjadi Kesalahan");
                }
            });
            $("#staticBackdrop").modal('toggle');
        }

        function clearData(){
           $("#id").val("");
           $("#SebabKematian").val("");
           $("#tanggalKematian").val("");
           $("#tempatKematian").val("");
           $("#umur").val("");
           $("#namaPelapor").val("");
           $("#tanggalPengajuan").val("");
       }
       
       function submitData(){
           // Inisialisasi Variable & Ambil data dari id text input
           var id = $("#id").val();
           var noPelayanan = $("#noPelayanan").val();
           var tanggalPengajuan = $("#tanggalPengajuan").val();
           var nik = $("#nik").val();
           var tanggalKematian = $("#tanggalKematian").val();
           var umur = $("#umur").val();
           var tempatKematian = $("#tempatKematian").val();
           var sebabKematian = $("#sebabKematian").val();
           var namaPelapor = $("#namaPelapor").val();

           console.log(nik);

           // Validasi 
           if(tanggalPengajuan == "" || tanggalKematian == "" || namaPelapor == ""){
               return alert("Beberapa Form Belum Lengkap");
            }else{
               // function diantaranya : create, update, delete, dll... sesuaikan dengan kebutuhan
               var functionControl = "create";
               if(id != ""){
                    functionControl = "update";
               }
               console.log(functionControl);
               // Post Data Dengan Ajax
               $.ajax({
                   url:"<?=$main_url;?>functionKematian",
                   method:"POST",
                   data:{
                       function : functionControl,
                       // Opsional Data yg akan di post
                       id: id,
                       tanggalPengajuan: tanggalPengajuan,
                       nik: nik,
                       tanggalKematian : tanggalKematian,
                       umur : umur,
                       tempatKematian : tempatKematian,
                       sebabKematian : sebabKematian,
                       namaPelapor : namaPelapor,
                       noPelayanan : noPelayanan,
                   },
                   success:function(response) {
                       // Kalo Sukses
                       if(response == 200){
                           alert("Success "+functionControl+" Data");
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
               url:"<?=$main_url;?>functionKematian",
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
       
       function editData(value){
           // Decrypt hasil value lalu dijaidkan json
           var value =  JSON.parse(atob(value))
           console.log(value);

           // Masukan Semua Data Ke Masing - Maing Text Field
           $("#id").val(value.id);
           $("#tanggalPengajuan").val(value.tanggalPengajuan);
           $("#tanggalKematian").val(value.tanggalKematian);
           $("#umur").val(value.umur);
           $("#tempatKematian").val(value.tempatKematian);
           $("#sebabKematian").val(value.sebabKematian);
           $("#namaPelapor").val(value.namaPelapor);
           $("#noPelayanan").val(value.noPelayanan);

           <?php if($dataLogin["levelUser"] == "admin"){?>
            $('#nik option').filter(function(){
                return this.value == value.nik;
            }).prop("selected", true)
           <?php }?>

           // Munculkan Modal
           $("#staticBackdrop").modal('toggle');
       }

       <?php if($dataLogin["levelUser"] == "admin"){?>
       function showModalStatus(value){
           var value =  JSON.parse(atob(value))
           $("#idStatus").val(value.id);
           $("#noStatus").val(value.noPelayanan);
           $('#statusPelayanan option').filter(function(){
            return this.value == value.status;
           }).prop("selected", true)
           $("#changeStatusModal").modal('toggle');
        }

        function submitStatus(){
            var ids = $('#idStatus').val()
            var sts = $('#statusPelayanan').val()
            console.log(ids)
            $.ajax({
               url:"<?=$main_url;?>functionKematian",
               method:"POST",
               data:{function : "gantiStatus", id : ids, status: sts},
               success:function(response) {
                   if(response == 200){
                       alert("Success Mengganti Status");
                       $("#changeStatusModal").modal('toggle');
                       table.ajax.reload(null, false);
                   }
               },
               error:function(){
                   alert("Terjadi Kesalahan");
               }
           });
        }

        function closeModalStatus(){
            $("#changeStatusModal").modal('toggle');
        }
        <?php }?>

    </script>
    <!-- End Custom Script  -->
    
</body>
</html>