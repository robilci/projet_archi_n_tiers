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
        $router->post('/intervention/create/confirm', 'Intervention#confirm');

        // For ajax requests
        $router->get('/ajax/vehicles', 'Vehicle#getVehicles');
        $router->get('/ajax/firefighters', 'Firefighter#getFirefighters');
        $router->post('/ajax/vehicles/roles', 'Vehicle#getVehiclesRoles');

		// Route pour lister les interventions	d'un pompier
		$router->get('/listInterventions', 'Intervention#listOne');
		
		//Route pour lister les 10 premiers
		$router->get('/list10Interventions', 'Intervention#lastTen');
		
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