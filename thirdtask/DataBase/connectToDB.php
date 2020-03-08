<?php
<<<<<<< HEAD
	session_start();

=======
	
>>>>>>> 52b86f9662ca352ac720b4ef0fba493688cbea2b
	function connectToDataBase(){

		$configDB = require 'configForConnectDB.php';

		try{
			$pdo = new PDO (
		    	"{$configDB['driver']}:dbname={$configDB['db_name']};host={$configDB['host']};port={$configDB['port']}",
		   		$configDB['user'],
				$configDB['password']
			);
			$pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $pdo;
		}catch(PDOException $e) {
<<<<<<< HEAD
			$_SESSION['errorBd'] = $e->getMessage();
=======

			echo "Ошибка выполнения запроса: ".$e->getMessage();
			exit();
>>>>>>> 52b86f9662ca352ac720b4ef0fba493688cbea2b
		}
	}