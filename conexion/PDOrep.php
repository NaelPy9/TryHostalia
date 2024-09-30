<?php
    require_once "config";
    class PDOrep{
        private static ?PDOrep $instance = null;
        private $db;
        public $resultado;
        private function __clone(){}
        private function __construct(){
            try {
                $uri="mysql:host=".HOST.";dbname=".NAME.";charset=utf8";
                $this->db = new PDO($uri, USER, PASS);
            } catch (PDOException $e) {
                die("error en la base de datos: ". $e->getMessage());
            }
        }
        public function getInstance():PDOrep{
            if(self::$instance === null){
                self::$instance = new PDOrep() ;
            }
            return self::$instance;
        }
        public function query($sql){
            $this -> resultado = $this->db->query($sql);
            return $this;
        }
        public function getRow($clase){
            return $this -> resultado -> fetchObject($clase);
            
        }
        public function getAll($clase){
            return $this -> resultado -> fetchAll(PDO::FETCH_CLASS ,$clase);
        }
        public function getCount() {
            return $this -> resultado -> fetchColumn();
        }

        
    }