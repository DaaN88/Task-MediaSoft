<?php
	
	require_once "classes\classConnect.php";
	require_once "classes\classDeletePic.php";

	$count = 0;
	$countId = 0;
	$countPath = 0;
	
	$arrIdPic = [];
	$arrPathPic = [];

	foreach ($_POST as $key => $value) {
		if (is_numeric($key)){
			$arrIdPic[$countId++] = $key;
			$arrPathPic[$countPath++] = $value;
			$count++;
		}
	}

	$newConnect = new connectingToDb("logpas_fs");
	
	for ($i = 0; $i < $count; $i++){
		$deletePic = new deletePic(intval($arrIdPic["$i"]), $arrPathPic["$i"], $newConnect);
		
		$deletePic->doDelPicFromBd();
		$deletePic->doDelQuantityCountView();
		$deletePic->doDelPicFromDir();
	}

	header('Location: formToLookThroughPictures.php');