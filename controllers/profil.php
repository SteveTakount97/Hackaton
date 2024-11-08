<?php


require_once '../models/users.php';
require_once '../models/post.php';
require_once '../views/accueil.php';
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
    public function createPostControllers(){
        $id_message = htmlspecialchars($_SESSION['id']);
        if(!empty(htmlspecialchars($_POST['publication']))){
            $message = $_POST['publication'];
            echo 'bonjour';
            $publication = new Publication();
            $publication -> connection = new Database();
            $publication -> createPost($message, $id_message);
            header('Location: ../views/accueil.php');
            exit;
        }
        else{
            throw new \Exception('Votre publication ne peut pas être publiée, veuillez la vérifier');
        }
    }
    public function allPostControllers()
    {
        $publication = new Publication();
        return $publication -> allPost();
    }

}
$profil = new profil();
if(isset($_GET["action"]) && $_GET["action"] === "submitMessage"){
    $profil -> createPostControllers();
}
    
    $resultats = $profil -> allPostControllers();
