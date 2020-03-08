<?php
	session_start();
	require_once "makeCSVFiles.php";
	require_once "getCountWords.php";
	require_once ".\DataBase\insertDB.php";

	function processingUploadingFiles($arrData){

		$uploaddir = '.\uploads\\';

		$uploadfile = $uploaddir.basename($arrData['name']);

		if (!file_exists($uploadfile)){
			
			if ( move_uploaded_file($arrData['tmp_name'], $uploadfile) ) {

				$_SESSION['goodExec'] = "Файл корректен и успешно загружен";
		    	
		   		$textFromFile = file_get_contents($uploaddir.$arrData['name']);

		   		$tmpArrForFiles = getCountWords($textFromFile);

				insertInDB($textFromFile, $tmpArrForFiles);

				makeCsvFileForStringFromFile($tmpArrForFiles);

			}else {
			    $_SESSION['error']['files'] = "Возможная атака с помощью файловой загрузки!";
			}

		}elseif (file_exists($uploadfile)) {
			$_SESSION['error']['files'] = "Файл уже загружен";
		}
	}