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
		$pass = md5($_POST["pass"]);
		$query = 'SELECT P_PRENOM, P_NOM, P_MDP,P_EMAIL FROM pompier WHERE pompier.P_EMAIL = "'. htmlspecialchars($_POST["email"]) . '" AND pompier.P_MDP = "' .$pass. '"';
        $result = Database::getPDO()->query($query);
        $json = json_encode($result->fetchAll(), true);
        echo $json;
		
	}

}