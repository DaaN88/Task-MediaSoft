<?php
<<<<<<< HEAD
	mb_internal_encoding("UTF-8");

	require_once ".\DataBase\connectToDB.php";

	function insertInDB($data, $arrayWithData){

		$bolValidId = false; //флаг для проверки на введение дубликатов в таблицу word
		$date = date("Y-m-d"); //текущая дата
=======
	session_start();

	require_once "connectToDB.php";

	function insertInDB($data, $arrayWithData){

		$pdo = connectToDataBase();

		$pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$bolValidId = false; //флаг для проверки на введение дубликатов в таблицу word
		$date = date("Y-m-d H:i:s"); //текущая дата
>>>>>>> ForCorrecting

		$totalAmountWords = $arrayWithData["Общее количество слов"];
		settype($totalAmountWords, "integer");

<<<<<<< HEAD
		if ( connectToDataBase() ){
			$pdo = connectToDataBase();
		} else{
			echo "Ошибка: не удалось соединиться с БД";
			exit();
		}

=======
>>>>>>> ForCorrecting
		//добавляем в таблицу uploaded_text текст из textarea
		try{
			$insertQuery = 'INSERT INTO uploaded_text(content, date, words_count) VALUES (?,?,?)';
			$statement = $pdo->prepare($insertQuery);
			
			$success = $statement->execute([
				$pdo->quote($data),
				$date,
				$totalAmountWords
			]);

		}catch(PDOException $e) {
			$bolValidId = true; //устанавливаем флаг в истину, тем самым блокируем дублирование слов в таблицу word
<<<<<<< HEAD
			echo "Ошибка выполнения запроса: ".$e->getMessage()."<br>";
			exit();
		}
		
=======
			$_SESSION['errorBd'] = $e->getMessage();
		}
>>>>>>> ForCorrecting

		//получаем id из uploaded_text для добавление в text_id в word
		try{
			
			$tmpData[] = "%$data%";
			$selectQueryIdWithUploadedText = "SELECT id FROM uploaded_text WHERE content LIKE ?";
			$idWithUploadedText = $pdo->prepare($selectQueryIdWithUploadedText);
			$idWithUploadedText->execute($tmpData);
			$resId = $idWithUploadedText->fetchAll();
			
		}catch(PDOException $e) {
<<<<<<< HEAD
			echo "Ошибка выполнения запроса: ".$e->getMessage();
			exit();
=======
			//echo "Ошибка выполнения запроса: ".$e->getMessage();
			//exit();
>>>>>>> ForCorrecting
		}

		$tmpResId = $resId[0]['id'];

		// в данном блоке if - если $bolValidId в "истине", то в таблице word есть text_id равный id из таблицы uploaded_text
		// тогда - блокируем запись в таблицу word
		if ($bolValidId){
<<<<<<< HEAD
			echo "Данные уже введены"."<br>";
=======
			//echo "Данные уже введены"."<br>";
>>>>>>> ForCorrecting
		}else{
			
			$insertQueryInWord = 'INSERT INTO word(text_id, word, count) VALUES (?,?,?)';
			$statementInWord = $pdo->prepare($insertQueryInWord);

			foreach ($arrayWithData as $key => $value) {
				if ($key != "Общее количество слов" && $key != "Общее количество символов"){
					$statementInWord->execute([
						$tmpResId,
						$key,
						$value
					]);
				}	
			}
		}
	}