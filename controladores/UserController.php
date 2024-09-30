<?php
    require_once "librerias/libreria.php";
    require_once "modelos/User.php";
    require_once "modelos/Session.php";
    class UserController{
        public function showLogin(){
            $token = md5(uniqid(mt_rand(), true));
            Session::getSession()->set("_csrf",$token);
            redireccion("resources/showLogin.html?tk={$token}");
        }
        public function login(){
            
            $name = $_POST["nameUser"];
            $password = $_POST["passwordUser"];
            if(empty($name) || empty($password)){
                redireccion("index.php");
            }
            
            
            if($_POST["token"] != Session::getSession()->get("_csrf")){
                echo $_POST["token"].".";
                echo Session::getSession()->get("_csrf");
                die("no es el mismo token");
            }
            $possibleUser = User::login($name,$password);
            if($possibleUser == false){
                redireccion("index.php");
            }
            Session::getSession()->setUser($possibleUser);
            redireccion("resources/homePage.html");
        }
    }