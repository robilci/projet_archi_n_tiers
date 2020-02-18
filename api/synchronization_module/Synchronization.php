<?php

require_once(dirname(__DIR__) . "/database/Database.php");
require_once("exception/EmptyArrayKeyException.php");
require_once("exception/NoTableSpecifiedException.php");
require_once("exception/NullSelectionException.php");

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
            $this->actionReportConn = new PDO('mysql:host=' . $this->db_host . ';port=' . $this->db_port . ';dbname=' . $this->db_name, $this->db_user, $this->db_pass);
            $this->actionReportConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            print_r($e->getMessage());
        }
    }

    public function getRights()
    {
        $this->copyInsert("fonctionnalite", "droit", ["F_ID", "F_LIBELLE"], ["Droit_ID, Description"]);
    }

    private function copyInsert($sourceTable, $destinationTable, $sourceKeys, $destinationKeys)
    {
        $sourceKeysSize = sizeof($sourceKeys);
        $destKeysSize = sizeof($destinationKeys);
        if ($sourceKeysSize < 1 || $destKeysSize < 1)
            throw new EmptyArrayKeyException('No key specified in source or destination keys array');

        if ($sourceTable == "" || $destinationTable == "")
            throw new NoTableSpecifiedException('No destination or source table specified');

        $sql ='SELECT ' . $sourceKeys[0];
        for ($i = 1; $i < $sourceKeysSize; $i++) {
            $sql = $sql . ',' . $sourceKeys[$i];
        }
        $sql = $sql . ' FROM ' . $sourceTable;
        $result = Database::getPDO()->query($sql);
        $results = $result->fetchAll();

        if (sizeof($results) < 1)
            throw new NullSelectionException("Result of the request is null, no data to copy");

        $sql = 'INSERT INTO ' . $destinationTable . ' (' . $destinationKeys[0];
        for ($i = 1; $i < $destKeysSize; $i++) {
            $sql = $sql . ',';
        }
        $sql = $sql. ') VALUES ';

        for($i = 0; $i < sizeof($results); $i++){
            $sql = $sql. '(';
            for($y = 0; $y < $sourceKeysSize; $y++){
                $sql = $sql.'"'. $results[$i][$sourceKeys[$y]]. '"';

                if(!($y == $sourceKeysSize - 1))
                    $sql = $sql. ', ';
            }
            $sql = $sql. ')';

            if($i == sizeof($results) - 1)
                $sql = $sql. ';';
            else
                $sql = $sql. ', ';
        }

        $this->actionReportConn->query($sql);

        /*for ($i = 1; $i < sizeof($results); $i++) {
            $sql = $sql . $valueLine . ",";
            $valueLine = ' ("' . $results[$i]['F_ID'] . '", "' . $results[$i]["F_LIBELLE"] . '")';
        }

        /*$valueLine = ' ("' . $results[0]['F_ID'] . '", "' . $results[0]["F_LIBELLE"] . '")';
        for ($i = 1; $i < sizeof($results); $i++) {
            $sql = $sql . $valueLine . ",";
            $valueLine = ' ("' . $results[$i]['F_ID'] . '", "' . $results[$i]["F_LIBELLE"] . '")';
        }
        $sql = $sql . $valueLine . ";";
        $sql = mb_convert_encoding($sql, "UTF-8", "latin1");
        $this->actionReportConn->query($sql);*/

    }
}