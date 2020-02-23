<?php


class PompierController
{
    public function getPompier(){
        $query = "SELECT P_PRENOM, P_NOM, P_EMAIL FROM pompier";
        $result = Database::getPDO()->query($query);
        $json = json_encode($result->fetchAll());
        echo $json;
    }

	
	public function getPompierAuthentification()
	{
		/*$query = "SELECT P_PRENOM, P_NOM, P_MDP,P_EMAIL FROM pompier WHERE pompier.P_EMAIL = ". $_POST["email"] . "AND pompier.P_MDP = " .$_POST["mdp"];
        $result = Database::getPDO()->query($query);
        $json = json_encode($result->fetchAll());
        echo $json;*/
		echo json_encode($_POST);
		
		//echo"toto";
	}

}