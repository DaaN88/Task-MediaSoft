<?php
	
	require_once "classes\classConnect.php";

	class deletePic {

		private $chosenId;
		private $pdo;
		private $pathToPic;

		function __construct ($idPicInBd, $pathPicOnHDD, interfaceConnectToDb $newConnect) {

			$this->chosenId = $idPicInBd;
			$this->pdo = $newConnect;
			$this->pathToPic = $pathPicOnHDD;
		}

		private function deletePicFromDb() {

			$selectQueryDelete = "DELETE FROM picture WHERE id = ?";
			$statementDel = $this->pdo->makeConnectingToDb()->prepare($selectQueryDelete);

			$statementDel->execute([
				$this->chosenId
			]);
		}

		private function deleteQuantityCountFromDb() {

			$selectQueryDeleteCount = "DELETE FROM quantity_view WHERE picture_id = ?";
			$statementDelCount = $this->pdo->makeConnectingToDb()->prepare($selectQueryDeleteCount);

			$statementDelCount->execute([
				$this->chosenId
			]);
		}

		private function deleteFromDir() {
			unlink($this->pathToPic);
		}

		public function doDelPicFromBd() {
			$this->deletePicFromDb();
		}

		public function doDelPicFromDir() {
			$this->deleteFromDir();
		}

		public function doDelQuantityCountView() {
			$this->deleteQuantityCountFromDb();
		}
	}