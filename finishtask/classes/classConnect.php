<?php
	require_once "classes\interfaceConnectToDb.php";

	class connectingToDb implements interfaceConnectToDb{

		private $driver = 'mysql';
		private $db_name;
		private $host = 'localhost';
		private $port = '3306';
		private $user = 'root';
		private $password = '';

		function __construct ($nameOfBd){
			return $this->db_name = $nameOfBd;
		}

		private function makeConnectDb () {
			$pdo = new PDO (
		    	"{$this->driver}:dbname={$this->db_name};host={$this->host};port={$this->port}",
		   		$this->user,
				$this->password
			);
			$pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $pdo;
		}

		public function makeConnectingToDb (){
			
			return $this->makeConnectDb();
		}
	}