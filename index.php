<?php
require_once("Config/Config.php");
require_once("Helpers/Helpers.php");

$url = !empty($_GET['url']) ? $_GET['url'] : 'home/home';
$arrayUrl = explode("/", $url);
$controller = $arrayUrl[0];
$metodo = $arrayUrl[0];
$parametros = "";
if(!empty($arrayUrl[1])){
    if($arrayUrl[1] != ""){
        $metodo = $arrayUrl[1];
    }
}
if(!empty($arrayUrl[2])){
    if($arrayUrl[2] != ""){
        for ($i=2; $i < count($arrayUrl); $i++) { 
            $parametros .= $arrayUrl[$i].',';
        }
        $parametros = trim($parametros,','); 
    }
}
//Autoload 
require_once("Librerias/Core/Autoload.php");
//load
require_once("Librerias/Core/Load.php");
?>