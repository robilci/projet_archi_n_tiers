<?php
namespace App\Model;


/**
 * Class UserModel
 * @package App\Model
 */
class UserModel extends AppModel
{

    /**
     * @param $id
     * @return mixed
     */
    public function getUser($id)
    {
        $query = "SELECT Prenom, Nom ,Droit_ID  FROM pompier where Droit_ID =?";
        $result= $this->dbo->getPDO()->prepare($query);
        $result->execute([$id]);
        return $result->fetchAll();
    }


    public function changePassword()
    {

    }
}