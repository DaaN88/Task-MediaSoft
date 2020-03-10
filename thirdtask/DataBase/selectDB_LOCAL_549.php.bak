<?php
	mb_internal_encoding("UTF-8");

<<<<<<< HEAD
	require_once ".\DataBase\connectToDB.php";

	function selectFromDataBase (){

		if ( connectToDataBase() ){
			$pdo = connectToDataBase();
		} else{
			echo "Ошибка: не удалось соединиться с БД";
		}

		$selectAllQueryUploadedText = 'SELECT * FROM uploaded_text';
		$printSelectUploadedText = $pdo->query($selectAllQueryUploadedText)->fetchAll(PDO::FETCH_ASSOC);
=======
	require_once "connectToDB.php";

	function selectFromDataBase (){

		$pdo = connectToDataBase();
		
		try{
			$selectAllQueryUploadedText = 'SELECT * FROM uploaded_text';
			$printSelectUploadedText = $pdo->query($selectAllQueryUploadedText)->fetchAll(PDO::FETCH_ASSOC);
		}catch(PDOException $e){
			echo "Ошибка выполнения запроса: ".$e->getMessage()."<br>";
			exit();
		}
		
>>>>>>> ForCorrecting

		return $printSelectUploadedText;
	}