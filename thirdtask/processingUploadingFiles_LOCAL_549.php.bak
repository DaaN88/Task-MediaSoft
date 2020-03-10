<?php
<<<<<<< HEAD
	mb_internal_encoding("UTF-8"); //установка внутренней кодировки скрипта

=======
	session_start();
>>>>>>> ForCorrecting
	require_once "makeCSVFiles.php";
	require_once "getCountWords.php";
	require_once ".\DataBase\insertDB.php";

	function processingUploadingFiles($arrData){

		$uploaddir = '.\uploads\\';

		$uploadfile = $uploaddir.basename($arrData['name']);

<<<<<<< HEAD
		
		if (!file_exists($uploadfile)){
			
			if ( move_uploaded_file($arrData['tmp_name'], $uploadfile) ) {
		   		echo "Файл корректен и был успешно загружен."."<br>";
		    	
		   		$textFromFile = file_get_contents($uploaddir.$arrData['name']);

			}else {
			    echo "Возможная атака с помощью файловой загрузки!"."<br>";
			}

		}elseif (file_exists($uploadfile)) {
			echo "Файл уже загружен"."<br>";
			exit();
		}

		$tmpArrForFiles = getCountWords($textFromFile);

		insertInDB($textFromFile, $tmpArrForFiles);

		makeCsvFileForStringFromFile($tmpArrForFiles);

		echo '<script type="text/javascript">
			window.location = "index.php"
		</script>';
	}	
=======
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
>>>>>>> ForCorrecting
