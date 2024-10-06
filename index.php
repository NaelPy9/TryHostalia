<?php
    require_once "modelos/Session.php";
    require_once "modelos/Alumno.php";

    $quien = $_GET["m"]??$_POST["m"]??"Alumno";
    $que = $_GET["f"]??$_POST["f"]??"showLogin";
    $id= $_GET["id"]??$_POST["id"]??null;

    
    
    Session::getSession()->start();

    $possibleControlador = "{$quien}Controller";
    $possibleRuta = "controladores/{$possibleControlador}.php";

    if (!file_exists($possibleRuta)) {
        die("No encuentra el controlador");
    }
    require_once $possibleRuta;
    $controlador = new $possibleControlador;
    if(!method_exists($controlador, $que)){
        die("No existe la función");
    }
    $controlador->$que($id);
