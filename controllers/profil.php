<?php

require_once('./bdd/database.php');
require_once('./models/users.php');

class profil {
    private $user;

    public function execute() {
        if(empty($_POST['prenom']) || empty($_POST['pseudo']) || empty($_POST['password'] || empty($_POST['age']))){
            header('location: ../views/profil.html');
        }
        $password = htmlspecialchars($_POST['password']);
        $email = filter_var($_POST['pseudo']);
        $age = $_POST['age'];
        $prenom = $_POST['prenom'];

        if ($this->user->EditUser($prenom, $email, $password, $age)) {
            header('location: ../views/profil.html');
        } else {
            return "Erreur lors de l'inscription.";
        }
    }

}
?>