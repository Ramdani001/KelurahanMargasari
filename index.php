<?php
    include "config/database.php";
    include "config/config.php";
    
    // BASE URL SESUAIKAN DENGAN LINK / HOST MASING - MASING, TERMASUK PROJECT LOCATION NYA JUGA
    $base_url = "http://localhost"; // Sesuaikan dengan Host Masing - Masing
    $project_location = "/kelurahanMargasari/index.php"; // Sesuaikan dengan nama project yg digunakan

    // Global Variable
    $vars = explode("/",$_SERVER['REQUEST_URI']);
    $main_url = $base_url."/".$vars[1]."/";    
    // End Global Variable
    
    
    $request = $_SERVER['REQUEST_URI'];
    $me = $project_location;

    try{
        switch ($request) {
            case $me.'/beranda' : require "view/beranda.php"; break;
            case $me.'/login_admin' : require "view/admin/login.php"; break;
            case $me.'/login_user' : require "view/users/login.php"; break;

            // Rizkan
            case $me.'/ktp' : require "view/ktp.php"; break;
            case $me.'/kk' : require "view/kk.php"; break;
            case $me.'/kk' : require "view/kk.php"; break;
            case $me.'/kelahiran' : require "view/kelahiran.php"; break;
            case $me.'/kematian' : require "view/kematian.php"; break;
            case $me.'/pindah' : require "view/pindah.php"; break;
            case $me.'/datang' : require "view/datang.php"; break;
            default: http_response_code(404); require "view/404.php" ; break;
        }
    }catch(\err){
        http_response_code(419);
    }
   