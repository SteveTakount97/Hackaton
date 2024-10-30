<?php

require_once "../bdd/database.php";

class publication{

    public string $id;
    public string $postId;
    public string $message;

    public $connection;
    public function __construct(){
        $this->connection = new Database();
    }

    public function createPost($message){
        $query = $this->connection->getConnection()->prepare(
            "INSERT INTO 'post'('id', 'message') VALUES(:postId, :message)"
        );
        $query-> bindParam(':postId', $postId);
        $query-> bindparam('message', $message);
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