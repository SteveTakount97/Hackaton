<?php

session_start();

require_once('./bdd/database.php');
require_once('./models/users.php');

class profil {
    private $user;

    public function edit() {
        if(empty($_POST['prenom']) || empty($_POST['pseudo']) || empty($_POST['password'] || empty($_POST['age']))){
            header('location: ../views/profil.html');
        }

        $password = htmlspecialchars($_POST['password']);
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $age = (int)$_POST['age'];
        $prenom = $_POST['prenom'];
        $id = $_SESSION['id'];

        if ($this->user->EditUser($prenom, $pseudo, $password, $age, $id)) {
            header('location: ../views/profil.html');
            exit;
        }
    }

}
?>