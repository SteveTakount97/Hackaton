<?php

require_once("config.php");
class Database
{
    private $pdo;

    public function __construct()
    {
        try
        {
            $dsn = "mysql:host=" . DB_HOST . ";port=" . DB_PORT . ";dbname=" . DB_NAME;
            $this->pdo = new PDO($dsn, DB_USER, DB_PASS);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this;

        }catch (\PDOException $e)
        {
            die("Erreur de connection:" . $e->getMessage());
        }
    }
    public function getConnection()
    {
        return $this->pdo;
    }
    
}