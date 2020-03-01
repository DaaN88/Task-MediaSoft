<?php
	mb_internal_encoding("UTF-8"); //установка внутренней кодировки скрипта
	$countOfWords = 0; //переменная счетчик слов.
	$tempCount = 0; //временная переменная счетчик для сохранения количества повторов одинаковых слов (если встретятся)
	$arrCountEntryWords = [];
	//строка согласно задания. 10 предложений (два предложения повторяются).
	$stringWithText = "Аксиома силлогизма, по определению, представляет собой неоднозначный предмет деятельности. Сомнение рефлектирует естественный закон исключённого третьего. Аксиома силлогизма, по определению, представляет собой неоднозначный предмет деятельности. Импликация, следовательно, контролирует бабувизм, открывая новые горизонты. Надстройка нетривиальна. Смысл жизни, следовательно, творит данный закон внешнего мира. Дедуктивный метод решительно представляет собой бабувизм. Отсюда естественно следует, что автоматизация дискредитирует предмет деятельности. Надстройка нетривиальна. Дискретность амбивалентно транспонирует гравитационный парадокс.";
	//echo "$stringWithText".PHP_EOL;

	echo "Общее количество символов в строке: ".mb_strlen($stringWithText).PHP_EOL; //получаем общее количество символов (с учетом пробелов, точек и т.п.)

	$arrForString = preg_split("/[\s,.!]+/", $stringWithText); //преобразуем строку в массив слов по регулярному выражению (первый параметр функции preg_split)
	//print_r($arrForString);
	
	//Используется вложенный цикл. Первый цикл for получается первый элемент массива $arrForString (первое слово). В следующем блоке if происходит проверка,
	//что элемент массива не пустой и длина элемента (строки) больше 0. Если условие соблюдено увеличиваем переменную #countOfWords - тем самым осуществляем 
	//подсчет количества слов. Функция preg_split последнюю точку принимает как пустую строку, поэтому и потребовался этот блок if.
	//Вложенный цикл также итерирует все элементы массива $arrForString и в блоке if сравнивается первый элемент (слово) из внешнего цикла со всеми остальными
	//элементами (словами) массива $arrForString. Тем самамым, если встречается совпадаение, то увеличиваем на 1 переменную $tempCount.
	//После увеличения переменной $tempCount записываем элемент массива $arrForString как key в новый массив $arrCountEntryWords а $tempCount как value
	//массива $arrCountEntryWords. Сложность - О(n^2).
	for ($i = 0; $i < count($arrForString); $i++){
		if( isset($arrForString[$i]) && (mb_strlen($arrForString[$i]) > 0) ){
			$countOfWords++;
			for($j = 0; $j < count($arrForString); $j++){
				if ($arrForString[$i] == $arrForString[$j]){
					$tempCount++;
					$arrCountEntryWords[$arrForString[$i]] = $tempCount;
				}
			}
		}
		$tempCount = 0; //обнуляем переменную для следующего элемента во внешнем цикле
	}

	echo "Общее количество слов: ".$countOfWords.PHP_EOL.PHP_EOL;

	echo "Количество вхождений".PHP_EOL.PHP_EOL;
	foreach ($arrCountEntryWords as $key => $value) {
		echo "{$key} : {$value}". PHP_EOL;
	}
?>