<?php

/**
 * Class Database
 * @package project
 */
class Database
{
    /**
     * @var stores the connection to the PDO type database
     */
    private $db_name;
    private $db_user;
    private $db_pass;
    private $db_host;
    private $pdo;

    /**
     * Database constructor.
     */
    public function __construct($db_name, $db_user = 'root', $db_pass = 'root', $db_host = 'localhost')
    {
        $this->db_name = $db_name;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
        $this->db_host = $db_host;
    }

    private function getPDO(){
        $this->pdo = New PDO('mysql:dbname='.$this->db_name.';host='.$this->db_host, $this->db_user, $this->db_pass);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $this->pdo;
    }

    /**
     *
     */
    public function getLines(){
        $result = $this->db->query("SELECT * FROM interventions");
        $datas = $result->fetchAll(PDO::FETCH_OBJ);
        return $datas;
    }
}