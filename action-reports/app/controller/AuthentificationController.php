<?php

namespace App\controller;

use function MongoDB\BSON\toJSON;

/**
 * @package App\controller
 */
class AuthentificationController extends AppController {

    /**
     * InterventionController constructor.
     */

    /**
     * @param $id - the id of the intervention
     */
  

    public function authentification(){
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'api/pompier/authentification');
		curl_setopt($curl,CURLOPT_POSTFIELDS,"email=".htmlspecialchars($_POST["email"])."&pass=".htmlspecialchars($_POST["pass"]));
		
		
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($curl);
        curl_close($curl);
        $json = json_decode($result, true);

		if(empty($json)){
		    $error = "Mauvais identifiant ou mot de passe";
            $this->render('authentication', compact('error'));
        }
    }
}