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

    public function createPost($id_message, $message){
        $query = $this->connection->getConnection()->prepare(
            "INSERT INTO post (message, id_message) VALUES(:message, :id_message)"
        );
        $query-> bindParam(':id_message', $id_message);
        $query-> bindParam(':message', $message);
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