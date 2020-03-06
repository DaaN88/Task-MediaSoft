<?php
	mb_internal_encoding("UTF-8"); //установка внутренней кодировки скрипта

	require_once "makeDirAndMove.php";

	// функция создания csv файла с отчетом об обработке текста
	function makeCsvFileForString($arrWithData){

		$date = date("d.m.yy");
		$time = date("h_i_s");

		$fileName = 'TextReport'.'_'.$date.'_'.$time.'.csv';

		touch($fileName);
		$file = fopen($fileName, 'w');
		
		fputs($file, chr(0xEF) . chr(0xBB) . chr(0xBF)); // BOM - устраняет проблему с кодировкой русских букв
		
		fputcsv($file, ["Слово", "Число вхождений"], ';');
		
		foreach ($arrWithData as $key => $value){
			fputcsv($file, [$key, $value], ';');
		}

		fclose($file);

		makeDirAndMoveCsvFiles($fileName);

	}


//-------------------------------------------------------------------------------------------------------------------------------------------------------------

	//функция создания csv файла с отчетом о загруженных файлах
	function makeCsvFileForStringFromFile($arrWithData){

		$date = date("d.m.yy");
		$time = date("h_i_s");

		$fileName = 'TextReportFromFile'.'_'.$date.'_'.$time.'.csv';

		touch($fileName);
		$file = fopen($fileName, 'w');
		
		fputs($file, chr(0xEF) . chr(0xBB) . chr(0xBF)); // BOM - устраняет проблему с кодировкой русских букв
		
		fputcsv($file, ["Слово", "Число вхождений"], ';');
		foreach ($arrWithData as $key => $value){
			fputcsv($file, [$key, $value], ';');
		}
		
		fclose($file);

		makeDirAndMoveCsvFiles($fileName);

	}