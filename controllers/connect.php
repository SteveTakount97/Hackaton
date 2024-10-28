<?php
// cette ligne structure le code et aide à maintenir une organisation claire dans les dossiers et fichiers
namespace Application\Controllers\connect;

// j'inclus les fichiers database et le model users afin de lier mes pages
require_once("./bdd/database.php");
require_once("./models/users.php");

// use = importer et de simplifier l'utilisation de getDatabase dans le code
use Application\bdd\database\getDatabase;
use Application\models\userPost;

// en namespace nous utilisons les "class" pour utiliser notre structure d'objet plus facilement dans les autres fichiers(pages)/dossiers
class Connect{
    // je crée une fonction en public 
    public function execute(){
        // dans le cas ou le champ user est vide -> je met les caractères spéciaux en html 
        // et je précise que si le champ "user" est vide : un message précisant à l'utilisateur de remplir ce champ
        if(empty(htmlspecialchars($_POST['user']))){
            // affichage du message d'erreur dans le cas ou le champ reste vide 
            throw new \Exception("Veuillez saisir votre email");
        }
        else{
            // dans le cas ou le champ n'est pas vide alors nous prenons l'user
            // filter_var = pour filtrer une variable pour nettoyer les données
            $email = filter_var($_POST['user']);
        }
        // même cas de sécurité que pour l'user -> le mot de passe ne doit pas être vide 
        // sinon affichage du message d'erreur
        if(empty(htmlspecialchars($_POST['password']))){
            throw new \Exception("Veuillez saisir le mot de passe");
        }
        else{
            $password = htmlspecialchars($_POST['password']);
        }
        // Cela crée une nouvelle instance de la classe userPost
        $userPost = new userPost();
        // connexion pour l'objet $userPost permettant d'interagir avec la base de données pour effectuer des opérations
        $userPost -> connection = new getDataBase();
        // on utilise la méthode userConnect en passant les variables $user et password pour la connexion 
        $userPost -> user userConnect($user, $password);

        // inclusion du fichier connect.php qui est dans le dossier views
        header("Location: index.php?action=?");
    }
    // utilisé pour charger des vues ou des composants
    public function page(){
        require_once('./views/connect.php');
    }
}