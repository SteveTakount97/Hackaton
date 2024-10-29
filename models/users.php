<?php 

// je lie ma page avec la database
require_once("bdd/Database.php");
require_once("controllers/connect.php");

// je crée ma class user qui définira
class User{
    public string $id;
    public string $pseudo;
    public string $password;
    public string $age;
    public string $prenom;
    
    public $connection;
    // Méthode pour enregistrer un nouvel utilisateur
     public function register() {
        $query = "INSERT INTO " . $this->user . " (pseudo, password, age, prenom) VALUES (:pseudo, :password, :age,:prenom)";
        $stmt = $this->connection->prepare($query);

       // Liaison des paramètres avec les propriétés de l'objet
       $stmt->bindParam(":prenom", $this->prenom);
       $stmt->bindParam(":age", $this->age);
       $stmt->bindParam(":pseudo", $this->pseudo);
       $stmt->bindParam(":password", $this->password);
       
       //creation d'un nouvel user
       $user = new user();
       $user-> connection = new Database();
       
       // Exécuter la requête et retourner le résultat
       return $stmt->execute();
   }
}
class UserPost{

    public $connection;
    public function __construct(){
        $this->connection = new Database();
    }

    public function userDetails($id){
        $query = $this->connection->getConnection()->prepare(
            "SELECT * FROM users WHERE id =?"
        );
        $query -> connection([$id]);
        $resultat = $query->fetch();
        return $resultat;
    }

    public function UserConnect($user, $password){
        $query = $this->connection->getConnection()->prepare(
            "SELECT * FROM users WHERE pseudo =?"
        );
        $query -> connection([$user]);
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
                $query ="Le nouveau pseudo est deja pris";
            }
        }
    }
}
