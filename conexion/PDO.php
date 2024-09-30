<?php
    require_once "config.php";
    class PeDO{
        
        private $db;
        private $resultado;
        public static ?PeDO $instancia = null;
        private function __clone(){}
        private function __construct() {
            try {
                $uri = "mysql:host=".HOST.";dbname=".NAME.";charset=utf8";
                $this->db = new PDO($uri, USER, PASS) ;
            } catch (PDOException $e) {
                die("Error en la conexion a base de datos: ". $e->getMessage());
            }
        }
        public static function getConnection() : PeDO {
            if (self::$instancia==null) {
                self::$instancia = new PeDO();
            }
            return self::$instancia;
        }
        public function query(string $sql){
            $this->resultado = $this->db->query($sql);
            return $this;
        }
        public function getRow($clase, ...$parametros):object | bool{
            return $this->resultado->fetchObject($clase,$parametros);
        }
        public function getAll($clase){
            return $this->resultado->fetchAll(PDO::FETCH_CLASS,$clase);
        }
        public function getCount(){
            return $this->resultado->fetchColumn();
        }
    }