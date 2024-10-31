<?php

require_once "../bdd/database.php";

class publication{

    public string $id;
    public string $id_message;
    public string $message;

    public $connection;
    public function __construct(){
        $this->connection = new Database();
    }

    public function createPost($message){
        $query = $this->connection->getConnection()->prepare(
            "INSERT INTO 'post'('id_message', 'message') VALUES(:id_message, :message)"
        );
        $query-> bindParam(':id_message', $id_message);
        $query-> bindparam(':message', $message);
        $query->execute();
    }

    public function allPost(){
        $resultat = $this->connection->getConnection()->prepare(
            "SELECT * FROM post"
        );
        $resultat->execute();
        return $resultat->fetchAll(\PDO::FETCH_ASSOC);
    }
}