<?php
use App\utils\database\Database;

$Auth = new \App\controller\AuthentificationController();

$Auth->allow(array("Permissions globales"));
?>