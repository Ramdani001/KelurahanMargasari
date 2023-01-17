<?php
    $_SESSION["isFailed"] = false;
    $dataLogin = $_SESSION["dataLogin"];
  
    // Cek Apakah Ada Request Pemanggilan Fungsi CRUD ?
    // Wajib Tambahkan Parameter $conn untuk memasukan koneksi database ke function
    if(isset($_POST["function"])){
        switch($_POST["function"]){
            case "create": tambahData($conn); break;
            case "readDataTable": readDataTable($conn); break;
            case "update": ubahData($conn); break;
            case "delete": hapusData($conn); break;
        }
    }


    // Fungsi Create
    function tambahData($conn) {
        // Panggil Ulang Session
        $nik = $_POST["nik"];
        $noKk = $_POST["noKk"];
        $namaLengkap = $_POST["namaLengkap"];
        $jenisKelamin = $_POST["jenisKelamin"];
        $golonganDarah = $_POST["golonganDarah"];
        $tempatLahir = $_POST["tempatLahir"];
        $tanggalLahir = $_POST["tanggalLahir"];
        $agama = $_POST["agama"];
        $statusPerkawinan = $_POST["statusPerkawinan"];
        $alamat = $_POST["alamat"];
        $telepon = $_POST["telepon"];
        $kewarganegaraan = $_POST["kewarganegaraan"];
        $pekerjaan = $_POST["pekerjaan"];
        $password = $_POST["password"];

        
        // Masukan Kedalam Query
        $query = "INSERT INTO userPenduduk
        (
            nik,
            noKk,
            namaLengkap,
            jenisKelamin,
            golonganDarah,
            tempatLahir,
            tanggalLahir,
            agama,
            statusPerkawinan,
            alamat,
            telepon,
            kewarganegaraan,
            pekerjaan,
            password,
            levelUser
        )
        VALUES (
            '$nik',
            '$noKk',
            '$namaLengkap',
            '$jenisKelamin',
            '$golonganDarah',
            '$tempatLahir',
            '$tanggalLahir',
            '$agama',
            '$statusPerkawinan',
            '$alamat',
            '$telepon',
            '$kewarganegaraan',
            '$pekerjaan',
            '$password',
            'user'
        )";

        mysqli_query($conn, $query);
        echo 200;
        
    }

    // Fungsi Read Data Table
    function readDataTable($conn){
        $dataLogin = $_SESSION["dataLogin"];

        $columns = array( 
            0 =>'id', 
            1 =>'nik', 
            2=> 'noKk', 
            3=> 'namaLengkap', 
            4=> 'jenisKelamin',
            5=> 'golonganDarah', 
            6=> 'tempatLahir', 
            7=> 'tanggalLahir', 
            8=> 'agama',
            9=> 'statusPerkawinan', 
            10=> 'alamat', 
            11=> 'telepon', 
            12=> 'kewarganegaraan',
            13=> 'pekerjaan', 
            14=> 'password', 
            15=> 'levelUser',
        );

        $querycount = mysqli_query($conn, "SELECT count(id) as jumlah FROM userPenduduk ");
        $datacount = $querycount->fetch_array();
        
        $totalData = $datacount['jumlah'];
        
        $totalFiltered = $totalData; 
        
        $limit = $_POST['length'];
        $start = $_POST['start'];
        $order = $columns[$_POST['order']['0']['column']];
        $dir = $_POST['order']['0']['dir'];
        
        if(empty($_POST['search']['value'])) {            
            $query = mysqli_query($conn, "SELECT * FROM userPenduduk WHERE levelUser = 'user' order by $order $dir LIMIT $limit OFFSET $start");
        } else {
            $search = $_POST['search']['value']; 
            
            $query = mysqli_query($conn, "SELECT * FROM userPenduduk 
                WHERE nik LIKE '%$search%' 
                or noKk LIKE '%$search%' 
                or namaLengkap LIKE '%$search%' 
                or jenisKelamin LIKE '%$search%' 
                or golonganDarah LIKE '%$search%' 
                or tempatLahir LIKE '%$search%' 
                or tanggalLahir LIKE '%$search%' 
                or agama LIKE '%$search%' 
                or statusPerkawinan LIKE '%$search%' 
                or alamat LIKE '%$search%' 
                or telepon LIKE '%$search%' 
                or kewarganegaraan LIKE '%$search%' 
                or pekerjaan LIKE '%$search%'
                order by $order $dir LIMIT $limit OFFSET $start"
            );
            
            $querycount = mysqli_query($conn, "SELECT count(id) as jumlah FROM userPenduduk 
                WHERE nik LIKE '%$search%' 
                or noKk LIKE '%$search%' 
                or namaLengkap LIKE '%$search%' 
                or jenisKelamin LIKE '%$search%' 
                or golonganDarah LIKE '%$search%' 
                or tempatLahir LIKE '%$search%' 
                or tanggalLahir LIKE '%$search%' 
                or agama LIKE '%$search%' 
                or statusPerkawinan LIKE '%$search%' 
                or alamat LIKE '%$search%' 
                or telepon LIKE '%$search%' 
                or kewarganegaraan LIKE '%$search%' 
                or pekerjaan LIKE '%$search%'" 
            );

            $datacount = $querycount->fetch_array();
            $totalFiltered = $datacount['jumlah'];

        }
        
        $data = array();
        if(!empty($query)){
            $no = $start + 1;
            while ($r = $query->fetch_array()){
                $nestedData['no'] = $no;
                $nestedData['nik'] = $r['nik'];
                $nestedData['noKk'] = $r['noKk'];
                $nestedData['namaLengkap'] = $r['namaLengkap'];
                $nestedData['jenisKelamin'] = $r['jenisKelamin'];
                $nestedData['golonganDarah'] = $r['golonganDarah'];
                $nestedData['tempatLahir'] = $r['tempatLahir'];
                $nestedData['tanggalLahir'] = $r['tanggalLahir'];
                $nestedData['agama'] = $r['agama'];
                $nestedData['statusPerkawinan'] = $r['statusPerkawinan'];
                $nestedData['alamat'] = $r['alamat'];
                $nestedData['telepon'] = $r['telepon'];
                $nestedData['kewarganegaraan'] = $r['kewarganegaraan'];
                $nestedData['pekerjaan'] = $r['pekerjaan'];
                $nestedData['password'] = $r['password'];
                $nestedData['levelUser'] = $r['levelUser'];
                
                $aksi = "";
                // Enskripsi Data Agar Tidak Error Saat Fetch Data ke javascript
                $encryptParse = base64_encode(json_encode($r));
                //Tambahkan Button Aksi
                $aksi .= "<button onclick=editData('".$encryptParse."') class='btn btn-sm btn-success'> <i class='fa-solid fa-pen' style='color: white;'></i></button> ";
                $aksi .= "<button onclick=deleteData(".$r["id"].") class='btn btn-sm btn-danger'> <i class='fa-solid fa-trash' style='color: white;'></i></button>";

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
        $nik = $_POST["nik"];
        $noKk = $_POST["noKk"];
        $namaLengkap = $_POST["namaLengkap"];
        $jenisKelamin = $_POST["jenisKelamin"];
        $golonganDarah = $_POST["golonganDarah"];
        $tempatLahir = $_POST["tempatLahir"];
        $tanggalLahir = $_POST["tanggalLahir"];
        $agama = $_POST["agama"];
        $statusPerkawinan = $_POST["statusPerkawinan"];
        $alamat = $_POST["alamat"];
        $telepon = $_POST["telepon"];
        $kewarganegaraan = $_POST["kewarganegaraan"];
        $pekerjaan = $_POST["pekerjaan"];
        $password = $_POST["password"];
        
        // Masukan Kedalam Query
        $query = "UPDATE userPenduduk SET
            nik = '$nik',
            noKk = '$noKk',
            namaLengkap = '$namaLengkap',
            jenisKelamin = '$jenisKelamin',
            golonganDarah = '$golonganDarah',
            tempatLahir = '$tempatLahir',
            tanggalLahir = '$tanggalLahir',
            agama = '$agama',
            statusPerkawinan = '$statusPerkawinan',
            alamat = '$alamat',
            telepon = '$telepon',
            kewarganegaraan = '$kewarganegaraan',
            pekerjaan = '$pekerjaan',
            password = '$password'
            WHERE id = '$id'
        ";
        mysqli_query($conn, $query);
        echo 200;
    }

     // Fungsi Delete
    function hapusData($conn) {
        $id = $_POST["id"];
        $query = "DELETE FROM userPenduduk WHERE id = $id";
        mysqli_query($conn, $query);
        echo 200;
    }

?>