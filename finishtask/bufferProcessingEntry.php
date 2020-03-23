<?php
	session_start();
	require_once "classes\classValidateData.php";
	require_once "classes\classEntryOnSite.php";
	require_once "classes\classConnect.php";

	$validDataEntry = new validateData($_POST['fieldLogin'], $_POST['fieldPassword']);
	$newConnect = new connectingToDb("logpas_fs");

	$loginForEntry = $validDataEntry->getValidLogin();
	$passwordForEntry = $validDataEntry->getValidPassword();

	$regAdmin = new entryOnSite($loginForEntry, $passwordForEntry, $newConnect);
	$regAdmin->checkLoginAndPassword();