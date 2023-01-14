<?php
    
    $base_url = "http://localhost";
    $project_location = "/kelurahanMargasari/index.php";

    // Global Variable
    $vars = explode("/",$_SERVER['REQUEST_URI']);
    $main_url = $base_url."/".$vars[1]."/";    
    // End Global Variable
    
    
    $request = $_SERVER['REQUEST_URI'];
    $me = $project_location;

    try{
        switch ($request) {
            case $me.'/beranda' : require "view/beranda.php"; break;
            default: http_response_code(404); echo "404"; break;
        }
    }catch(\err){
        http_response_code(419);
    }
   