<?php

namespace App\controller;


use function MongoDB\BSON\toJSON;

use App\Model\AuthenticationModel;
use App\utils\database\Database;
use App\utils\router\Route;
use App\utils\session\Session;


/**
 * @package App\controller
 */

class AuthenticationController extends AppController
{

    /**
     * InterventionController constructor.
     */

    /**
     * @param $id - the id of the intervention
     */

  

    public function authentication(){
        if(!isset($_SESSION))
            session_start();
        if(!isset($_SESSION["exist"])) {
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, 'api/pompier/authentication');
            curl_setopt($curl, CURLOPT_POSTFIELDS, "email=" . htmlspecialchars($_POST["email"]) . "&pass=" . htmlspecialchars($_POST["pass"]));


            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            $result = curl_exec($curl);
            curl_close($curl);
            $json = json_decode($result, true);


            if (empty($json)) {
                $error = "Mauvais identifiant ou mot de passe";
                $this->renderWithoutAuth('authentication', compact('error'));
            } else {
				//var_dump($json);
				$_SESSION["id"] = $json["P_ID"];
                $_SESSION["email"] = $json["P_EMAIL"];
                $_SESSION["firstname"] = $json["P_PRENOM"];
                $_SESSION["lastname"] = $json["P_NOM"];
                $_SESSION["exist"] = true;

                $InterventionC = new InterventionController();
				$InterventionC->lastTen();
            }
        } else {
            $this->render('intervention.list');
        }
    }

    private function getRights(){
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'api/pompier/rights');
        curl_setopt($curl,CURLOPT_POSTFIELDS,"email=".htmlspecialchars($_SESSION["email"]));
        $result = curl_exec($curl);
        curl_close($curl);
        $_SESSION["rights"] = json_decode($result, true);
    }

}


