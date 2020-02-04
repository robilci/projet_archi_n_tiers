<?php

namespace App\controller;

/**
 * Class InterventionController
 * @package App\controller
 */
class InterventionController extends AppController {

    /**
     * InterventionController constructor.
     */

    /**
     * @param $id - the id of the intervention
     */
    public function getIntervention($id){
        echo "intervention numéro ".$id;
    }

    public function interventionsList(){
        $interventionsList = [
            [
                1,
                "sauvetage feu"
            ],
            [
                2,
                "sauvetage enfant en danger"
            ],
            [
                3,
                "sauvetage vielle personne AVC"
            ]
        ];

        $this->render('intervention.list', compact('interventionsList'));
    }
}
