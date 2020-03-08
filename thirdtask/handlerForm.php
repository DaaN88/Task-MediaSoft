<?php
session_start();
	if ($_FILES['fileFromUser']['name'] == NULL && $_FILES['fileFromUser']['error'] == 4){
		require_once "formProcessing.php";
		require_once "UploadingFile.php";
		header('Location: index.php');
		exit();
	}elseif ($_FILES['fileFromUser']['name'] != NULL && ($_POST['textFromUser'] == "" || $_POST['textFromUser'] == "Введите текст") ){
		require_once "UploadingFile.php";
		header('Location: index.php');
		exit();
	}else{
		require_once "formProcessing.php";
		require_once "UploadingFile.php";
		header('Location: index.php');
		exit();
	}