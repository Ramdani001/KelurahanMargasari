<!-- Wajib Panggil / Buat Controller -->
<?php 
    include('controller/KelahiranController.php');

    // Tambahkan Kondisi Ini jika user belum login maka tidak bisa ke halaman ini
    if($_SESSION["dataLogin"] == null) {
        header("Location: login_user");
    }

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
    <div class="modal fade" id="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Pengajuan Akta Kelahiran</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="" method="post">
                <div class="form-floating mb-3">
                    <input type="hidden" class="form-control" id="id" name="id" readonly value="">
                    <input type="text" class="form-control" id="noPelayanan" name="noPelayanan" readonly value="">
                    <label for="noPelayanan">
                        No Pelayanan
                    </label>
                </div> 
                <div class="form-floating mb-3">
                    <input type="date" class="form-control" id="tanggalPengajuan" name="tanggalPengajuan">
                    <label for="tanggalPengajuan">
                        Tanggal Pengajuan
                    </label>
                </div>
                <?php if($dataLogin["levelUser"] == "admin"){?>
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
                <?php } else {?>
                    <div class="form-floating mb-3">
                        <input id="nik" type="text" id="nik" class="form-control mb-3" value="<?= $dataLogin["nik"]; ?>" readonly>
                        <label for="nik">
                                NIK
                        </label>    
                    </div>    
                <?php }?>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="pemohon" name="pemohon">
                    <label for="pemohon">
                        Nama Pemohon
                    </label>
                </div>
                
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="umurBayi" name="umurBayi">
                    <label for="umurBayi">
                        Umur Bayi
                    </label>
                </div>
                
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="hubunganSibayi" name="hubungan Sibayi">
                    <label for="hubunganSibayi">
                        Hubungan Dengan Si Bayi
                    </label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" id="hari" name="hari" aria-label="Default select example">
                        <option selected>-- Jenis Kelamin --</option>
                        <option value="Senin">Senin</option>
                        <option value="Selasa">Selasa</option>
                        <option value="Rabu">Rabu</option>
                        <option value="Kamis">Kamis</option>
                        <option value="Jum'at">Jum'at</option>
                        <option value="Sabtu">Sabtu</option>
                        <option value="Minggu">Minggu</option>
                    </select>
                    <label for="hari">
                        Hari Lahir
                    </label>
                </div>

                <div class="form-floating mb-3">
                    <input type="date" class="form-control" id="tanggalLahir" name="tanggalLahir">
                    <label for="tanggalLahir">
                        Tanggal
                    </label>
                </div>

                <div class="form-floating mb-3">
                    <input type="time" class="form-control" id="pukul" name="pukul">
                    <label for="pukul">
                        Pukul
                    </label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="tempatLahir" name="tempatLahir">
                    <label for="tempatLahir">
                        Tempat
                    </label>
                </div>
                
                <div class="form-floating mb-3">
                    <select class="form-select" id="jenisKelahiran" name="jenisKelahiran" aria-label="Default select example">
                        <option selected>-- Jenis Kelahiran --</option>
                        <option value="Normal">Normal</option>
                        <option value="Sesar">Sesar</option>
                    </select>
                    <label for="jenisKelahiran">Jenis Kelahiran</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="namaBayi" name="namaBayi">
                    <label for="namaBayi">
                        Nama Bayi
                    </label>
                </div>

                <div class="form-floating mb-3">
                    <select class="form-select" id="jenisKelamin" name="jenisKelamin" aria-label="Default select example">
                        <option selected>-- Jenis Kelamin --</option>
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                    <label for="jenisKelamin">Jenis Kelamin</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="anakKe" name="anakKe">
                    <label for="anakKe">
                        Anak Ke
                    </label>
                </div>
    
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="namaIbu" name="namaIbu">
                    <label for="namaIbu">
                        Ibu
                    </label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="namaAyah" name="namaAyah">
                    <label for="namaAyah">
                        Ayah 
                    </label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="saksi1" name="saksi1">
                    <label for="saksi1">
                        Saksi 1
                    </label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="nikSaksi1" name="nikSaksi1">
                    <label for="nikSaksi1">
                        NIK Saksi 1
                    </label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="saksi2" name="saksi2">
                    <label for="saksi2">
                        Saksi 2
                    </label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="nikSaksi2" name="nikSaksi2">
                    <label for="nikSaksi2">
                        NIK Saksi 2
                    </label>
                </div>

                

            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" onclick="clearData()" data-bs-dismiss="modal">Close</button>
            <button type="submit" name="submit" onclick="submitData()" class="btn btn-primary">Submit</button>
        </div>
        </div>
    </div>
    </div>
    <!-- End Modal -->


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
                        <th>No Pelayan</th>
                        <th>Tanggal Pengajuan</th>
                        <th>NIK</th>
                        <th>Pemohon</th>
                        <th>Nama Bayi</th>
                        <th>Umur Bayi</th>
                        <th>Tanggal Kelahiran</th>
                        <th>Nama Ibu</th>
                        <th>Nama Ayah</th>
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
</div>
    <!-- Panggil File Print -->
    <?php include('view/print/kelahiranPrint.php')?>
    
    
    <!-- Script Src / Footer -->
    <?php include('view/layout/footer.php');?> 
    <!-- End Script Src / Footer -->
    <!-- Custom Script Disini -->
    <script>
        

        // FUNGSI PRINT
        var libInpEl = document.getElementById("libInp");

        function libPrint(value) {
            var value = JSON.parse(atob(value))
            console.log(value);

            libInpEl.style.display = "block";
            document.getElementById("namaPrint").innerHTML =value.pemohon;
            document.getElementById("nikPrint").innerHTML = value.nik;
            document.getElementById("noPelayananPrint").innerHTML = value.noPelayanan;
            document.getElementById("keteranganPrint").innerHTML = value.keterangan;
            document.getElementById("tanggalPrint").innerHTML = "Cirebon, "+value.tanggal;
            document.getElementById("tandatanganPrint").innerHTML =value.pemohon;

            printJS('libInp', 'html');
            libInpEl.style.display = "none";

        }
        // SELESAI PRINT
        
        var table;

        $(function(){
            table = $('#tableData').DataTable({
               "processing": true, "serverSide": true,
               "ajax":{
                   "url": "<?=$main_url;?>functionKelahiran",
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
                    { "data": "pemohon" },
                    { "data": "namaBayi" },
                    { "data": "umurBayi" },
                    { "data": "tanggalLahir" },
                    { "data": "namaIbu" },
                    { "data": "namaAyah" },
                    { "data": "status" },
                    { "data": "aksi" },
                ]       
            });
        });

        function showModal(){
            clearData();
            $.ajax({
                url:"<?=$main_url;?>functionKelahiran",
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
           $("#noPelayanan").val("");
           $("#tanggalPengajuan").val("");
           $("#pemohon").val("");
           $("#umurBayi").val("");
           $("#hubunganSibayi").val("");
           $("#hari").val("");
           $("#tanggalLahir").val("");
           $("#pukul").val("");
           $("#tempatLahir").val("");
           $("#jenisKelahiran").val("");
           $("#namaBayi").val("");
           $("#jenisKelamin").val("");
           $("#anakKe").val("");
           $("#namaIbu").val("");
           $("#namaAyah").val("");
           $("#saksi1").val("");
           $("#nikSaksi1").val("");
           $("#saksi2").val("");
           $("#nikSaksi2").val("");
       }
       
       function submitData(){
           // Inisialisasi Variable & Ambil data dari id text input
           var id = $("#id").val();
           var noPelayanan = $("#noPelayanan").val();
           var tanggalPengajuan = $("#tanggalPengajuan").val();
           var nik = $("#nik").val();
           var pemohon = $("#pemohon").val();
           var umurBayi = $("#umurBayi").val();
           var hubunganSibayi = $("#hubunganSibayi").val();
           var hari = $("#hari").val();
           var tanggalLahir = $("#tanggalLahir").val();
           var pukul = $("#pukul").val();
           var tempatLahir = $("#tempatLahir").val();
           var jenisKelahiran = $("#jenisKelahiran").val();
           var namaBayi = $("#namaBayi").val();
           var jenisKelamin = $("#jenisKelamin").val();
           var anakKe = $("#anakKe").val();
           var namaIbu = $("#namaIbu").val();
           var namaAyah = $("#namaAyah").val();
           var saksi1 = $("#saksi1").val();
           var nikSaksi1 = $("#nikSaksi1").val();
           var saksi2 = $("#saksi2").val();
           var nikSaksi2 = $("#nikSaksi2").val();

           console.log(namaBayi);

           // Validasi 
           if(tanggalPengajuan == "" || namaBayi == "" || pemohon == "" || namaIbu == "" || namaAyah == ""){
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
                   url:"<?=$main_url;?>functionKelahiran",
                   method:"POST",
                   data:{
                       function : functionControl,
                       // Opsional Data yg akan di post
                       id: id,
                       noPelayanan: noPelayanan,
                       tanggalPengajuan: tanggalPengajuan,
                       nik: nik,
                       pemohon : pemohon,
                       umurBayi : umurBayi,
                       hubunganSibayi : hubunganSibayi,
                       hari : hari,
                       tanggalLahir : tanggalLahir,
                       pukul : pukul,
                       tempatLahir : tempatLahir,
                       jenisKelahiran : jenisKelahiran,
                       namaBayi : namaBayi,
                       jenisKelamin : jenisKelamin,
                       anakKe : anakKe,
                       namaIbu : namaIbu,
                       namaAyah : namaAyah,
                       saksi1 : saksi1,
                       nikSaksi1 : nikSaksi1,
                       saksi2 : saksi2,
                       nikSaksi2 : nikSaksi2,
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
               url:"<?=$main_url;?>functionKelahiran",
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
           $("#noPelayanan").val(value.noPelayanan);
           $("#tanggalPengajuan").val(value.tanggalPengajuan);
           $("#pemohon").val(value.pemohon);
           $("#umurBayi").val(value.umurBayi);
           $("#hubunganSibayi").val(value.hubunganSibayi);
           $("#hari").val(value.hari);
           $("#tanggalLahir").val(value.tanggalLahir);
           $("#pukul").val(value.pukul);
           $("#tempatLahir").val(value.tempatLahir);
           $("#jenisKelahiran").val(value.jenisKelahiran);
           $("#namaBayi").val(value.namaBayi);
           $("#jenisKelamin").val(value.jenisKelamin);
           $("#anakKe").val(value.anakKe);
           $("#namaIbu").val(value.namaIbu);
           $("#namaAyah").val(value.namaAyah);
           $("#saksi1").val(value.saksi1);
           $("#nikSaksi1").val(value.nikSaksi1);
           $("#saksi2").val(value.saksi2);
           $("#nikSaksi2").val(value.nikSaksi2);
           
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
               url:"<?=$main_url;?>functionKelahiran",
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