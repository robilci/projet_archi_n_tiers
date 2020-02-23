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