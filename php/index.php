<?php

require "modele/Autoloader.php";
Autoloader::register();


ob_start();

$url = '';

if(isset($_GET["url"])){
    $url = $_GET["url"];
}

if($url == ''){
    require "view/home.php";
    $db = new Database();
    var_dump($db->getLines());
} else if(preg_match("#intervention/([0-9]+)#", $url, $param)){
    $idIntervention = $param[1];
    require "view/intervention.php";
} else {
    require "view/404.php";
}

$content = ob_get_clean();

require "view/default.php";

?>


