<?php
define('ROOT', dirname(__DIR__));

require(ROOT. '/app/App.php');
use App\App;

App::loadAutoloader();
App::loadDatabase();
App::loadRouter();


?>


