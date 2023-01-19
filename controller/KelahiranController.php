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
    
    // Get Data Nik
    $queryNik = mysqli_query($conn, "SELECT * FROM userPenduduk WHERE levelUser = 'user' ORDER BY id ");
    $nikData = [];
    while ( $row = mysqli_fetch_assoc($queryNik) ){
        $nikData[] = $row;
    }

    function getKode($conn){
        $noPelayananGenerate = "-";

        // Generate Kode Atau No Pelayanan
        $query = mysqli_query($conn, "SELECT * FROM tabelkelahiran ORDER BY id DESC LIMIT 1");
        $row = mysqli_fetch_assoc($query);
        if($row == null){
            $noPelayananGenerate = "1 KLRN/".date("Y");
        }else{
            $noPelayananGenerate = ($row["id"]+1)." KLRN/".date("Y");
        }

        echo $noPelayananGenerate;
    }

    // Fungsi Create
    function tambahData($conn) {
        // Panggil Ulang Session
        $dataLogin = $_SESSION["dataLogin"];
        
        $noPelayanan = $_POST["noPelayanan"];
        $tanggalPengajuan = $_POST["tanggalPengajuan"];
        $pemohon = $_POST["pemohon"];
        $umurBayi = $_POST["umurBayi"];
        $hubunganSibayi = $_POST["hubunganSibayi"];
        $hari = $_POST["hari"];
        $tanggalLahir = $_POST["tanggalLahir"];
        $pukul = $_POST["pukul"];
        $tempatLahir = $_POST["tempatLahir"];
        $jenisKelahiran = $_POST["jenisKelahiran"];
        $namaBayi = $_POST["namaBayi"];
        $jenisKelamin = $_POST["jenisKelamin"];
        $anakKe = $_POST["anakKe"];
        $namaIbu = $_POST["namaIbu"];
        $namaAyah = $_POST["namaAyah"];
        $saksi1 = $_POST["saksi1"];
        $nikSaksi1 = $_POST["nikSaksi1"];
        $saksi2 = $_POST["saksi2"];
        $nikSaksi2 = $_POST["nikSaksi2"];
        $status = "Diajukan";
        $createdBy = $dataLogin["id"];
        $createdAt = date("Y-m-d h:i:s");
        
        // Masukan Kedalam Query
        $query = "INSERT INTO tabelkelahiran
        (noPelayanan, tanggalPengajuan, pemohon, umurBayi, hubunganSibayi, hari,tanggalLahir, pukul, tempatLahir, jenisKelahiran, namaBayi, jenisKelamin, anakKe, namaIbu, namaAyah, saksi1, nikSaksi1, saksi2, nikSaksi2,`status`, createdBy, createdAt)
        VALUES ('$noPelayanan', '$tanggalPengajuan', '$pemohon', '$umurBayi', '$hubunganSibayi', '$hari','$tanggalLahir', '$pukul', '$tempatLahir', '$jenisKelahiran', '$namaBayi', '$jenisKelamin','$anakKe','$namaIbu', '$namaAyah', '$saksi1','$nikSaksi1', '$saksi2', '$nikSaksi2', '$status', '$createdBy', '$createdAt')";

        mysqli_query($conn, $query);
        echo 200;
        
    }

    // Fungsi Read Data Table
    function readDataTable($conn){
        $dataLogin = $_SESSION["dataLogin"];

        $columns = array( 
            0 =>'id', 
            1 =>'noPelayanan',
            2 => 'tanggalPengajuan',
            3 => 'pemohon',
            4 => 'namaBayi',
            5 => 'umurBayi',
            6 => 'tanggalLahir',
            7 => 'namaIbu',
            8 => 'namaAyah',
            9 => 'status',
            10 => 'aksi',
            // 8 => 'pukul',
            // 9 => 'tempatLahir',
            // 10 => 'jenisKelahiran',
            // 11 => 'namaBayi',
            // 12 => 'jenisKelamin',
            // 13 => 'anakKe',
            // 14 => 'namaIbu',
            // 15 => 'namaAyah',
            // 16 => 'saksi1',
            // 17 => 'nikSaksi1',
            // 18 => 'saksi2',
            // 19 => 'nikSaksi2',
            // 20 => 'status',
            // 21 => 'createdBy',
            // 22 => 'createdAt', 
        );

        $where = "";
        $or = "";

        if($dataLogin["levelUser"] == "user"){
            $where = "WHERE nik = ".$dataLogin["nik"];
            $or = "OR nik = ".$dataLogin["nik"];
        }


        $querycount = mysqli_query($conn, "SELECT count(id) as jumlah FROM tabelkelahiran ".$where);
        $datacount = $querycount->fetch_array();
        
        $totalData = $datacount['jumlah'];
        
        $totalFiltered = $totalData; 
        
        $limit = $_POST['length'];
        $start = $_POST['start'];
        $order = $columns[$_POST['order']['0']['column']];
        $dir = $_POST['order']['0']['dir'];
        
        if(empty($_POST['search']['value'])) {            
            $query = mysqli_query($conn, "SELECT * FROM tabelkelahiran $where order by $order $dir LIMIT $limit OFFSET $start");
        } else {
            $search = $_POST['search']['value']; 
            
            $query = mysqli_query($conn, "SELECT * FROM tabelkelahiran 
                WHERE noPelayanan LIKE '%$search%' 
                or tanggalPengajuan LIKE '%$search%' 
                or pemohon LIKE '%$search%' 
                or umurBayi LIKE '%$search%' 
                or hubunganSibayi LIKE '%$search%' 
                or hari LIKE '%$search%' 
                or tanggalLahir LIKE '%$search%' 
                or pukul LIKE '%$search%' 
                or tempatLahir LIKE '%$search%' 
                or jenisKelahiran LIKE '%$search%' 
                or namaBayi LIKE '%$search%' 
                or jenisKelamin LIKE '%$search%' 
                or anakKe LIKE '%$search%' 
                or namaIbu LIKE '%$search%' 
                or namaAyah LIKE '%$search%' 
                or saksi1 LIKE '%$search%' 
                or nikSaksi1 LIKE '%$search%' 
                or saksi2 LIKE '%$search%' 
                or nikSaksi2 LIKE '%$search%' 
                or status LIKE '%$search%' 
                order by $order $dir LIMIT $limit OFFSET $start"
            );
            
            $querycount = mysqli_query($conn, "SELECT count(id) as jumlah FROM tabelkelahiran 
                WHERE noPelayanan LIKE '%$search%' 
                or tanggalPengajuan LIKE '%$search%' 
                or pemohon LIKE '%$search%' 
                or umurBayi LIKE '%$search%' 
                or hubunganSibayi LIKE '%$search%' 
                or hari LIKE '%$search%' 
                or tanggalLahir LIKE '%$search%' 
                or pukul LIKE '%$search%' 
                or tempatLahir LIKE '%$search%' 
                or jenisKelahiran LIKE '%$search%' 
                or namaBayi LIKE '%$search%' 
                or jenisKelamin LIKE '%$search%' 
                or anakKe LIKE '%$search%' 
                or namaIbu LIKE '%$search%' 
                or namaAyah LIKE '%$search%' 
                or saksi1 LIKE '%$search%' 
                or nikSaksi1 LIKE '%$search%' 
                or saksi2 LIKE '%$search%' 
                or nikSaksi2 LIKE '%$search%' 
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
                $nestedData['tanggalPengajuan'] = $r['tanggalPengajuan'];
                $nestedData['pemohon'] = $r['pemohon'];
                $nestedData['umurBayi'] = $r['umurBayi'];
                $nestedData['hubunganSibayi'] = $r['hubunganSibayi'];
                $nestedData['hari'] = $r['hari'];
                $nestedData['tanggalLahir'] = $r['tanggalLahir'];
                $nestedData['pukul'] = $r['pukul'];
                $nestedData['tempatLahir'] = $r['tempatLahir'];
                $nestedData['jenisKelahiran'] = $r['jenisKelahiran'];
                $nestedData['namaBayi'] = $r['namaBayi'];
                $nestedData['jenisKelamin'] = $r['jenisKelamin'];
                $nestedData['anakKe'] = $r['anakKe'];
                $nestedData['namaIbu'] = $r['namaIbu'];
                $nestedData['namaAyah'] = $r['namaAyah'];
                $nestedData['saksi1'] = $r['saksi1'];
                $nestedData['nikSaksi1'] = $r['nikSaksi1'];
                $nestedData['saksi2'] = $r['saksi2'];
                $nestedData['nikSaksi2'] = $r['nikSaksi2'];
                
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

                if($r["status"] == "Diajukan"){
                    $aksi .= "<button onclick=editData('".$encryptParse."') class='btn btn-sm btn-success' style='display: inline !important;'> <i class='fa-solid fa-pen' style='color: white;'></i></button> ";
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
        $noPelayanan = $_POST["noPelayanan"];
        $tanggalPengajuan = $_POST["tanggalPengajuan"];
        $pemohon = $_POST["pemohon"];
        $umurBayi = $_POST["umurBayi"];
        $hubunganSibayi = $_POST["hubunganSibayi"];
        $hari = $_POST["hari"];
        $tanggalLahir = $_POST["tanggalLahir"];
        $pukul = $_POST["pukul"];
        $tempatLahir = $_POST["tempatLahir"];
        $jenisKelahiran = $_POST["jenisKelahiran"];
        $namaBayi = $_POST["namaBayi"];
        $jenisKelamin = $_POST["jenisKelamin"];
        $anakKe = $_POST["anakKe"];
        $namaIbu = $_POST["namaIbu"];
        $namaAyah = $_POST["namaAyah"];
        $saksi1 = $_POST["saksi1"];
        $nikSaksi1 = $_POST["nikSaksi1"];
        $saksi2 = $_POST["saksi2"];
        $nikSaksi2 = $_POST["nikSaksi2"];
        if($dataLogin["levelUser"] == "admin"){
            $nik = $_POST["nik"];
        }
        
        // Masukan Kedalam Query
        $query = "UPDATE tabelkelahiran SET
            noPelayanan = '$noPelayanan',
            tanggalPengajuan = '$tanggalPengajuan',
            pemohon = '$pemohon',
            umurBayi = '$umurBayi',
            hubunganSibayi = '$hubunganSibayi',
            hari = '$hari',
            tanggalLahir = '$tanggalLahir',
            pukul = '$pukul',
            tempatLahir = '$tempatLahir',
            jenisKelahiran = '$jenisKelahiran',
            namaBayi = '$namaBayi',
            jenisKelamin = '$jenisKelamin',
            anakKe = '$anakKe',
            namaIbu = '$namaIbu',
            namaAyah = '$namaAyah',
            saksi1 = '$saksi1',
            nikSaksi1 = '$nikSaksi1',
            saksi2 = '$saksi2',
            nikSaksi2 = '$nikSaksi2',
            `status` = 'Diajukan'
            WHERE id = '$id'
        ";
        mysqli_query($conn, $query);
        echo 200;
    }

     // Fungsi Delete
    function hapusData($conn) {
        $id = $_POST["id"];
        $query = "DELETE FROM tabelkelahiran WHERE id = $id";
        mysqli_query($conn, $query);
        echo 200;
    }

    // Fungsi Ganti Status
    function gantiStatus($conn) {
        $id = $_POST["id"];
        $status = $_POST["status"];
        $query = "UPDATE tabelkelahiran SET `status` = '$status' WHERE id = '$id'";
        mysqli_query($conn, $query);
        echo 200;
        
    }

?>