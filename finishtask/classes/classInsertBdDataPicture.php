<?php

	require_once "classes\classConnect.php";
	
	class insertBdDataPicture {

		private $pdo;
		private $arrForPic;
		private $nameLogin;
		private $pathToPic;

		function __construct($arrFromFILES, $nameLoginFromEntry, $pathToPicUser, interfaceConnectToDb $newConnect){

			$this->arrForPic = $arrFromFILES;
			$this->nameLogin = $nameLoginFromEntry;
			$this->pathToPic = $pathToPicUser;
			$this->categoryForPic = $categoryForPicFromForm;
			$this->pdo = $newConnect;
		}

		private function processingInsertToBdFiles() {

			$datePic = date("Y-m-d H:i:s");
			
			$idFromLogin = $this->selectIdFromLogin();

			for ($i = 0; $i < count($this->arrForPic['name']) && $this->arrForPic['name'][0] != ""; $i++){

			$insertQueryPic = "INSERT INTO picture(path, type, size, name, login_id, date) VALUES (?,?,?,?,?,?)";
			$statementPasw = $this->pdo->makeConnectingToDb()->prepare($insertQueryPic);

				$successPasw = $statementPasw->execute([
					strval($this->pathToPic),
					$this->arrForPic['type']["$i"],
					$this->arrForPic['size']["$i"],//размер в байтах
					$this->arrForPic['name']["$i"],
					intval($idFromLogin[0]['id']),
					$datePic
				]);
			}
		}

		private function selectIdFromLogin () {
			
			$selectQueryId = "SELECT id FROM login WHERE name = ?";
			$statementId = $this->pdo->makeConnectingToDb()->prepare($selectQueryId);

			$statementId->execute([
				$this->nameLogin
			]);

			return $statementId->fetchAll(PDO::FETCH_ASSOC);
		}

		public function executeInsertBdDataOfPictures() {
			$this->processingInsertToBdFiles();
		}

	}