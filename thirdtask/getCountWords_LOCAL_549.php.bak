<?php
<<<<<<< HEAD
	mb_internal_encoding("UTF-8"); //установка внутренней кодировки скрипта
	
=======
>>>>>>> ForCorrecting
	require_once "makeCSVFiles.php"; //создание CSV файлов

	function getCountWords ($variableFromTextArea){

		$countOfWords = 0; //переменная счетчик слов.
		$tempCountForRepeat = 0; //временная переменная счетчик для сохранения количества повторов одинаковых слов (если встретятся)
		$arrCountEntryWords = []; //массив для сохранения итогового результата
		
		settype($countOfWords, "integer");
		settype($tempCountForRepeat, "integer");
		settype($variableFromTextArea, "string");

		$TotalAmountChar = mb_strlen($variableFromTextArea);

		$arrForString = preg_split('/[\—\-\s\n\d\r\n\!\,;:.$?>"\/\«\#\%\<\(\)\»\–\_\@\+]/uis', $variableFromTextArea);

		for ($i = 0; $i < count($arrForString); $i++){

			if( isset($arrForString[$i]) && (mb_strlen($arrForString[$i]) > 0) ){ //проверка - не пуст ли элемент массива. Не пуст? - учитываем слово
				
				$countOfWords++;

				for($j = 0; $j < count($arrForString); $j++){ //подсчет количества повторений слова
					
					if ($arrForString[$i] == $arrForString[$j]){
						$tempCountForRepeat++;
						$arrCountEntryWords[$arrForString[$i]] = $tempCountForRepeat;
					}
				}
			}
			$tempCountForRepeat = 0; //обнуляем переменную для следующего элемента (следующей итерации) во внешнем цикле
		}

		$TotalAmountWords = $countOfWords;

		$arrCountEntryWords["Общее количество слов"] = $TotalAmountWords;
		$arrCountEntryWords["Общее количество символов"] = $TotalAmountChar;

		return $arr = $arrCountEntryWords;
	}