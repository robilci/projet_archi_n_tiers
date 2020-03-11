<?php
namespace  App\Model;
use App\App;
use App\utils\database\Database;

class InterventionModel extends AppModel {

    /**
     *List of all the interventions (regardless to their state)
     */
    public function listAll(){

    }

    /**
     * List of a specified intervention
     * @param $id
     */
    public function listOne($id)
    {

    }

    public function createIntervention($number, $opm, $important, $beginDate, $endDate, $town, $adress, $typeID, $applicantId, $responsibleID, $comment, $vehicles, $roles){
        $sqlIntervention = 'INSERT INTO intervention (Numero, OPM, Important, Date_Debut, Date_Fin, Adresse, Type_ID, Requerant_ID, Responsable_ID, Commentaire, Etat)
                                VALUES ("'. $number .'", "'. $opm .'", "'. $important .'", "'. $beginDate .'", "'. $endDate .'", "'. $town. ' - '. $adress .'",
                                 "'. $typeID .'", "'. $applicantId .'", "'. $responsibleID .'", "'. $comment .'", "A valider")';
        Database::getPDO()->query($sqlIntervention);

        $sqlVehicles = "SELECT Intervention_ID FROM intervention ORDER BY Intervention_ID DESC LIMIT 1";
        $result = Database::getPDO()->query($sqlVehicles)->fetch();
        $idIntervention = $result["Intervention_ID"];

        $sqlVehicles = 'INSERT INTO intervention_vehicule (Vehicule_Code, Intervention_ID, Date_Depart, Date_Arrivee, Date_Retour)
                        VALUES';

    }

    public function getTypes(){
        $result = Database::getPDO()->query("SELECT * FROM type_intervention");
        return $result->fetchAll();
    }

    /**
     *List of the last 10 interventions
     */
    public function listLastTen()
    {

    }

    /**
     *List of the validated interventions
     */
    public function checked()
    {

    }

    /**
     *List of the interventions to be validated
     */
    public function toCheck()
    {

    }

    /**
     *List of interventions on going redaction
     */
    public function onGoing()
    {

    }

    /**
     *List of rejected(to be modified )interventions
     */
    public function rejected()
    {

    }

    /**
     *The archive of the interventions
     */
    public function archived()
    {

    }

}

?>