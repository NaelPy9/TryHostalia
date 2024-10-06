<?php
    require_once "Database/Database.php";
    class Modulo{
        public string $idMod;
        public string $modulo;
        public static function getModulo($idMod){
            return Database::getInstance()->query("SELECT * FROM modulo WHERE idMod={$idMod}")->getObject("Modulo");
        }
        public static function getAllModulos(){
            return Database::getInstance()->query("SELECT * FROM modulo")->getAllObjects("Modulo");
        }
    }