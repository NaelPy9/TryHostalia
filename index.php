<?php
    require_once "modelos/Session.php";
    Session::getSession()->start();
    $quien = $_POST["m"]??$_GET["m"]??"User";
    $que = $_POST["f"]??$_GET["f"]??"showLogin";

    $possibleController = "{$quien}Controller";
    $possibleRuta = "controladores/{$possibleController}.php";

    if (!file_exists($possibleRuta)) {
        die("fallo en el controlador");
    }
    
    require_once $possibleRuta;
    $controlador = new $possibleController;
    if(!method_exists($controlador,"$que")){
        die("no ha encontrado la function") ;
    }
    $controlador->$que();
