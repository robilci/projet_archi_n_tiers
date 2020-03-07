<?php


namespace App\controller;


use App\Model\VehicleModel;

class VehicleController extends AppController
{
    public function getVehicles(){
        $model = new VehicleModel();
        $model->getVehicles();
    }

    public function getVehiclesRoles(){
        $model = new VehicleModel();
        $model->getVehiclesRoles();
    }
}