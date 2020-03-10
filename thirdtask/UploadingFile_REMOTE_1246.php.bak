<?php

	session_start();

	require_once "validateDataFILES.php";
	require_once "processingUploadingFiles.php"; //обработка загрузки файлов

	$validVariableFromFiles = validateDataFILES($_FILES['fileFromUser']);

	if ($validVariableFromFiles['name'] != ""){
		processingUploadingFiles($validVariableFromFiles);
	}elseif($validVariableFromFiles['error'] == 4 || $validVariableFromFiles['name'] == NULL){
		$_SESSION['warning']['files'] = "Файлы пользователем не загружались";
	}