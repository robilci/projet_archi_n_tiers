<?php

namespace App\controller;

use App\Model\InterventionModel;
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
    public function listOne()
    {
		$interventionModel= new InterventionModel();
		$result = $interventionModel->listOne();
		//var_dump($result->fetchAll());
	$this->render('intervention.list',["listIntervention" => $result->fetchAll()]);
    }

    /**
     *List of the last 10 interventions
     */

    public function lastTen()
    {
		$interventionModel= new InterventionModel();
		$result = $interventionModel->lastTen();
        $this->render('intervention.list',["listTen" => $result->fetchAll()]);

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

        if(!isset($_POST["important"]))
            $_POST["important"] = 0;
        else
            $_POST["important"] = 1;

        if(!isset($_POST["opm"]))
            $_POST["opm"] = 0;
        else
            $_POST["opm"] = 1;

        $vehicles[][] = null;
        $roles[][] = null;
        $nbVehicle = $_POST["nbVehicle"];

        for($i = 0; $i < $nbVehicle; $i++){
            $id = $i + 1;
            $vehicles[$i][0] = $_POST["vehicleName". $id];
            $vehicles[$i][1] = $_POST["vehicleDateDeparture". $id];
            $vehicles[$i][2] = $_POST["vehicleDateArrival". $id];
            $vehicles[$i][3] = $_POST["vehicleDateReturn". $id];
        }

        for($i = 0; $i < $nbVehicle; $i++){
            $id = $i + 1;
            $nbRoles = $_POST["roleNumber". $id];
            for($y = 0; $y < $nbRoles; $y++){
                $roles[$i][$y] = $_POST["vehicleRole". $id ."-". $y];
            }
        }

        var_dump($vehicles);
        var_dump($roles);

        $model = new InterventionModel();
        $model->createIntervention($_POST["interventionNumber"], $_POST["opm"], $_POST["important"], $_POST["beginDate"], $_POST["endDate"],
            $_POST["town"], $_POST["adress"], $_POST["type"], $_POST["applicant"], $_POST["responsible"], $_POST["comment"], $vehicles, $roles);
    }

}
