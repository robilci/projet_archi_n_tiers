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
		$email = "admin@mybrigade.org";
		$mdp = md5("1234");
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'api/pompier/authentification');
		curl_setopt($curl,CURLOPT_POSTFIELDS,"email=".$email."&mdp=".$mdp);
		
		
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($curl);

        var_dump($result);

        //$this->render('intervention.list', compact('result'));

        curl_close($curl);
    }
}