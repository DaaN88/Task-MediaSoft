<?php
	session_start();

	require_once "connectToDB.php";

	function selectFromDataBase (){

		$pdo = connectToDataBase();

		$pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		try{
			$selectAllQueryUploadedText = 'SELECT * FROM uploaded_text';
			$printSelectUploadedText = $pdo->query($selectAllQueryUploadedText)->fetchAll(PDO::FETCH_ASSOC);
		}catch(PDOException $e){
			$_SESSION['errorBd'] = $e->getMessage();
		}

		return $printSelectUploadedText;
	}