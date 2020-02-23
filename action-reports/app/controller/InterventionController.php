<?php

namespace App\controller;

use App\utils\database\Database;

/**
 * Class InterventionController
 * @package App\controller
 */
class InterventionController extends AppController {

    /**
     * InterventionController constructor.
     */

    /**
     * @param $id - the id of the intervention
     */
    public function getIntervention($id){
       var_dump(Database::getPDO());
        echo "intervention numéro ".$id;
    }

    public function interventionsList(){

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'api/pompier');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($curl);

        var_dump($result);

        $this->render('intervention.list', compact('result'));

        curl_close($curl);
    }

    public function auth(){
        echo $_POST["email"];
    }

}
