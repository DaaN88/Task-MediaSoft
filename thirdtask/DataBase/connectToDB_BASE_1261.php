<?php
	mb_internal_encoding("UTF-8");

	function connectToDataBase(){

<<<<<<<<< Temporary merge branch 1
		try{
			$pdo = new PDO ('mysql:dbname=ms_bd;host=localhost:3306', 'root', '');
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $pdo;
		}catch(PDOException $e) {
			return false;
=========
		$configDB = require 'configForConnectDB.php';

		try{
			$pdo = new PDO (
		    	"{$configDB['driver']}:dbname={$configDB['db_name']};host={$configDB['host']};port={$configDB['port']}",
		   		$configDB['user'],
				$configDB['password']
			);
			return $pdo;
		}catch(PDOException $e) {
>>>>>>>>> Temporary merge branch 2
			echo "Ошибка выполнения запроса: ".$e->getMessage();
			exit();
		}
	}