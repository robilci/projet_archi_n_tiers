<?php


class PompierController
{
    public function getPompier(){
        $query = "SELECT P_PRENOM, P_NOM, P_EMAIL FROM pompier";
        $result = Database::getPDO()->query($query);
        $json = json_encode($result->fetchAll());
        echo $json;
    }
}