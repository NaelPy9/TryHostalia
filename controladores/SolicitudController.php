<?php
    require_once("Database/Database.php");
    require_once("librerias/libreria.php");
    require_once("modelos/Solicitud.php");
    require_once("modelos/Session.php");
    require_once("modelos/Profesor.php");
    require_once("modelos/Modulo.php");
    require_once("Controller.php");
    class SolicitudController extends Controller{
        public function showEditar($idSol){
            $this->render("Solicitud/showEditar.php.twig", ["solicitud"=>Solicitud::getSolicitud($idSol), "profesores"=>Profesor::getAllProfesores(), "modulos"=>Modulo::getAllModulos()]);
        }
        public function editar($idSol){
            Solicitud::editar($idSol, $_POST["profesor"], $_POST["modulo"], $_POST["idAlu"], $_POST["cv"]);
            redireccion("index.php?m=Solicitud&f=showSolicitudes");
        }
        public function showSolicitudes(){
            $this->render("Alumno/showSolicitudes.php.twig",["alumno"=>Session::getSession()->getAlumno(), "solicitudes"=>Solicitud::getAllSolicitudByIdAlu(Session::getSession()->getAlumno()->getidAlu())]);
        }
        public function eliminar($idSol){
            Solicitud::eliminar($idSol);
            redireccion("index.php?m=Solicitud&f=showSolicitudes");
        }
    }