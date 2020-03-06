<?php
	mb_internal_encoding("UTF-8"); //установка внутренней кодировки скрипта

	require_once "makeCSVFiles.php";
	require_once "getCountWords.php";
	require_once ".\DataBase\insertDB.php";

	function processingUploadingFiles($arrData){

		$uploaddir = '.\uploads\\';

		$uploadfile = $uploaddir.basename($arrData['name']);

		
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