<?php

session_start();

class Deconnection{
    public function deco(){
        session_destroy();
        header('Location: ../views/acceuil.php');
        exit;
    }
}

$deconnect = new Deconnection();

if($_GET["action"] && $_GET["action"] === "deconnect"){
    $deconnect->deco(); 
}