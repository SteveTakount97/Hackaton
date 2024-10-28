<?php

// on définit un espace de noms (namespace)
namespace Application\models\users;

// je lie ma page avec la database
require_once("bdd/database.php");

// use = importer et de simplifier l'utilisation de getDatabase dans le code
use Application\bdd\database\getDataBase;

// je crée ma class user qui définira
class User{
    public string $id;
    public string $user;
    public string $password;
}
class UserPost{
    public function userDetails($id){
        $query = $this -> connection -> getDataBase() -> prepare(
            "SELECT $ FROM users WHERE id =?"
        );
        $query -> execute([$id]);
        $resultat = $query -> fetch();
        return $resultat;
    }

    public function UserConnect($user, $password){
        $query = $this -> connection -> getDataBase() -> prepare(
            "SELECT * FROM users WHERE pseudo =?"
        );
        $query -> execute([$user]);
        $resultat = $query -> fetch();

        if($query -> rowCount() == 0){
            throw new \Exception("L'utilisateur n'existe pas, veuillez vérifier vos données ou créer un compte");
        }
        else{
            if(password_verify($password, $resultat['password'])){
                session_start();
                $_SESSION['connecte'] = 1;
                $_SESSION['user'] = $resultat['user'];
                $_SESSION['id'] = $resultat['id'];
                header("Location: index.php?action=account");
                exit;
            }
            else{
                throw new \Exception(("Le mot de passe n'est pas valide"));
            }
        }
    }
    public function EditProfil($id, $password, $prenom, $age, $pseudo)
    {
        $query = $this->connexion->getDataBase() ->prepare("UPDATE user SET name = ?, age = ?, pseudo = ?, password = ? WHERE id = ?");
        $query->execute([$id, $password, $prenom, $age, $pseudo]);
    }
}

