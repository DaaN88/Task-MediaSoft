<?php
	mb_internal_encoding("UTF-8"); //установка внутренней кодировки скрипта

	require_once "makeCSVFiles.php";
	require_once "getCountWords.php";

	function processingUploadingFiles($arrData){

		$uploaddir = '.\uploads\\';

		$uploadfile = $uploaddir.basename($arrData['name']);
			
		if (move_uploaded_file($arrData['tmp_name'], $uploadfile)) {
		   	echo "Файл корректен и был успешно загружен."."<br>";
		    	
		   	$textFromFile = file_get_contents($uploaddir.$arrData['name']);

		} else {
		    echo "Возможная атака с помощью файловой загрузки!"."<br>";
		}
		
		$tmpArrForFiles = getCountWords($textFromFile);

		makeCsvFileForStringFromFile($tmpArrForFiles);
	}	