<?php
    require_once "Database/Database.php";
    class Alumno{
        private string $idAlu;
        public string $dni;
        public string $nombre;
        public string $apellido;

        public function getidAlu(): string{
            return $this->idAlu;
        }
        public function getDni(){
            return $this->dni;
        }
        public function getNombre(){
            return $this->nombre;
        }
        public function getApellido(){
            return $this->apellido;
        }

        public static function login($dni){
            return Database::getInstance()->query("SELECT * FROM alumno WHERE dni = '{$dni}'")->getObject("Alumno");
        }
        public static function register($dni, $nombre, $apellido){
            return Database::getInstance()->query("INSERT INTO alumno (dni, nombre, apellido) 
            VALUE ('{$dni}', '{$nombre}', '{$apellido}')");
        }
        public static function getAlumno($idAlu){
            return Database::getInstance()->query("SELECT * FROM alumno WHERE idAlu = {$idAlu}")->getObject("Alumno");
        }
        public static function getLastAlumnoID(){
            return Database::getInstance()->lastID();
        }
        public static function getLastAlumno(){
            $id = Alumno::getLastAlumnoID();
            return Database::getInstance()->query("SELECT * FROM alumno WHERE idAlu = $id")->getObject("Alumno");
        }
        
    }