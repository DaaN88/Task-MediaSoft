<?php
	session_start();

	echo "<b>","Ошибки:","</b>","<br>";
	
	if ($_SESSION['error'] && $_SESSION['errorBd'] == NULL){
		foreach ($_SESSION['error'] as $key => $value) {
		 	echo $value,"<br>";
		}

	}elseif($_SESSION['error'] != NULL && $_SESSION['errorBd'] != NULL){
		foreach ($_SESSION['error'] as $key => $value) {
		 	echo $value,"<br>";
		}
		echo "Ошибка выполнения запроса: ", $_SESSION['errorBd'],"<br>";

	}elseif($_SESSION['error'] == NULL && $_SESSION['errorBd'] != NULL){
		
		echo "Ошибка выполнения запроса: ", $_SESSION['errorBd'],"<br>";

	}else{
		echo "Ошибок нет","<br>";

	}

	echo "<b>","Предупреждение:","</b>","<br>";
	if ($_SESSION['warning'] && $_SESSION['goodExec'] == NULL && $_SESSION['errorBd'] == NULL){
		foreach ($_SESSION['warning'] as $key => $value) {
			echo $value, "<br>";
		}
	}elseif ($_SESSION['goodExec']){
		echo $_SESSION['goodExec'],"<br>";
	}elseif($_SESSION['warning'] && $_SESSION['errorBd'] != NULL){
		foreach ($_SESSION['warning'] as $key => $value) {
			echo $value, "<br>";
		}
	}else{
		echo "Предупреждений нет", "<br>";
	}

	unset($_SESSION['errorBd']);
	unset($_SESSION['error']);
	unset($_SESSION['goodExec']);
	unset($_SESSION['warning']);