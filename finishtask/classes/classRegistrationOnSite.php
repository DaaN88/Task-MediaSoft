<?php
	
	require_once "classes\classConnect.php";

	class registrationOnSite {

		private $newLogin;
		private $newPassword;
		private $repeatNewPassword;
		private $pdo;

		function __construct ($inputLogin, $inputPassword, $inputRepeatPassword, interfaceConnectToDb $newConnect){

			$this->newLogin = $inputLogin;
			$this->newPassword = $inputPassword;
			$this->repeatNewPassword = $inputRepeatPassword;
			$this->pdo = $newConnect;
		}

		//вставка в БД нового логина
		private function insertLoginNewUser () {

			$date = date("Y-m-d H:i:s");
				
			$insertQuery = 'INSERT INTO login(name, date) VALUES (?,?)';
			$statement = $this->pdo->makeConnectingToDb()->prepare($insertQuery);
				
			$statement->execute([
				$this->newLogin,
				$date
			]);
		}

		//проводим выборку id у введенного нового логина; передаем этот id в функции вставки в БД нового пароля (insertPasswordNewUser)
		private function selectIdFromLogin () {
			
			$selectQueryId = "SELECT id FROM login WHERE name = ?";
			$statementId = $this->pdo->makeConnectingToDb()->prepare($selectQueryId);

			$statementId->execute([
				$this->newLogin
			]);

			return $statementId->fetchAll(PDO::FETCH_ASSOC);
		}

		//вставка в БД нового пароля; пароль соответствует введенному логину за счет проверки и получания id нового введенного логина
		private function insertPasswordNewUser () {

			$datePasw = date("Y-m-d H:i:s");

			$options = [
			    'cost' => 12,
			];
			
			$idFromLogin = $this->selectIdFromLogin();

			$insertQueryPasw = 'INSERT INTO password(content, login_id, date) VALUES (?,?,?)';
			$statementPasw = $this->pdo->makeConnectingToDb()->prepare($insertQueryPasw);
				
			$statementPasw->execute([
				password_hash(strval($this->newPassword), PASSWORD_BCRYPT, $options),
				intval($idFromLogin[0]['id']),
				$datePasw
				]);
		}

		private function checkEntredPasswords() {
			if ($this->newPassword !== $this->repeatNewPassword){
				ob_start();
				echo "Введеные пароли не совпадают. Попробуйте еще раз","<br>";
				header('refresh: 2; registrationForm.php');
				exit();
				ob_end_flush();
			}
		}

		public function makeInsertLoginNewUser () {
			$this->insertLoginNewUser();
		}

		public function makeInsertPasswordNewUser () {
			$this->insertPasswordNewUser();
		}

		public function getCheckEntredPasswords() {
			$this->checkEntredPasswords();
		}
	}