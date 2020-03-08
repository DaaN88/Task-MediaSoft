<?php
	mb_internal_encoding("UTF-8");

	function connectToDataBase(){

		$configDB = require 'configForConnectDB.php';

		try{
			$pdo = new PDO (
		    	"{$configDB['driver']}:dbname={$configDB['db_name']};host={$configDB['host']};port={$configDB['port']}",
		   		$configDB['user'],
				$configDB['password']
			);
			return $pdo;
		}catch(PDOException $e) {
			echo "Ошибка выполнения запроса: ".$e->getMessage();
			exit();
		}
	}