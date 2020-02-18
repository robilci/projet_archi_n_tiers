<?php

require_once(dirname(__DIR__)."/database/Database.php");

class Synchronization
{
    private $actionReportConn;
    private $settings = [];
    private $db_user;
    private $db_pass;
    private $db_host;
    private $db_name;
    private $db_port;

    public function __construct()
    {
        $this->settings = require('config.php');
        $this->db_user = $this->settings['db_user'];
        $this->db_pass = $this->settings['db_pass'];
        $this->db_host = $this->settings['db_host'];
        $this->db_name = $this->settings['db_name'];
        $this->db_port = $this->settings['db_port'];

        try {
            $this->actionReportConn = new PDO('mysql:host='. $this->db_host .';port='. $this->db_port .';dbname='. $this->db_name, $this->db_user, $this->db_pass);
            $this->actionReportConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e){
            print_r($e->getMessage());
        }
    }

    public function getRights(){

        $sql = "SELECT F_ID, F_LIBELLE FROM fonctionnalite";
        $result = Database::getPDO()->query($sql);
        $sql = "INSERT INTO droit (droit_Id, Droit_Description) VALUES ";
        $results = $result->fetchAll();

        $valueLine = ' ("'. $results[0]['F_ID'] .'", "'. $results[0]["F_LIBELLE"]. '")';
        for($i = 1; $i < sizeof($results); $i++){
            $sql = $sql . $valueLine . ",";
            $valueLine = ' ("'. $results[$i]['F_ID'] .'", "'. $results[$i]["F_LIBELLE"]. '")';
        }
        $sql = $sql . $valueLine . ";";
        $sql = mb_convert_encoding($sql, "UTF-8", "latin1");
        $this->actionReportConn->query($sql);
    }
}