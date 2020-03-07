<?php


namespace App;

require "../app/Autoloader.php";

use App\utils\database\Database;
use App\utils\router\Router;
use App\Autoloader;


class App
{
    public static function loadRouter(){
        $router = new Router($_GET['url']);

        $router->post('/home', 'Authentication#authentication');
        $router->get('/home', 'Authentication#authentication');
        $router->get('/logout', 'Index#logout');
        $router->get('/authentication', 'Index#authentication');
        $router->get('/intervention/create', 'Intervention#create');

        // For ajax requests
        $router->get('/ajax/vehicles', 'Vehicle#getVehicles');
        $router->get('/ajax/firefighters', 'Firefighter#getFirefighters');
        $router->post('/ajax/vehicles/roles', 'Vehicle#getVehiclesRoles');


        //$router->get('/intervention/:id', "Intervention#getIntervention")->with('id', '[0-9]+');
        $router->run();
    }

    public static function loadAutoloader(){
        Autoloader::register();
    }

    public static function loadDatabase(){
        new Database();
    }
}