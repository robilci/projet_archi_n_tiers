<?php


namespace App\Model;


use App\utils\database\Database;

class FirefighterModel extends AppModel
{
    public function getFirefighters(){
        $result = Database::getPDO()->query("SELECT * FROM pompier");
        $result = $result->fetchAll();
        $result = $this->convert_from_latin1_to_utf8_recursively($result);
        $json = json_encode($result, JSON_UNESCAPED_UNICODE);
        echo $json;
    }
}