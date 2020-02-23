<?php

require_once 'database/Database.php';
require_once 'router/Router.php';

require_once 'synchronization_module/Synchronization.php';

 
new Database();

$router = new Router($_GET['url']);

// Routes
$router->get('/pompier', 'Pompier#getPompier');
$router->get('/', 'Index#home');
$router->post('/pompier/authentification','Pompier#getPompierAuthentification');
$router->run();

// Synchronization
//$synch = new Synchronization();
//$synch->run();


$router->get('/synchronize', 'Index#synchronize');
$router->run();

