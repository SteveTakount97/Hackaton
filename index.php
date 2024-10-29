<?php 

session_start();

$request = $_SERVER["REQUEST_URI"];

if(preg_match("/(\/)([?]+[A-z]*|$)/",$request)){
    require __DIR__ . "/controllers/connect.php";
}
elseif(preg_match("/(\/)([?]+[A-z]*|$)/", $request)){
    require __DIR__ . "/controllers/deconnect.php";
}
