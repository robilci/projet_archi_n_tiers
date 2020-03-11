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
    public function listOne()
    {
		if(!isset($_SESSION))
		{
			session_start();
		}
		 $query = "SELECT Numero, Date_Debut, Date_Fin, Adresse, pompier.Nom,pompier.Prenom, Commentaire,Etat 
					FROM intervention 
					INNER JOIN pompier ON pompier.Pompier_ID = intervention.Responsable_ID
					WHERE pompier.Pompier_ID = ".$_SESSION["id"];
        $result = Database::getPDO()->query($query);
		//var_dump($result);
		return $result;
    }

    public function createIntervention($number, $opm, $important, $beginDate, $endDate, $town, $adress, $typeID, $applicantId, $responsibleID, $comment, $vehicles, $roles, $firefighters){
        $sqlIntervention = 'INSERT INTO intervention (Numero, OPM, Important, Date_Debut, Date_Fin, Adresse, Type_ID, Requerant_ID, Responsable_ID, Commentaire, Etat)
                                VALUES ("'. $number .'", "'. $opm .'", "'. $important .'", "'. $beginDate .'", "'. $endDate .'", "'. $town. ' - '. $adress .'",
                                 "'. $typeID .'", "'. $applicantId .'", "'. $responsibleID .'", "'. $comment .'", "A valider")';
        Database::getPDO()->query($sqlIntervention);

        $sqlVehicles = "SELECT Intervention_ID FROM intervention ORDER BY Intervention_ID DESC LIMIT 1";
        $result = Database::getPDO()->query($sqlVehicles)->fetch();
        $idIntervention = $result["Intervention_ID"];

        $sqlVehicles = 'INSERT INTO intervention_vehicule (Vehicule_Code, Intervention_ID, Date_Depart, Date_Arrivee, Date_Retour)
                        VALUES ';

        for($i = 0; $i < sizeof($vehicles); $i++){
            $sqlVehicles = $sqlVehicles. '("'.  $vehicles[$i][0] .'", "'. $idIntervention .'", "'. $vehicles[$i][1] .'", "'. $vehicles[$i][2] .'", "'. $vehicles[$i][3] .'")';
            if($i !== sizeof($vehicles) - 1){
                $sqlVehicles = $sqlVehicles. ",";
            }
        }

        Database::getPDO()->query($sqlVehicles);

        $sqlRoles = 'INSERT INTO pompier_roles (Pompier_ID, Vehicule_Code, Intervention_ID, Role)
                    VALUES ';

        for($i = 0; $i < sizeof($vehicles); $i++){
            for($y = 0; $y < sizeof($roles[$i]); $y++){
                $sqlRoles = $sqlRoles . '("'. $firefighters[$i][$y] .'", "'. $vehicles[$i][0] .'", "'. $idIntervention .'", "'. mb_convert_encoding($roles[$i][$y], "latin1", "UTF-8") .'"),';
            }
        }

        $sqlRoles = substr($sqlRoles,0,-1);

        Database::getPDO()->query($sqlRoles);
    }

    public function getTypes(){
        $result = Database::getPDO()->query("SELECT * FROM type_intervention");
        return $result->fetchAll();
    }

    /**
     *List of the last 10 interventions
     */
    public function lastTen()
    {
			if(!isset($_SESSION))
		{
			session_start();
		}
	 $query ="SELECT Numero, Date_Debut, Date_Fin, Adresse, pompier.Nom,pompier.Prenom, Commentaire,Etat 
FROM intervention 
INNER JOIN pompier ON pompier.Pompier_ID = intervention.Responsable_ID 
WHERE pompier.Pompier_ID = ".$_SESSION["id"]."
ORDER By intervention.Date_Fin DESC
LIMIT 10";

    $result = Database::getPDO()->query($query);
		//var_dump($result);
		return $result;

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