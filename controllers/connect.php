<?php

session_start();

// j'inclus les fichiers database et le model users afin de lier mes pages
require_once "../models/users.php";

// en namespace nous utilisons les "class" pour utiliser notre structure d'objet plus facilement dans les autres fichiers(pages)/dossiers
class Connect{
    // je crée une fonction en public 
    public function connection(){
        // dans le cas ou le champ user est vide -> je met les caractères spéciaux en html 
        // et je précise que si le champ "user" est vide : un message précisant à l'utilisateur de remplir ce champ
        if(empty(htmlspecialchars($_POST['pseudo']))){
            // affichage du message d'erreur dans le cas ou le champ reste vide 
            throw new \Exception("Veuillez entrer un nom d'utilisateur valide");
        }
        else{
            // dans le cas ou le champ n'est pas vide alors nous prenons l'user
            // filter_var = pour filtrer une variable pour nettoyer les données
            $pseudo = htmlspecialchars($_POST['pseudo']);
        }
        // même cas de sécurité que pour l'user -> le mot de passe ne doit pas être vide 
        // sinon affichage du message d'erreur
        if(empty(htmlspecialchars($_POST['password']))){
            throw new \Exception("Veuillez saisir le mot de passe");
        }
        $password = htmlspecialchars($_POST['password']);

        $userModel = new User();
        $resultat = $userModel->userConnect($pseudo, $password);
        $_SESSION['connect'] = 1;
        $_SESSION['pseudo'] = $resultat['pseudo'];
        $_SESSION['id'] = $resultat['id'];
        header('Location: ../views/accueil.php');
        exit;
        }
}

$connect = new Connect();

if($_GET["action"] && $_GET["action"] === "connect"){
    $connect->connection(); 
}