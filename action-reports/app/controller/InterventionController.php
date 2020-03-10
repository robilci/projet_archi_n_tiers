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
     *List of all the interventions (regardless to their state)
     */

    public function listAll(){
        $this->renderWithoutAuth('intervention.list');
    }

    /**
     * List of a specified intervention
     * @param $id
     */
    public function listOne($id)
    {
       // $this->render('intervention.archived');
    }

    /**
     *List of the last 10 interventions
     */

    public function listLastTen()
    {

        $this->renderWithoutAuth('authentication');
    }

    /**
     *List of the validated interventions
     */
    public function checked()
    {
        $this->render('intervention.checked');
    }


    /**
     *List of the interventions to be validated
     */
    public function toCheck()
    {
        $this->render('intervention.toCheck');
    }

    /**
     *List of interventions on going redaction
     */
    public function onGoing()
    {
        $this->render('intervention.onGoing');
    }

    /**
     *List of rejected(to be modified )interventions
     */
    public function rejected()
    {
        $this->render('intervention.rejected');
    }

    /**
     *The archive of the interventions
     */
    public function archived()
    {
        $this->render('intervention.archived');
    }

    public function create(){
        session_start();
        $this->render('intervention.create');
    }

    public function confirm(){
        $nbVehicle = $_POST["nbVehicle"];

        if(!isset($_POST["important"]))
            $_POST["important"] = 0;
        else
            $_POST["important"] = 1;

        if(!isset($_POST["opm"]))
            $_POST["opm"] = 0;
        else
            $_POST["opm"] = 1;

        echo $_POST["applicant"];
        echo $_POST["type"];
        echo $_POST["important"];
        echo $_POST["opm"];
        echo $_POST["interventionNumber"];
        echo $_POST["town"];
        echo $_POST["adress"];
        echo $_POST["beginDate"];
        echo $_POST["endDate"];
        echo " - responsable : ". $_POST["responsible"];
        
        for($i = 0; $i < $nbVehicle; $i++){
            $nbRoles = $_POST["roleNumber" + $i];
            for($y = 0; $y < $nbRoles; $y++){

            }
        }
    }



}
