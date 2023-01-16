<?php
    $_SESSION["isFailed"] = false;
    $dataLogin = $_SESSION["dataLogin"];

    // Cek Apakah Ada Request Pemanggilan Fungsi CRUD ?
    // Wajib Tambahkan Parameter $conn untuk memasukan koneksi database ke function
    if(isset($_POST["function"])){
        switch($_POST["function"]){
            case "getKode": getKode($conn); break;
            case "create": tambahData($conn); break;
            case "readDataTable": readDataTable($conn); break;
            case "update": ubahData($conn); break;
            case "delete": hapusData($conn); break;
            case "gantiStatus": gantiStatus($conn); break;
        }
    }

    function getKode($conn){
        $noPelayananGenerate = "-";

        // Generate Kode Atau No Pelayanan
        $query = mysqli_query($conn, "SELECT * FROM pelayananktp ORDER BY id DESC LIMIT 1");
        $row = mysqli_fetch_assoc($query);
        if($row == null){
            $noPelayananGenerate = "1 KTP/".date("Y");
        }else{
            $noPelayananGenerate = ($row["id"]+1)." KTP/".date("Y");
        }

        echo $noPelayananGenerate;
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

    // Fungsi Read Data Table
    function readDataTable($conn){
        $dataLogin = $_SESSION["dataLogin"];

        $columns = array( 
            0 =>'id', 
            1 =>'nik',
            2=> 'jenisPelayanan',
            3=> 'tanggal',
            4=> 'keterangan',
            5=> 'createdBy',
            6=> 'createdAt',
            7=> 'noPelayanan',
            8=> 'status',
        );

        $where = "";

        if($dataLogin["levelUser"] == "user"){
            $where = "WHERE createdBy = ".$dataLogin["id"];
        }

        $querycount = mysqli_query($conn, "SELECT count(id) as jumlah FROM pelayananktp ".$where);
        $datacount = $querycount->fetch_array();
        
        $totalData = $datacount['jumlah'];
        
        $totalFiltered = $totalData; 
        
        $limit = $_POST['length'];
        $start = $_POST['start'];
        $order = $columns[$_POST['order']['0']['column']];
        $dir = $_POST['order']['0']['dir'];
        
        if(empty($_POST['search']['value'])) {            
            $query = mysqli_query($conn, "SELECT * FROM pelayananktp $where order by $order $dir LIMIT $limit OFFSET $start");
        } else {
            $search = $_POST['search']['value']; 
            
            $query = mysqli_query($conn, "SELECT * FROM pelayananktp 
                WHERE noPelayanan LIKE '%$search%' 
                or tanggal LIKE '%$search%' 
                or nik LIKE '%$search%' 
                or jenisPelayanan LIKE '%$search%' 
                or keterangan LIKE '%$search%' 
                or status LIKE '%$search%' 
                order by $order $dir LIMIT $limit OFFSET $start"
            );
            
            $querycount = mysqli_query($conn, "SELECT count(id) as jumlah FROM pelayananktp 
                WHERE noPelayanan LIKE '%$search%' 
                or tanggal LIKE '%$search%' 
                or nik LIKE '%$search%' 
                or jenisPelayanan LIKE '%$search%' 
                or keterangan LIKE '%$search%' 
                or status LIKE '%$search%' "
                .$where
            );

            $datacount = $querycount->fetch_array();
            $totalFiltered = $datacount['jumlah'];

        }
        
        $data = array();
        if(!empty($query)){
            $no = $start + 1;
            while ($r = $query->fetch_array()){
                $nestedData['no'] = $no;
                $nestedData['noPelayanan'] = $r['noPelayanan'];
                $nestedData['tanggal'] = $r['tanggal'];
                $nestedData['nik'] = $r['nik'];
                $nestedData['jenisPelayanan'] = $r['jenisPelayanan'];
                $nestedData['keterangan'] = $r['keterangan'];
                $nestedData['status'] = $r['status'];
                
                $aksi = "";
                // Enskripsi Data Agar Tidak Error Saat Fetch Data ke javascript
                $encryptParse = base64_encode(json_encode($r));
                //Tambahkan Button Aksi
                $aksi .= "<button onclick=editData('".$encryptParse."') class='btn btn-sm btn-light'> <i class='fa-solid fa-pen' style='color: green;'></i></button> ";
                $aksi .= "<button onclick=deleteData(".$r["id"].") class='btn btn-sm btn-light'> <i class='fa-solid fa-trash' style='color: red;'></i></button>";

                $nestedData['aksi'] = $aksi;
                
                $data[] = $nestedData;
                $no++;
            }
        }
        
        $json_data = array(
            "draw"            => intval($_POST['draw']),  
            "recordsTotal"    => intval($totalData),  
            "recordsFiltered" => intval($totalFiltered), 
            "data"            => $data  
        );
        
        echo json_encode($json_data); 
    }

     // Fungsi Update
    function ubahData($conn) {
        // Parsing Semua Variable
        $id = $_POST["id"];
        $jenisPelayanan = $_POST["jenisPelayanan"];
        $tanggal = $_POST["tanggal"];
        $keterangan = $_POST["keterangan"];
        
        // Masukan Kedalam Query
        $query = "UPDATE pelayananktp SET
            jenisPelayanan = '$jenisPelayanan',
            tanggal = '$tanggal',
            keterangan = '$keterangan'
            WHERE id = '$id'
        ";

        mysqli_query($conn, $query);

        $checkStatus = mysqli_affected_rows($conn);
        
        if($checkStatus == 1){
            echo 200;
        }else{
            echo 400;
        }
    }

     // Fungsi Delete
    function hapusData($conn) {
        $id = $_POST["id"];
        $query = "DELETE FROM pelayananktp WHERE id = $id";

        mysqli_query($conn, $query);

        $checkStatus = mysqli_affected_rows($conn);

        if($checkStatus == 1){
            echo 200;
        }else{
            echo 400;
        }
    }

    // Fungsi Ganti Status
    function gantiStatus($conn) {
        echo "Hello world!";
    }

?>