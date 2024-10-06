<?php
    require_once "Database/Database.php";
    class Profesor	{
        public string $idPro;
        public string $nombre;
        public string $apellido;
        public string $email;
        public static function getProfesor($idPro){
            return Database::getInstance()->query("SELECT * FROM profesor WHERE idPro={$idPro}")->getObject("Profesor");
        }
        public static function getAllProfesores(){
            return Database::getInstance()->query("SELECT * FROM profesor")->getAllObjects("Profesor");
        }
    }