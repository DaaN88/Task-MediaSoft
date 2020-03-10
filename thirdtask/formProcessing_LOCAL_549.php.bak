<?php
<<<<<<< HEAD
	mb_internal_encoding("UTF-8"); //установка внутренней кодировки скрипта

	require_once "validateDataPOST.php";
=======
session_start();
	mb_internal_encoding("UTF-8"); //установка внутренней кодировки скрипта

	require_once "validateDataPOST.php";
	require_once "validateDataFILES.php";
>>>>>>> ForCorrecting
	require_once "getCountWords.php"; //обработка текста из textarea
	require_once ".\DataBase\insertDB.php";

	$validTextFromTextArea = validateDataPOST($_POST['textFromUser']);
<<<<<<< HEAD
	

	if ($validTextFromTextArea != "" && $validTextFromTextArea != "Введите текст"){
		
		$tmpArr = getCountWords( $validTextFromTextArea );
		insertInDB($validTextFromTextArea, $tmpArr);
		makeCsvFileForString($tmpArr);

		echo '<script type="text/javascript">
			window.location = "index.php"
		</script>';

	}else{
		echo "Текст пользователем не введен";
=======

	if ($validTextFromTextArea != "" && $validTextFromTextArea != "Введите текст"){
			
		$tmpArr = getCountWords( $validTextFromTextArea );
		insertInDB($validTextFromTextArea, $tmpArr);
		makeCsvFileForString($tmpArr);	
			
	}else{
		$_SESSION['warning']['text'] = "Текст пользователем не введен.";
>>>>>>> ForCorrecting
	}