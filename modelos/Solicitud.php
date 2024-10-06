<?php
    require_once "Database/Database.php";
    require_once "Alumno.php";
    require_once "Modulo.php";
    require_once "Profesor.php";
    class Solicitud{
        public int $idSol;
        public ?int $idAlu;
        public ?int $idPro;
        public ?int $idMod;
        public ?string $inicio;
        public ?int $estado;
        public ?string $cv;
        public ?Alumno $alumno;
        public ?Modulo $modulo;
        public ?Profesor $profesor;
        public function __construct(){
            $this->alumno = Alumno::getAlumno($this->idAlu);
            $this->modulo = Modulo::getModulo($this->idMod);
            $this->profesor = Profesor::getProfesor($this->idPro);
        }
        public static function getSolicitud(int $idSol){
            return Database::getInstance()->query("SELECT * FROM solicitud WHERE idSol = {$idSol}")->getObject("Solicitud");
        }

        public static function getAllSolicitudByIdAlu(int $idAlu){
            return Database::getInstance()->query("SELECT * FROM solicitud 
            WHERE idAlu = '{$idAlu}';")->getAllObjects("Solicitud");
        }
        public static function editar(int $idSol, int $idPro, int $idMod, int $idAlu, string $cv){
            Database::getInstance()->query("UPDATE solicitud 
            SET idPro=$idPro, idMod=$idMod, idAlu=$idAlu, cv='{$cv}'
            WHERE idSol=$idSol");
        }
        public static function eliminar(int $idSol){
            Database::getInstance()->query("DELETE FROM solicitud WHERE idSol = $idSol");
        }


    }