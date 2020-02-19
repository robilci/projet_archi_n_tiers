<?php

namespace App\Model;
use App\utils\database\Database;

class IndexModel{
    private $connection;
    public function __construct()
    {
        $this->connection=new Database();
    }

    public function Auth($prenom)
    {
        try {
            $sql = "SELECT * FROM employee WHERE Prenom='$prenom'";
            $stmt= $this->pdo->getPDO()->prepare($sql);
            $stmt->execute();
            $resultat = $stmt->fetchAll();
            if(count($resultat)>0)
                echo 'exist';
            else
                echo 'not found';

        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }

}