<?php

class Deconnection{
    public function deco(){
        session_destroy();
        header('Location: ../views/acceuil.html');
        exit;
    }
}

if($_GET["action"] && $_GET["action"] === "deconnect"){
    $connect->Deconnection(); 
}