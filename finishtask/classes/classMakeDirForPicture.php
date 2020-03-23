<?php
session_start();
	class makeDirForPicture {

		private $userLogin;
		private $pictureName;
		private $pathToPicUser;

		function __construct ($nameLoginFromEntry, $tmpNameUploadingPic){

			$this->userLogin = $nameLoginFromEntry;
			$this->pictureName = $tmpNameUploadingPic;
		}

		private function setPathToDirForPic() {
			
			$structure = ".\uploadedPicUsers\dir_uploadedPic_".$this->userLogin."\\";
			$this->pathToPicUser = $structure;
			
			return $this->pathToPicUser;
		}

		private function makeDirAndMove() {

			//Проверка - есть ли папка. Если нету - создаем

			if ( file_exists( $this->setPathToDirForPic() ) ) {//Проверка - есть ли папка. Если есть - загружаем файл в новую папку
				
				for ($i = 0; $i < count($this->pictureName['name']); $i++ ){
					
					$uploadfile = $this->setPathToDirForPic().basename($this->pictureName['name']["$i"]);
					
					if (!file_exists($uploadfile)) {
						if ( move_uploaded_file($this->pictureName['tmp_name']["$i"], $uploadfile) ){
							$_SESSION['goodUploadPic'] = "true";
						} else {
							ob_start();
							echo "Возможная атака с помощью файловой загрузки!";
							header('refresh: 2; form.php');
							exit();
							ob_end_flush();
							
						}
					} else {
						ob_start();
						echo "Файл уже загружен!";
						header('refresh: 2; form.php');
						exit();
						ob_end_flush();	
					}
				}
			} else {

				mkdir($this->setPathToDirForPic(), 0777, true);
				$this->makeDirAndMove();
			}
		}

		public function executeMakeDirAndMove() {
			if ( $this->pictureName['name'][0] != ""){
				$this->makeDirAndMove();
			}else{
				ob_start();
				echo "Вы не выбрали файл для загрузки. Сначала выберите файл. Перенаправление в личный кабинет";
				header ('refresh: 2; form.php');
				exit();
				ob_end_flush();
			}
		}

		public function getPathToDirWithPicUser () {
			return $this->setPathToDirForPic();
		}
	}