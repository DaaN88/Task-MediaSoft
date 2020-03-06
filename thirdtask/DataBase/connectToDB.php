<?php
	mb_internal_encoding("UTF-8");

	function connectToDataBase(){

		try{
			$pdo = new PDO ('mysql:dbname=ms_bd;host=localhost:3306', 'root', '');
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $pdo;
		}catch(PDOException $e) {
			return false;
			echo "Ошибка выполнения запроса: ".$e->getMessage();
			exit();
		}
	}