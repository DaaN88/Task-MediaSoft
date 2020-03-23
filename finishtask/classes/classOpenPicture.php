<?php

	require_once "classes\classConnect.php";

	class openPicture{
		
		private $nameLogin;
		private $pdo;

		function __construct ($nameLoginFromEntry, interfaceConnectToDb $newConnect){

			$this->nameLogin = $nameLoginFromEntry;
			$this->pdo = $newConnect;
		}

		private function takeNameOfPicFromBd () {

			$selectQueryName = "SELECT name FROM picture WHERE login_id = (SELECT id FROM login WHERE name = ?)";
			$statementName = $this->pdo->makeConnectingToDb()->prepare($selectQueryName);

			$statementName->execute([
				$this->nameLogin
			]);

			return $statementName->fetchAll(PDO::FETCH_ASSOC);
		}

		private function totalAmountQuantityPic() {

			$selectQueryName = "SELECT COUNT(name) as totalAmount FROM picture WHERE login_id = (SELECT id FROM login WHERE name = ?)";
			$statementName = $this->pdo->makeConnectingToDb()->prepare($selectQueryName);

			$statementName->execute([
				$this->nameLogin
			]);

			return $statementName->fetchAll(PDO::FETCH_ASSOC);
		}

		private function takePathOfPicFromBd() {

			$selectQueryName = "SELECT path FROM picture WHERE login_id = (SELECT id FROM login WHERE name = ?)";
			$statementName = $this->pdo->makeConnectingToDb()->prepare($selectQueryName);

			$statementName->execute([
				$this->nameLogin
			]);

			return $statementName->fetchAll(PDO::FETCH_ASSOC);
		}

		private function takeIdOfPicFromBd() {

			$selectQueryId = "SELECT id FROM picture WHERE login_id = (SELECT id FROM login WHERE name = ?)";
			$statementId = $this->pdo->makeConnectingToDb()->prepare($selectQueryId);

			$statementId->execute([
				$this->nameLogin
			]);

			return $statementId->fetchAll(PDO::FETCH_ASSOC);
		}

		public function getNamePictureFromBd() {
			$tmpName = $this->takeNameOfPicFromBd();
			return $tmpName;
		}

		public function getPathPictureFromBd() {
			
			$tmpPath = $this->takePathOfPicFromBd();
			return $tmpPath;
		}

		public function getAmountQuantityPic() {

			return $this->totalAmountQuantityPic();
		}

		public function getIdPic() {
			return $this->takeIdOfPicFromBd();
		}
	}