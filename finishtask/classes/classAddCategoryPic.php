<?php
	
	require_once "classes\classConnect.php";

	class addCategoryToPic {

		private $pdo;
		private $categoryForPic;
		private $arrForPic;
		private $pathToPic;
		private $login;

		function __construct($loginFromOutside, $arrFromFILES, $categoryForPicFromForm, $pathToPicUser, interfaceConnectToDb $newConnect ) {

			$this->login = $loginFromOutside;
			$this->pdo = $newConnect;
			$this->categoryForPic = $categoryForPicFromForm;
			$this->arrForPic = $arrFromFILES;
			$this->pathToPic = $pathToPicUser;
		}

		private function selectIdFromCategory() {
			
			$selectQueryIdCat = "SELECT id FROM category WHERE name_category = ?";
			$statementIdCat = $this->pdo->makeConnectingToDb()->prepare($selectQueryIdCat);

			$statementIdCat->execute([
				strval($this->categoryForPic)
			]);

			return $statementIdCat->fetchAll(PDO::FETCH_ASSOC);
		}

		private function selectIdFromLogin() {
			
			$selectQueryIdLogin = "SELECT id FROM login WHERE name = ?";
			$statementIdLogin = $this->pdo->makeConnectingToDb()->prepare($selectQueryIdLogin);

			$statementIdLogin->execute([
				strval($this->login)
			]);

			return $statementIdLogin->fetchAll(PDO::FETCH_ASSOC);
		}

		private function selectIdFromPicture() {

			$resultArrPicWithId = [];

			for ($i = 0; $i < count($this->arrForPic['name']) && $this->arrForPic['name'][0] != ""; $i++) {
				
				$selectQueryIdPic = "SELECT id FROM picture WHERE name = ? AND path = ? AND login_id = (SELECT id FROM login WHERE name = \"{$this->login}\")";
				$statementIdPic = $this->pdo->makeConnectingToDb()->prepare($selectQueryIdPic);

				$statementIdPic->execute([
					strval($this->arrForPic['name']["$i"]),
					strval($this->pathToPic)
				]);

				$tmp = $statementIdPic->fetchAll(PDO::FETCH_ASSOC);
				
				$resultArrPicWithId["$i"] = $tmp[0]['id'];
			}

			return $resultArrPicWithId;
		}

		private function processingMakeRelationCatPic() {

			$idFromPic = $this->selectIdFromPicture();

			for ($i = 0; $i < count($this->arrForPic['name']) && $this->arrForPic['name'][0] != ""; $i++){

			$insertQueryRelation = "INSERT INTO picture_of_category(picture_id, category_id, login_id) VALUES (?,?,?)";
			$statementRelation = $this->pdo->makeConnectingToDb()->prepare($insertQueryRelation);

			$statementRelation->execute([
				$idFromPic["$i"],
				$this->selectIdFromCategory()[0]["id"],
				$this->selectIdFromLogin()[0]["id"]
				]);
			}

			header('Location: formPersonalAccount.php');
		}

		public function getIdPic() {
			return $this->selectIdFromPicture();
		}

		public function getIdCategory() {
			return $this->selectIdFromCategory();
		}

		public function makeRelationCatWithPic() {
			$this->processingMakeRelationCatPic();
		}
	}