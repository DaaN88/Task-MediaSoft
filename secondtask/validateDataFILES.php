<?php
	mb_internal_encoding("UTF-8"); //установка внутренней кодировки скрипта

	function validateDataFILES($valueFiles){
		
		$blackList = array(".php", ".phtml", ".php3", ".php4", ".html");
		$size = 5*1024*1024; // 5 Мбайт
		
		$valueFiles['name'] = strval($valueFiles['name']);
		$valueFiles['name'] = trim($valueFiles['name']);
    	$valueFiles['name'] = stripslashes($valueFiles['name']);
    	$valueFiles['name'] = strip_tags($valueFiles['name']);
    	$valueFiles['name'] = htmlspecialchars($valueFiles['name']);
		
		//запрет на загрузку PHP и HTML файлов
		foreach ($blackList as $item) {
			if(preg_match("/$item\$/i", $valueFiles['name'])) {
				echo "Загрузка PHP и HTML файлов запрещена"."<br>";
				exit;
			}
  		}

		// разрешение загрузки только файлов с расширением .txt
		if ( $valueFiles['type'] != 'text/plain' && $valueFiles['name'] != ""){
			print_r($valueFiles);
			echo "Загружайте файлы только с расширением .txt"."<br>";
			exit;
		}

		if ($valueFiles['size'] > $size){
			echo "Размер файла не должен первышать 5 Мбайт"."<br>";
			exit;
		}

		return $valueFiles;		
	}