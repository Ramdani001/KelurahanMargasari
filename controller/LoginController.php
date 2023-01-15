<?php
    if (isset($_POST['submit'])) {
        session_start();
        $nik = $_POST["nik"];
        $pass = $_POST["password"];

        $result = mysqli_query($conn, "SELECT * FROM userPenduduk WHERE nik = '$nik'");

        if( mysqli_num_rows($result) == 1 ) {
            $row = mysqli_fetch_assoc($result);
            if($pass == $row["password"]){
                $_SESSION['dataLogin'] = $row; 
                header("Location: beranda");
                exit;
            }else{
                $_SESSION['isFailed'] = true; 
                header("Location: login_user");
            }
        }else{
            $_SESSION['isFailed'] = true; 
            header("Location: login_user");
        }
    }
?>