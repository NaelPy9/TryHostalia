<?php
    require_once "Controller.php";
    require_once "modelos/Alumno.php";
    require_once "modelos/Session.php";
    require_once "librerias/libreria.php";
    require_once "modelos/Solicitud.php";
    class AlumnoController extends Controller{
        public function showLogin(){
            $this-> render("Alumno/showLogin.php.twig");
        }
        public function login(){
            if (empty($_POST["dni"])) {
                redireccion("index.php");
            }
            $possibleDni = $_POST["dni"];

            $possibleAlumno = Alumno::login($possibleDni);
            if($possibleAlumno == false | NULL){
                /*
                echo "no tiene cuenta";
                die();*/
                /*redireccion("register/$possibleDni");*/
                redireccion("index.php?m=Alumno&f=showRegister&id=$possibleDni");
            }
            Session::getSession()->setAlumno($possibleAlumno);
            /*
            echo "entra";
            die();*/
            redireccion("index.php?m=Solicitud&f=showSolicitudes");
        }
        public function showRegister($dni){
            /*
            echo "dni en register".$dni;
            die();*/
            $this->render("Alumno/showRegister.php.twig", ["dni" => $dni]);
        }
        public function register(){
            if (empty($_POST["dni"]) && empty($_POST["nombre"]) && empty($_POST["apellido"])) {
                $dni = $_POST["dni"];
                
                redireccion("index.php?m=Alumno&f=showRegister&dni=$dni");
            }
            
            Alumno::register($_POST["dni"], $_POST["nombre"], $_POST["apellido"]);
            $possibleAlumno= Alumno::getLastAlumno();
            Session::getSession()->setAlumno($possibleAlumno);
            redireccion("index.php?m=Solicitud&f=showSolicitudes");        
        }
        public function logout(){
            Session::getSession()->destruct();
            redireccion("index.php");

        }
        
    }