<?php

session_start();

require_once '../models/users.php';

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
    public function createPost(){
        $id_message = htmlspecialchars($_SESSION['id']);
        if(!empty(htmlspecialchars($_POST['publication']))){
            $message = $_POST['publication'];

            $publication = new publication();
            $publication -> connection = new Database();
            $publication -> createPost($message, $id_message);
            header('Location: accueil.php?action=accueil');
            exit;
        }
        else{
            throw new \Exception('Votre publication ne peut pas être publiée, veuillez la vérifier');
        }
    }

}

$profil = new profil();

if($_GET["action"] && $_GET["action"] === "")
{
    if($_GET['action'] === "edit")
    {
        (new profil()) -> edit();
    }
    elseif($_GET['action'] === "submitMessage")
    {
        (new profil()) -> createPost();
    } 
}

