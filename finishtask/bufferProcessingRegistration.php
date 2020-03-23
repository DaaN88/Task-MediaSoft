<?php
	
	require_once "classes\classValidateData.php";
	require_once "classes\classRegistrationOnSite.php";
	require_once "classes\classConnect.php";

	$validData = new validateData($_POST['insertLogin'], $_POST['insertPassword']);

	$loginForRegistration = $validData->getValidLogin();
	$passwordForRegistration = $validData->getValidPassword();
	$repeatPasswordForRegistration = $validData->getValidateString($_POST['repeatPassword']);

	$newConnect = new connectingToDb("logpas_fs");
		
	$pdoInsert = new registrationOnSite($loginForRegistration, $passwordForRegistration, $repeatPasswordForRegistration, $newConnect);

	$pdoInsert->getCheckEntredPasswords();

	$pdoInsert->makeInsertLoginNewUser();
	$pdoInsert->makeInsertPasswordNewUser();

	header('Location: index.php');