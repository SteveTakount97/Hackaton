<?php

class deconnection{
    public function deco(){
        session_destroy();
        header('Location: index.php');
        exit;
    }
}