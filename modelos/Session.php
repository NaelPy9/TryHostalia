<?php
    class Session{
        private static ?Session $session = null;
        public static function getSession(){
            if(self::$session === null){
                self::$session = new Session();
            }
            return self::$session;
        }
        public function start(){
            session_start();
        }
        public function destruct(){
            $_SESSION[] = "";
            session_destroy();
        }
        public function getAlumno():Alumno | null{
            return $_SESSION["alumno"];
        }
        public function setAlumno(Alumno $alumno): void{
            $_SESSION["alumno"] = $alumno;
        }
        public function set(string $key, $value): void{
            $_SESSION[$key] = $value;
        }
        public function get(string $key){
            return $_SESSION[$key];
        }
    }