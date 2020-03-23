<?php

	class validateUploadFiles {

		private $arrayWithDataOfFiles;

		function __construct ($arrFilesFromFILES) {

			$this->arrayWithDataOfFiles = $arrFilesFromFILES;
		}

		private function validateAllDataFiles () {
		
		for ($i = 0; $i < count($this->arrayWithDataOfFiles['name']); $i++){

			$resArrWithDataOfFiles['name']["$i"] = strval($this->arrayWithDataOfFiles['name']["$i"]);
			$resArrWithDataOfFiles['name']["$i"] = trim($this->arrayWithDataOfFiles['name']["$i"]);
    		$resArrWithDataOfFiles['name']["$i"] = stripslashes($this->arrayWithDataOfFiles['name']["$i"]);
    		$resArrWithDataOfFiles['name']["$i"] = strip_tags($this->arrayWithDataOfFiles['name']["$i"]);
    		$resArrWithDataOfFiles['name']["$i"] = htmlspecialchars($this->arrayWithDataOfFiles['name']["$i"]);
    		$resArrWithDataOfFiles['type']["$i"] = $this->arrayWithDataOfFiles['type']["$i"];
    		$resArrWithDataOfFiles['tmp_name']["$i"] = $this->arrayWithDataOfFiles['tmp_name']["$i"];
    		$resArrWithDataOfFiles['error']["$i"] = $this->arrayWithDataOfFiles['error']["$i"];
    		$resArrWithDataOfFiles['size']["$i"] = $this->arrayWithDataOfFiles['size']["$i"];
		}

			return $resArrWithDataOfFiles;		
		}

		private function checkMimeType() {

			// Создадим ресурс FileInfo
			$fileInf = finfo_open(FILEINFO_MIME_TYPE);

			for ($i = 0; $i < count($this->arrayWithDataOfFiles['name']); $i++) {
				
				// Получим MIME-тип
				$mimeType = (string) finfo_file( $fileInf, strval( $this->arrayWithDataOfFiles['tmp_name']["$i"]) );

				// Проверим ключевое слово image (image/jpeg, image/png и т. д.)
				if (strpos($mimeType, 'image') === false){

					die ('Можно загружать только изображения.');
				}
			}
		}

		private function checkSizeFile() {

			$size = 5*1024*1024; // 5 Мбайт

			for ($i = 0; $i < count($this->arrayWithDataOfFiles['name']); $i++) {

				if ($this->arrayWithDataOfFiles['size']["$i"] > $size) {
					echo "Размер файла не должен превышать 5 Мбайт"."<br>";
					exit();
				}
			}
		}

		private function checkAllowedExpansionFile() {

			$blackList = array(".php", ".phtml", ".php3", ".php4", ".html");

			//запрет на загрузку PHP и HTML файлов
			foreach ($blackList as $item) {
				if(preg_match("/$item\$/i", $valueFiles['name'])) {
					echo "Загрузка PHP и HTML файлов запрещена"."<br>";
					exit();
				}
	  		}

		}

		public function getCheckMimeType() {

			$this->checkMimeType();
		}

		public function getCheckSizeFile() {

			$this->checkSizeFile();
		}

		public function getCheckAllowedExpansionFile() {

			$this->checkAllowedExpansionFile();
		}

		public function getValidateFiles() {

			return $this->validateAllDataFiles();
		}
	}