<?php

namespace App\controller;

use App\Model\AuthentificationModel;
use App\utils\database\Database;
use App\utils\router\Route;


/**
 * @package App\controller
 */
class AuthentificationController extends AppController
{

    /**
     * InterventionController constructor.
     */

    /**
     * @param $id - the id of the intervention
     */


    public function authentification()
    {
        /*$email = "admin@mybrigade.org";
        $mdp = md5("1234");
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'api/pompier/authentification');
        curl_setopt($curl,CURLOPT_POSTFIELDS,"email=".$email."&mdp=".$mdp);


        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($curl);

        var_dump($result);*/

        //$this->render('intervention.list', compact('result'));

        //  curl_close($curl);

        $prenom = $_POST['login'];
        $m = new AuthentificationModel();
        $data = $m->authentification($prenom);
        if (count($data) > 0) {
            $_SESSION['Auth'] = $data[0];
            $this->render('home');
        } else
            echo 'not found';
    }
    /**
     * Specify the range of rights
     * @param $rang the rights range
     * @return bool
     */
    public function allow($rang)
    {
        $m = new AuthentificationModel();
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
    public function logOut()
    {
        session_destroy();
        $this->render('authentication');
     /* echo '
      <a href="/">Se connecter</a>
      
      ';*/
    }
}

