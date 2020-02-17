<?php

require_once 'database/Database.php';
require_once 'router/Router.php';

new Database();

$router = new Router($_GET['url']);

// Routes
$router->get('/pompier', 'Pompier#getPompier');

$router->run();