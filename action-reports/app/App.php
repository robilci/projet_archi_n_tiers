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

        $router->get('/intervention/:id', 'Intervention#getIntervention', 'test')
            ->with('id', '[0-9]+');

        $router->get('/image/:nom', 'Index#image', 'image')
            ->with('nom', '[a-z]+');


		$router->post('/auth', 'Authentication#authentication');
        $router->get('/interventions', 'Intervention#listAll');
        $router->get('/interventions/checked', 'Intervention#checked');
        $router->get('/interventions/toCheck', 'Intervention#toCheck');
        $router->get('/interventions/rejected', 'Intervention#rejected');
        $router->get('/interventions/onGoing', 'Intervention#onGoing');
        $router->get('/interventions/archived', 'Intervention#archived');
        $router->post('/auth', 'Authentication#authentication');
        $router->get('/logOut', 'Authentication#logOut');
        $router->get('/myAccount', 'User#myAccount');
        $router->get('/', 'Index#authentication','auth');
        $router->get('/home', 'Index#home','home');
        $router->get('/admin', 'UserController#adminPage','admin');
        $router->get('/user', 'User#getUser');
        $router->get('/password', 'User#changePassword');
        $router->get('/intervention/:id', "Intervention#getIntervention")->with('id', '[0-9]+');
        $router->get('/test',  function () use ($router) { echo $router->url('route1', ['id' => "fff", 'nom' => 'gggggg']);})->with('id', '[0-9]+');
        $router->run();
    }

    public static function loadAutoloader(){
        Autoloader::register();
    }

    public static function loadDatabase(){
        new Database();
    }
}