<?php

	class validateData {

		private $loginRegistry;
		private $passwordRegistry;

		function __construct ($loginOutput, $passwordOutput){

			$this->loginRegistry = htmlspecialchars($loginOutput);
			$this->passwordRegistry = htmlspecialchars($passwordOutput);
		}

		private function validatingLogin() : string{
			
			$valueLogin = trim($this->loginRegistry);
    		$valueLogin = stripslashes($this->loginRegistry);
    		$valueLogin = strip_tags($this->loginRegistry);
    		$valueLogin = htmlspecialchars($this->loginRegistry);
    		
    		return $valueLogin;
		}

		private function validatingPassword() : string {
			
			$valuePasw = trim($this->passwordRegistry);
    		$valuePasw = stripslashes($this->passwordRegistry);
    		$valuePasw = strip_tags($this->passwordRegistry);
    		$valuePasw = htmlspecialchars($this->passwordRegistry);
    		
    		return $valuePasw;
		}

		private function validatingString() : string {
			
			$valueString = trim($this->stringOutput);
    		$valueString = stripslashes($this->stringOutput);
    		$valueString = strip_tags($this->stringOutput);
    		$valueString = htmlspecialchars($this->stringOutput);
    		
    		return $valueString;
		}

		public function getValidLogin () {
			if ( mb_strlen($this->validatingLogin()) > 0 && mb_strlen($this->validatingPassword()) > 0 ){
				
				return $this->validatingLogin();
			}else if ( mb_strlen($this->validatingLogin()) == 0 && mb_strlen($this->validatingPassword()) > 0 ){
				
				ob_start();
				echo "Вы не ввели логин. Попробуйте снова. Перенаправление на страницу входа через 3 секунды.","<br>";
				header('refresh: 3; index.php');
				exit();
				ob_end_flush();
			}else if ( mb_strlen($this->validatingLogin()) == 0 && mb_strlen($this->validatingPassword()) == 0 ) {
				
				ob_start();
				echo "Вы не ввели логин и пароль. Попробуйте снова. Перенаправление на страницу входа через 3 секунды.","<br>";
				header('refresh: 3; index.php');
				exit();
				ob_end_flush();
			}
			
		}

		public function getValidPassword () {
			if ( mb_strlen($this->validatingPassword()) > 0 && mb_strlen($this->validatingLogin()) > 0 ){
				
				return $this->validatingPassword();
			}else if ( mb_strlen($this->validatingLogin()) > 0 && mb_strlen($this->validatingPassword()) == 0 ) {
				
				ob_start();
				echo "Вы не ввели пароль. Попробуйте снова. Перенаправление на страницу входа через 3 секунды.","<br>";
				header('refresh: 3; index.php');
				exit();
				ob_end_flush();
			}else if ( mb_strlen($this->validatingLogin()) == 0 && mb_strlen($this->validatingPassword()) == 0 ) {
				
				ob_start();
				echo "Вы не ввели логин и пароль. Попробуйте снова. Перенаправление на страницу входа через 3 секунды.","<br>";
				header('refresh: 3; index.php');
				exit();
				ob_end_flush();
			}
		}

		public function getValidateString($stringFromOutside) {
			$this->stringOutput = $stringFromOutside;
			return $this->validatingString();
		}
	}