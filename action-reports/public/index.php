<?php
session_start();

define('ROOT', dirname(__DIR__));
require(ROOT. '/app/App.php');

use App\App;
use App\utils\database\Database;


App::loadAutoloader();
App::loadRouter();
App::loadDatabase();

?>


