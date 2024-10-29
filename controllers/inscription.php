<?php
// cette ligne structure le code et aide à maintenir une organisation claire dans les dossiers et fichiers
namespace Application\Controllers\connect;

// j'inclus les fichiers database et le model users afin de lier mes pages
require_once("./bdd/database.php");
require_once("./models/users.php");

class Inscription {
    private $db;

    // Constructeur qui initialise la connexion à la base de données
    public function __construct($db) {
        $this->db = $db;
    }

    // Méthode pour enregistrer un utilisateur
    public function register($email, $password) {
        // Créer une nouvelle instance de la classe User
        $user = new User($this->db);
        
        // Assigner les valeurs reçues aux propriétés de l'utilisateur
        $user->email = $email;
        $user->password = $password;

        // Tenter de s'inscrire
        if ($user->register()) {
            return "Inscription réussie !";
        } else {
            return "Erreur lors de l'inscription.";
        }
    }
}

?>