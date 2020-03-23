<?php
	session_start();
	require_once "classes\classInsertBdDataPicture.php";
	require_once "classes\classConnect.php";
	require_once "classes\classMakeDirForPicture.php";
	require_once "classes\classAddCategoryPic.php";
	require_once "classes\classValidateFiles.php";

	$checkFiles = new validateUploadFiles ($_FILES['uploading']);
	$validUploadFiles = new validateUploadFiles ($_FILES['uploading']);

	$validatedUploadingFiles = $validUploadFiles->getValidateFiles();

	$newPathDirForUser = new makeDirForPicture($_SESSION['login'], $validatedUploadingFiles);
	$newDirForUser = new makeDirForPicture($_SESSION['login'], $validatedUploadingFiles);
	
	$newConnect = new connectingToDb("logpas_fs");
	
	$uploadPic = new insertBdDataPicture($validatedUploadingFiles, $_SESSION['login'], $newPathDirForUser->getPathToDirWithPicUser(), $newConnect);
	
	$addCategoryPic = new addCategoryToPic($_SESSION['login'], $validatedUploadingFiles, $_POST['categoryForPic'], $newPathDirForUser->getPathToDirWithPicUser(), $newConnect);

	$checkFiles->getCheckMimeType();
	$checkFiles->getCheckSizeFile();
	$checkFiles->getCheckAllowedExpansionFile();;

	$newDirForUser->executeMakeDirAndMove();
	if ( $_SESSION['goodUploadPic'] == "true" ) {
		
		$uploadPic->executeInsertBdDataOfPictures();

		$addCategoryPic->makeRelationCatWithPic();

		unset($_SESSION['goodUploadPic']);
	}