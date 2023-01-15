<?php
    $_SESSION["isFailed"] = false;
    $dataLogin = $_SESSION["dataLogin"];

    // Inisialisasi Variable
    $noPelayananGenerate = "-";
    // End Inisialisasi Variable

    // Generate Kode Atau No Pelayanan
    $query = mysqli_query($conn, "SELECT * FROM pelayananktp ORDER BY id DESC LIMIT 1");
    $row = mysqli_fetch_assoc($query);
    if($row == null){
        $noPelayananGenerate = "1 KTP/".date("Y");
    }else{
        $noPelayananGenerate = ($row["id"]+1)." KTP/".date("Y");
    }

    // Cek Apakah Ada Request Pemanggilan Fungsi CRUD ?
    // Wajib Tambahkan Parameter $conn untuk memasukan koneksi database ke function
    if(isset($_POST["function"])){
        switch($_POST["function"]){
            case "create": tambahData($conn); break;
            case "update": ubahData($conn); break;
            case "delete": hapusData($conn); break;
            case "gantiStatus": gantiStatus($conn); break;
        }
    }

    // Fungsi Create
    function tambahData($conn) {
        // Panggil Ulang Session
        $dataLogin = $_SESSION["dataLogin"];
        
        // Parsing Semua Variable
        $nik = $dataLogin["nik"];
        $jenisPelayanan = $_POST["jenisPelayanan"];
        $tanggal = $_POST["tanggal"];
        $keterangan = $_POST["keterangan"];
        $createdBy = $dataLogin["id"];
        $createdAt = date("Y-m-d h:i:s");
        $noPelayanan = $_POST["noPelayanan"];
        $status = "Diajukan";
        
        // Masukan Kedalam Query
        $query = "INSERT INTO pelayananktp
        (nik, jenisPelayanan, tanggal, keterangan, createdBy, createdAt, noPelayanan, `status`)
        VALUES ('$nik','$jenisPelayanan','$tanggal','$keterangan','$createdBy','$createdAt','$noPelayanan','$status')";

        mysqli_query($conn, $query);

        $checkStatus = mysqli_affected_rows($conn);
        
        if($checkStatus == 1){
            echo 200;
        }else{
            echo 400;
        }
        
    }

     // Fungsi Update
     function ubahData($conn) {
        echo "Hello world!";
    }

     // Fungsi Delete
     function hapusData($conn) {
        echo "Hello world!";
    }

    // Fungsi Ganti Status
    function gantiStatus($conn) {
        echo "Hello world!";
    }

?>