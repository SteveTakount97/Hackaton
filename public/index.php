<?php
session_start();

require_once '../controllers/connect.php';
require_once '../controllers/deconnect.php';
require_once '../controllers/inscription.php';
require_once '../controllers/profil.php';

$profil = new profil();
$connect = new Connect();
$deconnect = new Deconnection();
$inscription = new Inscription();

if($_GET["action"] && $_GET["action"] === "submitMessage"){
    $profil -> createPostControllers();
}
elseif($_GET["action"] && $_GET["action"] === "connect"){
    $connect -> connection();
}
elseif($_GET["action"] && $_GET["action"] === "deconnect"){
    $deconnect -> deco();
}elseif($_GET["action"] && $_GET["action"] === "inscription"){
    $inscription -> execute();
}