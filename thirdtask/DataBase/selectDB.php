<?php
	mb_internal_encoding("UTF-8");

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

		return $printSelectUploadedText;
	}