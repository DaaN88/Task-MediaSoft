<?php
	mb_internal_encoding("UTF-8"); //установка внутренней кодировки скрипта

	require_once "validateDataPOST.php";
	require_once "validateDataFILES.php";	
	require_once "getCountWords.php"; //обработка текста из textarea
	require_once "processingUploadingFiles.php"; //обработка загрузки файлов

	$validTextFromTextArea = validateDataPOST($_POST['textFromUser']);
	$validVariableFromFiles = validateDataFILES($_FILES['fileFromUser']);


	if ($validTextFromTextArea != "" && $validTextFromTextArea != "Введите текст"){
		echo "<b>"."Текст введенный пользователем в textarea:"."</b>"."<br>";
		$tmpArr = getCountWords( $validTextFromTextArea );
		makeCsvFileForString($tmpArr);
	}else{
		echo "<b>"."Текст введенный пользователем в textarea:"."</b>"."<br>";
		echo "Текст пользователем не введен!"."<br>";
	}
	

	if ($validVariableFromFiles['name'] != ""){
		echo "<b>"."Текст из файла:"."</b>"."<br>";
		processingUploadingFiles($validVariableFromFiles);
	}elseif($validVariableFromFiles['error'] == 4){
		echo "<b>"."Текст из файла:"."</b>"."<br>";
		echo "Файлы не выбраны и не загружались"."<br>";
	}
	

