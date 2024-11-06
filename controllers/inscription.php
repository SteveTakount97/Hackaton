<?php

session_start();

require_once '../models/users.php';

class Inscription {
    
    private $user;
    
    public function __construct(){
        $this->user = new User();
    }
    public function execute() {
        // Vérification si le formulaire a été soumis
            // Validation des données du formulaire
            if (empty($_POST['prenom']) || empty($_POST['age']) || empty($_POST['pseudo']) || empty($_POST['password'])) {
                throw new \Exception('Veuillez remplir tous les champs');
            }

            // Recup et Stockage des valeurs 
            $password = htmlspecialchars($_POST['password']);
            $pseudo = ($_POST['pseudo']);
            $age = $_POST['age'];
            $prenom = $_POST['prenom'];

            // Tentative d'inscription
            if ($this->user->register($prenom, $age, $pseudo, $password)) {
                //message si connexion reussi
                echo 'Votre inscription a bien été pris en compte';
                // Redirection à la page d'accueil
                header('Refresh: 2; URL=../views/accueil.php');
                exit; // Ne pas oublier d'appeler exit() après la redirection
            } else {
                return "Erreur lors de l'inscription.";
            }
    }
}
$inscription = new Inscription();
if($_GET["action"] && $_GET["action"] === "inscription"){
    $inscription -> execute();
}