<?php
namespace App\Model;
use App\utils\database\Database;

class AuthenticationModel extends AppModel {

    /**
     * @var Database
     */


    /**
     * AuthenticationModel constructor.
     */


    /**
     * Returns the list of all rights
     * @return array
     */
    public function roles()
{

    $query = "SELECT 	Droit_ID, Description FROM droit";
    $result =$this->dbo->getpdo()->prepare($query);
    $result->execute();
    $data = $result->fetchAll();
    return $data;
}

    /**
     * Login and password verification
     * @param $prenom
     * @return array
     */
    public function authentification($prenom)
{
    $query = "SELECT Prenom, Nom ,pompier.Droit_ID ,Description FROM pompier inner join droit on pompier.Droit_ID=droit.Droit_ID where Prenom =?";
    $result =$this->dbo->getpdo()->prepare($query);
    $result->execute([$prenom]);
    $data = $result->fetchAll();
    return $data;
}
}