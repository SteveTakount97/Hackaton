<?php 

// je lie ma page avec la database
require_once "../bdd/Database.php";
// je crée ma class user qui définira
class User{
    public string $id;
    public string $pseudo;
    public string $password;
    public string $age;
    public string $prenom;
    

    public $connection;
    public function __construct(){
        $this->connection = new Database();
    }
    // Méthode pour enregistrer un nouvel utilisateur
     public function register($prenom, $age, $pseudo, $password) {

        $query = $this->connection->getConnection()->prepare(
            "INSERT INTO user (prenom, age, pseudo, 'password') VALUES ('?', '?', '?', '?')"
        );
        $query->execute([$prenom, $age, $pseudo, $password]);
       
        return $query;
    }

       
       //creation d'un nouvel user
    //    $user = new User();
    //    $user-> connection = new Database();
       
    //    // Exécuter la requête et retourner le résultat
    //    return $query->execute();


    public function userDetails($id){
        $query = $this->connection->getConnection()->prepare(
            "SELECT * FROM users WHERE id =?"
        );
        $query->execute([$id]);
        $resultat = $query->fetch();
        return $resultat;
    }

    public function UserConnect($user, $password){
        $query = $this->connection->getConnection()->prepare(
            "SELECT * FROM users WHERE pseudo =?"
        );
        $query->execute([$user]);
        $resultat = $query->fetch();

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

    public function EditUser($id, $prenom, $pseudo, $age, $password)
    {
        if(isset($_POST['prenom']))
        {
            $query = $this->connection->getConnection()->prepare("UPDATE user SET prenom = ? WHERE id = ?");
            $query->execute([$id, $prenom]);
        }
        if(isset($_POST['age']))
        {
            $query = $this->connection->getConnection()->prepare("UPDATE user SET age = ? WHERE id = ?");
            $query->execute([$id, $age]);
        }
        if(isset($_POST['password']))
        {
            $query = $this->connection->getConnection()->prepare("UPDATE user SET password = ? WHERE id = ?");
            $query->execute([$id, $password]);
        }
        if(isset($_POST['pseudo']))
        {
            $query = $this->connection->getConnection()->prepare("SELECT COUNT(*) FROM membres WHERE pseudo = ?");
            if($query != 0)
            {
                $query = $this->connection->getConnection()->prepare("UPDATE user SET pseudo = ? WHERE id = ?");
                $query->execute([$id, $pseudo]);
            }
            else
            {
                throw new \Exception(("Le nouveau pseudo est deja pris"));
            }
        }
    }
}

