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

    public function view($id)
    {
        echo "Parametre id = ".$id; // Voila Dounya ! contente ?
        $interventionModel = new InterventionModel();
        $responsable = $interventionModel->I_esponsable($id);
        $vehicules = $interventionModel->I_vehicles($id);
        $requerant = $interventionModel->I_requerant($id);
        $pompiers = $interventionModel->I_pompiers($id);
        $otherInfos=$interventionModel->I_otherInfos($id);

        $this->render('intervention.single', ["responsable" => $responsable->fetch(\PDO::FETCH_OBJ), "listVehicles" => $vehicules->fetchAll(), "requerant" => $requerant->fetch(\PDO::FETCH_OBJ), "listPompiers" => $pompiers->fetchAll(), "otherInfos" => $otherInfos->fetch(\PDO::FETCH_OBJ)]);
    }

    public function liste()
    {
        $interventionModel = new InterventionModel();
        $result = $interventionModel->liste();
        //var_dump($result->fetchAll());
        $this->render('intervention.list', ["listIntervention" => $result->fetchAll()]);
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

    public function export(){
        $interventions = null;
        $model = new InterventionModel();
        if(!isset($_SESSION))
            session_start();

        if(isset($_SESSION["id"])) {
            $interventions = $model->getInterventions($_SESSION["id"]);

            $message = null;

            if ($this->export_data_to_csv($interventions)) {
                $message = "Fichier csv crée avec succès !";
            } else {
                $message = "Erreur dans l'exportation d'interventions !";
            }

            $result = $model->lastTen();
            $this->render('intervention.list', ["listTen" => $result->fetchAll(), "message" => $message, "intervention" => true]);
        }
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
        $model = new InterventionModel();
        $types = $model->getTypes();
        $types = $this->convert_from_latin1_to_utf8_recursively($types);
        $this->render('intervention.create', ["types" => $types]);
    }

    public function confirm(){
        session_start();

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
        $firefighters[][] = null;
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

        for($i = 0; $i < $nbVehicle; $i++){
            $id = $i + 1;
            $nbRoles = $_POST["roleNumber". $id];
            for($y = 0; $y < $nbRoles; $y++){
                $firefighters[$i][$y] = $_POST["vehicleRoleFireFighter". $id ."-". $y];
            }
        }

        $model = new InterventionModel();
        $model->createIntervention($_POST["interventionNumber"], $_POST["opm"], $_POST["important"], $_POST["beginDate"], $_POST["endDate"],
            $_POST["town"], $_POST["adress"], $_POST["type"], $_POST["applicant"], $_POST["responsible"],  mb_convert_encoding($_POST["comment"], "latin1", "UTF-8"), $vehicles, $roles, $firefighters);

        $interventionModel= new InterventionModel();
        $result = $interventionModel->lastTen();
        $this->render('intervention.list',["listTen" => $result->fetchAll(), "intervention" => true]);
    }

    private function export_data_to_csv($data, $filename='export.csv', $delimiter = ';', $enclosure = '"') {
        $result = true;
        try {
            $fp = fopen($filename, 'w');
            fputs($fp, $bom = (chr(0xEF) . chr(0xBB) . chr(0xBF)));
            fputcsv($fp, array_keys($data[0]), $delimiter, $enclosure);
            foreach ($data as $fields) {
                fputcsv($fp, $fields, $delimiter, $enclosure);
            }
            fclose($fp);
        } catch (\Exception $e){
            print_r($e);
            $result = false;
        }
        return $result;
    }

}
