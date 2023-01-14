<?php
    
    $project_location = "/kelurahan/index.php";
    
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
   