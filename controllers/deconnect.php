<?php

session_start();

class Deconnection{
    public function deco(){
        session_destroy();
        header('Location: ../views/accueil.php');
        exit;
    }
}
$deconnect = new Deconnection();
if($_GET["action"] && $_GET["action"] === "deconnect"){
    $deconnect -> deco();
}