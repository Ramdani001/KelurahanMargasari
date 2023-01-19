<?php
    $_SESSION["isFailed"] = false;
    $dataLogin = $_SESSION["dataLogin"];

    // Cek Apakah Ada Requex Pemanggilan Fungsi CRUD?
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

    // Get Data Nik
    $queryNik = mysqli_query($conn, "SELECT * FROM userPenduduk WHERE levelUser = 'user' ORDER BY id ");
    $nikData = [];
    while ( $row = mysqli_fetch_assoc($queryNik) ){
        $nikData[] = $row;
    }

    function getKode($conn){
        $noPelayananGenerate = "-";

        // Generate Kode Atau No Pelayanan
        $query = mysqli_query($conn, "SELECT * FROM pelayanankk ORDER BY id DESC LIMIT 1");
        $row = mysqli_fetch_assoc($query);
        if($row == null){
            $noPelayananGenerate = "1 KK/".date("Y");
        }else{
            $noPelayananGenerate = ($row["id"]+1)." KK/".date("Y");
        }

        echo $noPelayananGenerate;
    }

    // Fungsi Create
    function tambahData($conn) {
        // Panggil Ulang Session
        $dataLogin = $_SESSION["dataLogin"];
        
        // Parsing Semua Variable
        $nik = $dataLogin["nik"];
        if($dataLogin["levelUser"] == "admin"){
            $nik = $_POST["nik"];
        }
        $noPelayanan = $_POST["noPelayanan"];
        $tanggal = $_POST["tanggal"];
        $nik = $_POST["nik"];
        $nama = $_POST["nama"];
        $keterangan = $_POST["keterangan"];
        $createdBy = $dataLogin["id"];
        $createdAt = date("Y-m-d h:i:s");
        $status = "Diajukan";
        
        // Masukan Kedalam Query
        $query = "INSERT INTO pelayanankk
        (noPelayanan, tanggal, nik, nama, keterangan ,createdBy, createdAt, `status`)
        VALUES ('$noPelayanan','$tanggal','$nik', '$nama' ,'$keterangan','$createdBy','$createdAt','$status')";

        mysqli_query($conn, $query);
        echo 200;
        
    }

    // Fungsi Read Data Table
    function readDataTable($conn){
        $dataLogin = $_SESSION["dataLogin"];

        $columns = array( 
            0 =>'id', 
            1 =>'noPelayanan',
            2=> 'tanggal',
            3=> 'nik',
            4=> 'nama',
            5=> 'keterangan',
            6=> 'createdBy',
            7=> 'createdAt',
            8=> 'status',
        );

        $where = "";
        $or = "";

        if($dataLogin["levelUser"] == "user"){
            $where = "WHERE nik = ".$dataLogin["nik"];
            $or = "OR nik = ".$dataLogin["nik"];
        }


        $querycount = mysqli_query($conn, "SELECT count(id) as jumlah FROM pelayanankk ".$where);
        $datacount = $querycount->fetch_array();
        
        $totalData = $datacount['jumlah'];
        
        $totalFiltered = $totalData; 
        
        $limit = $_POST['length'];
        $start = $_POST['start'];
        $order = $columns[$_POST['order']['0']['column']];
        $dir = $_POST['order']['0']['dir'];
        
        if(empty($_POST['search']['value'])) {            
            $query = mysqli_query($conn, "SELECT * FROM pelayanankk $where order by $order $dir LIMIT $limit OFFSET $start");
        } else {
            $search = $_POST['search']['value']; 
            
            $query = mysqli_query($conn, "SELECT * FROM pelayanankk
                WHERE noPelayanan LIKE '%$search%' 
                or tanggal LIKE '%$search%' 
                or nik LIKE '%$search%' 
                or nama LIKE '%$search%' 
                or keterangan LIKE '%$search%' 
                or status LIKE '%$search%' 
                order by $order $dir LIMIT $limit OFFSET $start"
            );
            
            $querycount = mysqli_query($conn, "SELECT count(id) as jumlah FROM pelayanankk 
                WHERE noPelayanan LIKE '%$search%' 
                or tanggal LIKE '%$search%' 
                or nik LIKE '%$search%' 
                or nama LIKE '%$search%' 
                or keterangan LIKE '%$search%' 
                or status LIKE '%$search%' "
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
                $nestedData['nama'] = $r['nama'];
                $nestedData['keterangan'] = $r['keterangan'];
                
                if($r["status"] == "Diajukan"){
                    $nestedData['status'] = "<button class='btn btn-sm btn-primary'> <i class='fa-solid fa-clock' style='color: white;'></i> Diajukan&nbsp; </button> ";
                }else if($r["status"] == "Diproses"){
                    $nestedData['status'] = "<button class='btn btn-sm btn-warning'> <i class='fa-solid fa-clock' style='color: white;'></i> Diproses </button> ";
                }else if($r["status"] == "Disetujui"){
                    $nestedData['status'] = "<button class='btn btn-sm btn-success'> <i class='fa-solid fa-check' style='color: white;'></i> Disetujui </button> ";
                }else if($r["status"] == "Ditolak"){
                    $nestedData['status'] = "<button class='btn btn-sm btn-danger'> <i class='fa-solid fa-close' style='color: white;'></i> &nbsp;&nbsp; Ditolak &nbsp; </button> ";
                }
                
                $aksi = "";
                // Enskripsi Data Agar Tidak Error Saat Fetch Data ke javascript
                $encryptParse = base64_encode(json_encode($r));
                //Tambahkan Button Aksi
                if($dataLogin["levelUser"] == "admin"){
                    if($r["status"] == "Diajukan"){
                        $aksi .= "<button onclick=showModalStatus('".$encryptParse."') class='btn btn-sm btn-primary'> status </button> ";
                    }else if($r["status"] == "Diproses"){
                        $aksi .= "<button onclick=showModalStatus('".$encryptParse."') class='btn btn-sm btn-primary'> status </button> ";
                    }else if($r["status"] == "Disetujui"){
                        $aksi .= "<button onclick=showModalStatus('".$encryptParse."') class='btn btn-sm btn-primary'> status </button> ";
                    }else if($r["status"] == "Ditolak"){
                        $aksi .= "<button onclick=showModalStatus('".$encryptParse."') class='btn btn-sm btn-primary'> status </button> ";
                    }
                }

                $aksi .= "<button onclick=libPrint('".$encryptParse."') class='btn btn-sm btn-warning'> <i class='fa-solid fa-print' style='color: white;'></i></button> ";

                if($r["status"] == "Diajukan"){
                    $aksi .= "<button onclick=editData('".$encryptParse."') class='btn btn-sm btn-success'> <i class='fa-solid fa-pen' style='color: white;'></i></button> ";
                    $aksi .= "<button onclick=deleteData(".$r["id"].") class='btn btn-sm btn-danger'> <i class='fa-solid fa-trash' style='color: white;'></i></button>";
                }else if($r["status"] == "Ditolak"){
                    $aksi .= "<button onclick=editData('".$encryptParse."') class='btn btn-sm btn-success'> <i class='fa-solid fa-pen' style='color: white;'></i></button> ";
                }

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
    $dataLogin = $_SESSION["dataLogin"];
    // Parsing Semua Variable
    $id = $_POST["id"];
    $tanggal = $_POST["tanggal"];
    $nik = $dataLogin["nik"];
    $nama = $_POST["nama"];
    $keterangan = $_POST["keterangan"];
    if($dataLogin["levelUser"] == "admin"){
        $nik = $_POST["nik"];
    }
    
    // Masukan Kedalam Query
    $query = "UPDATE pelayanankk SET
        nik = '$nik',
        tanggal = '$tanggal',
        nik = '$nik',
        nama = '$nama',
        keterangan = '$keterangan',
        `status` = 'Diajukan'
        WHERE id = '$id'
    ";
    mysqli_query($conn, $query);
    echo 200;
}

 // Fungsi Delete
function hapusData($conn) {
    $id = $_POST["id"];
    $query = "DELETE FROM pelayanankk WHERE id = $id";
    mysqli_query($conn, $query);
    echo 200;
}

// Fungsi Ganti Status
function gantiStatus($conn) {
    $id = $_POST["id"];
    $status = $_POST["status"];
    $query = "UPDATE pelayanankk SET `status` = '$status' WHERE id = '$id'";
    mysqli_query($conn, $query);
    echo 200;
    
}

?>  