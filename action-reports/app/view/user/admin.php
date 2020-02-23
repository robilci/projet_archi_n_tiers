<?php
use App\utils\database\Database;

$Auth = new \App\controller\AuthenticationController();

$Auth->allow(array("Permissions globales"));
?>