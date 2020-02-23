<?php

namespace App\controller;

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

        var_dump($result);
		$json = json_decode($result, true);
		var_dump($json);
		if(empty($json))
		{
			echo "c'est nul";
		}
		//$this->render('intervention.list', compact('result'));

        curl_close($curl);
    }
}