<?php
	mb_internal_encoding("UTF-8");

	require_once ".\DataBase\connectToDB.php";

	function selectFromDataBase (){

		if ( connectToDataBase() ){
			$pdo = connectToDataBase();
		} else{
			echo "Ошибка: не удалось соединиться с БД";
		}

		$selectAllQueryUploadedText = 'SELECT * FROM uploaded_text';
		$printSelectUploadedText = $pdo->query($selectAllQueryUploadedText)->fetchAll(PDO::FETCH_ASSOC);

		return $printSelectUploadedText;
	}