<?php
		
	require_once "classes\classConnect.php";

	class addQuantityCountView{

		private $nameLogin;
		private $namePic;
		private $pathPic;
		private $pdo;

		function __construct ($nameLoginFromEntry, $namePicFromBd, $pathPicFromBd, interfaceConnectToDb $newConnect){

			$this->nameLogin = $nameLoginFromEntry;
			$this->pdo = $newConnect;
			$this->namePic = $namePicFromBd;
			$this->pathPic = $pathPicFromBd;
		}

		private function takeIdOfPicFromBd() {

			$selectQueryId = "SELECT id FROM picture WHERE login_id = (SELECT id FROM login WHERE name = ?) AND name = ? AND path = ?";
			$statementId = $this->pdo->makeConnectingToDb()->prepare($selectQueryId);

			$statementId->execute([
				$this->nameLogin,
				strval($this->namePic),
				strval($this->pathPic)
			]);

			return $statementId->fetchAll(PDO::FETCH_ASSOC);
		}

		private function insertAndUpdateQuantityCountInBd () {

			$dateCount = date("Y-m-d H:i:s");
			
			$idFromPic = $this->takeIdOfPicFromBd();

			$insertQueryCount = "INSERT INTO quantity_view(picture_id, count_view, date) VALUES(?, ?, ?) ON DUPLICATE KEY UPDATE count_view=count_view+1";
			$statementQueryCount = $this->pdo->makeConnectingToDb()->prepare($insertQueryCount);
				
			$statementQueryCount->execute([
				intval($idFromPic[0]['id']),
				1,
				$dateCount
				]);
		}

		private function selectQuantityCountInBd () {
			
			$idFromPic = $this->takeIdOfPicFromBd();

			$selectQueryCount = "SELECT count_view FROM quantity_view WHERE picture_id = ?";
			$statementQuerySelectCount = $this->pdo->makeConnectingToDb()->prepare($selectQueryCount);
				
			$statementQuerySelectCount->execute([
				intval($idFromPic[0]['id']),
				]);

			return $statementQuerySelectCount->fetchAll(PDO::FETCH_ASSOC);
		}

		public function getIdPic() {
			return $this->takeIdOfPicFromBd();
		}

		public function updateCountView() {
			$this->insertAndUpdateQuantityCountInBd();
		}

		public function getAmountQuantityView() {
			return $this->selectQuantityCountInBd();
		}
	}	