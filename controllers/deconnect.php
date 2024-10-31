<?php

session_start();

class Deconnection{
    public function deco(){
        session_destroy();
        header('Location: ../views/accueil.php');
        exit;
    }
}

