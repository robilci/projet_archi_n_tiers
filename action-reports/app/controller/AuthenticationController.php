<?php

namespace App\controller;


use function MongoDB\BSON\toJSON;

use App\Model\AuthenticationModel;
use App\utils\database\Database;
use App\utils\router\Route;


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
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'api/pompier/authentication');
		curl_setopt($curl,CURLOPT_POSTFIELDS,"email=".htmlspecialchars($_POST["email"])."&pass=".htmlspecialchars($_POST["pass"]));
		
		
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($curl);
        curl_close($curl);
        $json = json_decode($result, true);

		if(empty($json)){
		    $error = "Mauvais identifiant ou mot de passe";
            $this->render('authentication', compact('error'));
        } else {
		    $_SESSION["email"] = $json["P_EMAIL"];
            $_SESSION["firstname"] = $json["P_PRENOM"];
            $_SESSION["lastname"] = $json["P_NOM"];
            $this->getRights();
            $this->render("intervention.list");
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
//pour tester la gestion des droits
    public function authenticationDounya()
    {
        /*$email = "admin@mybrigade.org";
        $mdp = md5("1234");
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'api/pompier/authentication');
        curl_setopt($curl,CURLOPT_POSTFIELDS,"email=".$email."&mdp=".$mdp);


        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($curl);

        var_dump($result);*/

        //$this->render('intervention.list', compact('result'));

        //  curl_close($curl);

        $prenom = $_POST['login'];
        $m = new AuthenticationModel();
        $data = $m->authentication($prenom);
        if (count($data) > 0) {
            $_SESSION['Auth'] = $data[0];
            $this->render('home');
        } else
            echo 'not found';
    }
    /**
     * Specify the range of rights
     * @param $rang - the rights range
     * @return bool
     */
    public function allow($rang)
    {
        $m = new AuthenticationModel();
        $data = $m->roles();
        $roles = array();
        //recover all rights
        foreach ($data as $d) {
            $roles[$d['Droit_ID']] = $d['Description'];
        }
        foreach ($rang as $r) {
            if ($_SESSION['Auth']['Description'] == $r)
                return true;
        }
        $this->render('forbidden.forbidden');

    }
    //recuperer une information(champ) de l'utilisateur

    /**
     * Returns a specific information about a connected user
     * @param $field a pecific user's information
     * @return bool
     */
    public function user($field)
    {
        //alias
        if ($field == 'role') $field = 'Description';
        //
        if (isset($_SESSION['Auth'][$field]))
            return $_SESSION['Auth'][$field];
        else
            return false;
    }



    /**
     *Login out
     */
    public function logout()
    {
        $this->render('authentication');
    }
}


