<?php
<<<<<<< HEAD
	mb_internal_encoding("UTF-8"); //установка внутренней кодировки скрипта
=======
>>>>>>> ForCorrecting

	function makeDirAndMoveCsvFiles($dataWithFileName){

		//Проверка - есть ли папка. Если нету - создаем
		$structure = '.\csv_file\\';

		if (file_exists($structure)){//Проверка - есть ли папка. Если есть - перемещаем файл в новую папку
			
			//Перемещаем файлы в папку
			$path = '.\\'.$dataWithFileName;
			$newPath = '.\csv_file\\'.$dataWithFileName;

			rename($path, $newPath);
		}else{ //Проверка - есть ли папка. Если нету - создаем, вызываем функцию и перемещаем файлы
			mkdir($structure, 0777, true);

			makeDirAndMoveCsvFiles($dataWithFileName);
		}
	}