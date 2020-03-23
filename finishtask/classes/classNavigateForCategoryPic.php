<?php
	
	require_once "classes\classConnect.php";

	class navigateForCategoryPicture {

		private $pdo;
		private $login;
		private $category;

		function __construct($userLoginFromOutside, $categoryForPic, interfaceConnectToDb $newConnect) {

			$this->login = $userLoginFromOutside;
			$this->pdo = $newConnect;
			$this->category = $categoryForPic;		
		}

		private function selectIdFromLogin() {
			
			$selectQueryIdLogin = "SELECT id FROM login WHERE name = ?";
			$statementIdLogin = $this->pdo->makeConnectingToDb()->prepare($selectQueryIdLogin);

			$statementIdLogin->execute([
				strval($this->login)
			]);

			return $statementIdLogin->fetchAll(PDO::FETCH_ASSOC);
		}

		private function makePathPicturesAccordingToCategory() {

			$tmpId = $this->selectIdFromLogin()[0]["id"];

			$selectPath = "SELECT path FROM picture_of_category LEFT JOIN picture ON picture_id = picture.id WHERE category_id = (SELECT id FROM category WHERE name_category = \"{$this->category}\") AND picture_of_category.login_id = $tmpId";
			return $this->pdo->makeConnectingToDb()->query($selectPath)->fetchAll(PDO::FETCH_ASSOC);
		}

		private function makeNameAccordingToCategory() {

			$tmpId = $this->selectIdFromLogin()[0]["id"];

			$selectName = "SELECT name FROM picture_of_category LEFT JOIN picture ON picture_id = picture.id WHERE category_id = (SELECT id FROM category WHERE name_category = \"{$this->category}\") AND picture_of_category.login_id = $tmpId";
			return $this->pdo->makeConnectingToDb()->query($selectName)->fetchAll(PDO::FETCH_ASSOC);
		}

		private function countAmountQuantityPicAccordingToCategory() {

			$tmpId = $this->selectIdFromLogin()[0]["id"];

			$countAmountPic = "SELECT COUNT(name) as amountCount FROM picture_of_category LEFT JOIN picture ON picture_id = picture.id WHERE category_id = (SELECT id FROM category WHERE name_category = \"{$this->category}\") AND picture_of_category.login_id = $tmpId";
			return $this->pdo->makeConnectingToDb()->query($countAmountPic)->fetchAll(PDO::FETCH_ASSOC);
		}

		public function getPathAccordingToCategory() {

			return $this->makePathPicturesAccordingToCategory();
		}

		public function getNameAccordingToCategory() {

			return $this->makeNameAccordingToCategory();
		}

		public function getAmountCountPicAccordingToCategory() {

			return $this->countAmountQuantityPicAccordingToCategory();
		}

	}