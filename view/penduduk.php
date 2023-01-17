<!-- Wajib Panggil / Buat Controller -->
<?php 
    include('controller/PendudukController.php'); 
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
    <title>Penduduk | Kelurahan</title>
    
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
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Data Penduduk</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post">
                            <div class="form-floating mb-3">
                                <input type="hidden" class="form-control" id="id"  name="id" readonly value="">
                                <input type="text" class="form-control" id="nik"  name="nik" value="">
                                <label for="floatingInput">
                                    NIK
                                </label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="noKk"  name="noKk" value="">
                                <label for="floatingInput">
                                    No KK
                                </label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="namaLengkap"  name="namaLengkap" value="">
                                <label for="floatingInput">
                                    Nama Lengkap
                                </label>
                            </div>
                            <div class="form-floating mb-3">
                                <select name="jenisKelamin" id="jenisKelamin" class="form-control">
                                    <option class="optStatus" value="L">Laki-Laki</option>
                                    <option class="optStatus" value="P">Perempuan</option>
                                </select>
                                <label for="floatingInput">
                                    Jenis Kelamin
                                </label>
                            </div> 
                            <div class="form-floating mb-3">
                                <select name="golonganDarah" id="golonganDarah" class="form-control">
                                    <option class="optStatus" value="A">A</option>
                                    <option class="optStatus" value="B">B</option>
                                    <option class="optStatus" value="AB">AB</option>
                                    <option class="optStatus" value="O">O</option>
                                </select>
                                <label for="floatingInput">
                                    Golongan Darah
                                </label>
                            </div> 
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="tempatLahir"  name="tempatLahir" value="">
                                <label for="floatingInput">
                                    Tempat Lahir
                                </label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="date" class="form-control" id="tanggalLahir"  name="tanggalLahir" value="">
                                <label for="floatingInput">
                                    Tanggal Lahir
                                </label>
                            </div>
                            <div class="form-floating mb-3">
                                <select name="agama" id="agama" class="form-control">
                                    <option class="optStatus" value="Islam">Islam</option>
                                    <option class="optStatus" value="Kristen">Kristen</option>
                                    <option class="optStatus" value="Katholik">Katholik</option>
                                    <option class="optStatus" value="Hindu">Hindu</option>
                                    <option class="optStatus" value="Budha">Budha</option>
                                    <option class="optStatus" value="Konghucu">Konghucu</option>
                                </select>
                                <label for="floatingInput">
                                    Agama
                                </label>
                            </div>
                            <div class="form-floating mb-3">
                                <select name="statusPerkawinan" id="statusPerkawinan" class="form-control">
                                    <option class="optStatus" value="Kawin">Kawin</option>
                                    <option class="optStatus" value="Belum Kawin">Belum Kawin</option>
                                </select>
                                <label for="floatingInput">
                                    Status Perkawinan
                                </label>
                            </div> 
                            <div class="form-floating mb-3">
                                <textarea class="form-control" placeholder="Alamat" id="alamat" name="alamat"></textarea>
                                <label for="floatingTextarea">Alamat</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="telepon" placeholder="Telepon" name="telepon">
                                <label for="floatingInput">
                                    Telepon
                                </label>
                            </div>  
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="kewarganegaraan" placeholder="kewarganegaraan" name="kewarganegaraan">
                                <label for="floatingInput">
                                    kewarganegaraan
                                </label>
                            </div>   
                            <div class="form-floating mb-3">
                                <select name="pekerjaan" id="pekerjaan" class="form-control">
                                    <option class="optStatus" value="PNS / TNI POLRI">PNS / TNI POLRI</option>
                                    <option class="optStatus" value="Karyawan Swasta">Karyawan Swasta</option>
                                    <option class="optStatus" value="Karyawan BUMN">Karyawan BUMN</option>
                                    <option class="optStatus" value="Pengusaha">Pengusaha</option>
                                    <option class="optStatus" value="Ibu Rumah Tangga">Ibu Rumah Tangga</option>
                                </select>
                                <label for="floatingInput">
                                    Pekerjaan
                                </label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                                <label for="floatingInput">
                                    Password
                                </label>
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
                            <th>NIK</th>
                            <th>No KK</th>
                            <th>Nama</th>
                            <th>Kelamin</th>
                            <th>Alamat</th>
                            <th>Pekerjaan</th>
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
                   "url": "<?=$main_url;?>functionPenduduk",
                   "data": function ( d ) {
                       d.function = "readDataTable"
                    },
                    "dataType": "json",
                    "type": "POST"
                },
                "columns": [
                    { "data": "no" },
                    { "data": "nik" },
                    { "data": "noKk" },
                    { "data": "namaLengkap" },
                    { "data": "jenisKelamin" },
                    { "data": "alamat" },
                    { "data": "pekerjaan" },
                    { "data": "aksi" },
                ]       
            });
        });

        function showModal(){
            clearData();
            $("#staticBackdrop").modal('toggle');
        }

        function clearData(){
             $("#id").val("");
             $("#nik").val("");
             $("#noKk").val("");
             $("#namaLengkap").val("");
             $("#jenisKelamin").val("");
             $("#golonganDarah").val("");
             $("#tempatLahir").val("");
             $("#tanggalLahir").val("");
             $("#agama").val("");
             $("#statusPerkawinan").val("");
             $("#alamat").val("");
             $("#telepon").val("");
             $("#kewarganegaraan").val("");
             $("#pekerjaan").val("");
             $("#password").val("");
       }
       
       function submitData(){
           // Inisialisasi Variable & Ambil data dari id text input
           var id = $("#id").val();
           var nik = $("#nik").val();
           var noKk = $("#noKk").val();
           var namaLengkap = $("#namaLengkap").val();
           var jenisKelamin = $("#jenisKelamin").val();
           var golonganDarah = $("#golonganDarah").val();
           var tempatLahir = $("#tempatLahir").val();
           var tanggalLahir = $("#tanggalLahir").val();
           var agama = $("#agama").val();
           var statusPerkawinan = $("#statusPerkawinan").val();
           var alamat = $("#alamat").val();
           var telepon = $("#telepon").val();
           var kewarganegaraan = $("#kewarganegaraan").val();
           var pekerjaan = $("#pekerjaan").val();
           var password = $("#password").val();

           // Validasi 
           if(nik == "" || noKk == "" || namaLengkap == "" || jenisKelamin == "" || golonganDarah == "" || tempatLahir == "" || tanggalLahir == "" || agama == ""|| statusPerkawinan == "" || alamat == "" || telepon == "" || kewarganegaraan == "" || pekerjaan == "" || password == ""){
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
                   url:"<?=$main_url;?>functionPenduduk",
                   method:"POST",
                   data:{
                       function : functionControl,
                       // Opsional Data yg akan di post
                       id: id,
                       nik: nik,
                       noKk: noKk,
                       namaLengkap: namaLengkap,
                       jenisKelamin: jenisKelamin,
                       golonganDarah: golonganDarah,
                       tempatLahir: tempatLahir,
                       tanggalLahir: tanggalLahir,
                       agama: agama,
                       statusPerkawinan: statusPerkawinan,
                       alamat: alamat,
                       telepon: telepon,
                       kewarganegaraan: kewarganegaraan,
                       pekerjaan: pekerjaan,
                       password: password
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
               url:"<?=$main_url;?>functionPenduduk",
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
           $("#nik").val(value.nik);
           $("#noKk").val(value.noKk);
           $("#namaLengkap").val(value.namaLengkap);
           $("#jenisKelamin").val(value.jenisKelamin);
           $("#golonganDarah").val(value.golonganDarah);
           $("#tempatLahir").val(value.tempatLahir);
           $("#tanggalLahir").val(value.tanggalLahir);
           $("#agama").val(value.agama);
           $("#statusPerkawinan").val(value.statusPerkawinan);
           $("#alamat").val(value.alamat);
           $("#telepon").val(value.telepon);
           $("#kewarganegaraan").val(value.kewarganegaraan);
           $("#pekerjaan").val(value.pekerjaan);
           $("#password").val(value.password);

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
               url:"<?=$main_url;?>functionPenduduk",
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