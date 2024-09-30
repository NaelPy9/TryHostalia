<?php
    require_once("User.php");
    class Session{
        private static ?Session $instance = null;
        public function __clone(){}
        public static function getSession(): Session{
            if(self::$instance == null){
                self::$instance = new Session();
            }
            return self::$instance;
        }
        public function getUser(): ?User{
            if (isset($_SESSION["user"])) {
                return $_SESSION["user"];
            }else{
                return null;
            }
            
        }
        public function setUser(User $user){
            $_SESSION["user"] = $user;
        }
        public function set(string $key, $value){
            $_SESSION[$key] = $value;
        }
        public function get(string $key){
            return isset($_SESSION[$key]) ? $_SESSION[$key] : null;
        }
        public function delete(string $key){
            unset($_SESSION[$key]);
        }
        public function start(){
            session_start();
        }
        public function logout(){
            $_SESSION[]="";
            session_destroy();
        }

    }