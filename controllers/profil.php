<?php

session_start();

require_once './models/users.php';

class profil {

    public function edit() {

        if(empty($_POST['prenom']) || empty($_POST['pseudo']) || empty($_POST['password'] || empty($_POST['age']))){
            header('Location: ../views/profil.html');
        }
        else
        {
            $password = htmlspecialchars($_POST['password']);
            $pseudo = htmlspecialchars($_POST['pseudo']);
            $age = (int)$_POST['age'];
            $prenom = $_POST['prenom'];
            $id = $_SESSION['id'];
    
            // $userModel = new User();
            // $resultat = $userModel->EditUser($id, $prenom, $pseudo, $age, $password);

            header('Location: ../views/profil.html');
        }
    }

}

$profil = new profil();

if($_GET["action"] && $_GET["action"] === "profil"){
    $profil->edit(); 
}

?>