<?php


namespace App\Model;


use App\utils\database\Database;

class VehicleModel extends AppModel
{

    public function getVehicles(){
        $result = Database::getPDO()->query("SELECT * FROM vehicule");
        $result = $result->fetchAll();
        $result = $this->convert_from_latin1_to_utf8_recursively($result);
        $json = json_encode($result, JSON_UNESCAPED_UNICODE);
        echo $json;
    }

    public function getVehiclesRoles(){
        $result = Database::getPDO()->query('SELECT * FROM vehicule_role WHERE Vehicule_Code = "'. $_POST["name"]. '"');
        $result = $result->fetchAll();
        $result = $this->convert_from_latin1_to_utf8_recursively($result);
        $json = json_encode($result, JSON_UNESCAPED_UNICODE);
        echo $json;
    }
}