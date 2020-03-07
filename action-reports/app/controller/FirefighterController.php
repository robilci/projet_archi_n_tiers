<?php


namespace App\controller;


use App\Model\FirefighterModel;

class FirefighterController extends AppController
{
    public function getFirefighters(){
        $model = new FirefighterModel();
        $model->getFirefighters();
    }
}