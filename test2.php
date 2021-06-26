<?php


function Yonlendir($url,$zaman = 0){
    if($zaman != 0){
    header("Refresh: $zaman; url=$url");
    }
    else header("Location: $url");
    }


session_unset();
session_destroy();
Yonlendir("index.html",0);

 ?>
