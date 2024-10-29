<?php

require_once('./bdd/database.php');
require_once('./models/users.php');

class Inscription {
    private $user;

    public function execute() {
        // Validation des données du formulaire
        if (empty($_POST['prenom']) || empty($_POST['email']) || empty($_POST['password'] || empty($_POST['age'])) {
            throw new \Exception('Veuillez remplir tous les champs');
        }
        //stockage des valeurs 
        $password = htmlspecialchars($_POST['password']);
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $age = $_POST['age'];
        $prenom = $_POST['prenom'];

        // Tentative d'inscription
        if ($this->user->register($prenom, $email, $password, $age)) {
            return "Inscription réussie !";
        } else {
            return "Erreur lors de l'inscription.";
        }
    }

}
?>
