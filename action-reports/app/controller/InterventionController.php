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

    public function getIntervention()
    {
        var_dump($_POST['login']);
    }

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
        $this->render('intervention.create');
    }



}
