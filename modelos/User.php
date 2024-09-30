<?php
    require_once("Session.php");
    require_once("conexion/PDO.php");
    class User{
        public int $idUser;
        public string $nameUser;
        public string $passwordUser;
        public static function login($userName, $password){
            return PeDO::getConnection()->query("SELECT * FROM User
            WHERE nameUser = '{$userName}' AND passwordUser = '{$password}'")
            ->getRow("User");
        }
    }