<?php
session_start();
	require_once "classes\classConnect.php";

	class entryOnSite {

		private $login;
		private $password;
		private $pdo;

		function __construct ($loginFromOutside, $passwordFromOutside, interfaceConnectToDb $newConnect){

			$this->login = $loginFromOutside;
			$this->password = $passwordFromOutside;
			$this->pdo = $newConnect;
		}

		private function makeSelectLogin () {
			$selectLogin = "SELECT * FROM login WHERE name = "."\"{$this->login}\"";
			return $this->pdo->makeConnectingToDb()->query($selectLogin)->fetchAll(PDO::FETCH_ASSOC);
		}

		//пытаемся найти пароль в таблице password. Ищем совпадение login_id (из password) и id (из login) если name совпадает с введеным логином
		//Однозначность пароля и логина устанавливается в самой БД. Имя логина в таблице login уникально. Нельзя добавить друго юзера с таким же логином
		private function makeSelectPassword () {
			$selectPassword = "SELECT content FROM password WHERE login_id = (SELECT id FROM login WHERE name = \"{$this->login}\")";
			return $this->pdo->makeConnectingToDb()->query($selectPassword)->fetchAll(PDO::FETCH_ASSOC);
		}

		private function checkLogin () {
			if ( $this->makeSelectLogin()[0]['name'] != "" && $this->makeSelectLogin()[0]['name'] == $this->login){
				return true;
			}else{
				return false;
			}
		}

		private function checkPassword () {
			if ( password_verify($this->password, $this->makeSelectPassword()[0]['content']) ){
				return true;
			}
			else{
				return false;
			}
		}

		public function checkLoginAndPassword () {
		
			if ( $this->checkLogin() == true && $this->checkPassword() == true ) {
				
				$_SESSION['login'] = $this->login;
				ob_start();
				setcookie("usersLogins", password_hash($this->login, PASSWORD_DEFAULT), time()+7200);
				echo "Вы успешно вошли","<br>";
				echo "Перенаправление в личный кабинет через 3 секунды";
				header('refresh: 3; formPersonalAccount.php');
				ob_end_flush();

			} else {
				
				ob_start();
				echo "Не верный логин или пароль","<br>";
				echo "Перенаправление на страницу входа через 3 секунды";
				header('refresh: 3; index.php');
				ob_end_flush();
			}
		}
	}