<?php

require_once('./bdd/database.php');
require_once('./models/users.php');

class Inscription {
    
    private $user;

    public function execute() {
        // Vérification si le formulaire a été soumis
        if (isset($_POST['submit'])) {
            // Validation des données du formulaire
            if (empty($_POST['prenom']) || empty($_POST['pseudo']) || empty($_POST['password']) || empty($_POST['age'])) {
                throw new \Exception('Veuillez remplir tous les champs');
            }

            // Recup et Stockage des valeurs 
            $password = htmlspecialchars($_POST['password']);
            $pseudo = ($_POST['pseudo']);
            $age = $_POST['age'];
            $prenom = $_POST['prenom'];

            // Tentative d'inscription
            if ($this->user->register($prenom, $pseudo, $password, $age)) {
                // Redirection à la page d'accueil
                header('Location: ../views/acceuil.html');
                exit; // Ne pas oublier d'appeler exit() après la redirection
            } else {
                return "Erreur lors de l'inscription.";
            }
        }
    }
}
?>
