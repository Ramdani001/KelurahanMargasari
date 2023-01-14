<?php
    
    $project_location = "/kelurahan/index.php";
    
    $request = $_SERVER['REQUEST_URI'];
    $me = $project_location;

    try{
        switch ($request) {
            case $me.'/beranda' : require "view/beranda.php"; break;
            case $me.'/ktp' : require "view/ktp.php"; break;
            case $me.'/kk' : require "view/kk.php"; break;
            case $me.'/kk' : require "view/kk.php"; break;
            case $me.'/kematian' : require "view/kematian.php"; break;
            case $me.'/pindah' : require "view/pindah.php"; break;
            case $me.'/datang' : require "view/datang.php"; break;
            default: http_response_code(404); echo "404"; break;
        }
    }catch(\err){
        http_response_code(419);
    }
   