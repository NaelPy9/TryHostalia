<?php

	/**
	 * Desarrollo Web en Entorno Servidor
	 * Examen 14/12/2023
     *
     * ESCRIBE AQUÍ TU NOMBRE COMPLETO 
	 *
	 * IMPORTANTE:
	 * MODIFICA LA CLASE AÑADIENDO EL CÓDIGO QUE FALTA
	 * ASÍ COMO LOS MÉTODOS QUE ESTIMES NECESARIOS.
	 */

	class Database {

		private $host = 'db' ;
		private $user = 'root' ;
		private $pass = '' ;
		private $dbnm = 'solicitudes' ;

		private $sqli ;
		private $db;
		private $res ;
		private static ?Database $instance = null ;

	 	/**  */
		private function __construct(){
			/*
			try {
				$this->sqli = new mysqli($this->host, $this->user, $this->pass, $this->dbnm) ;
			} catch (mysqli_sql_exception $e) {
				die ('ERROR: se ha producido un error en la conexión con la base de datos.<br/>'.$e->getMessage()) ;
			}*/
			try {
				$uri = "mysql:host={$this->host};dbname={$this->dbnm};charset=utf8";
				$this->db = new PDO($uri, $this->user, $this->pass);
			} catch (PDOException $e) {
				die ('ERROR: se ha producido un error en la conexión con la base de datos: '.$e->getMessage()) ;

			}
		}

		/**
	 	 * @return 
	 	 */
		public static function getInstance()
		{
			if (self::$instance == null) {
				self::$instance = new Database();
			}
			return self::$instance;
		}
		

		/**
		 * @param  string $sql 
		 * @return 
		 */
		public function query(string $sql): Database
		{
			$this->res = $this->db->query($sql) ;
			return $this ;
		}
		public function lastID(){
			return $this->db->lastInsertId() ;
		}

		/**
		 * @param  string $cls 
		 * @return 
		 */
		public function getObject(string $cls = "StdClass")
		{
			return  $this->res->fetchObject($cls);
		}

		/**
		 * @param  string $cls 
		 * @return array
		 */
		public function getAllObjects(string $cls = "StdClass"): array
		{
			return $this->res->fetchAll(PDO::FETCH_CLASS,$cls);
		}


	}