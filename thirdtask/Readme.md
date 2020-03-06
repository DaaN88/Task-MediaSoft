Третье задание. Вторая группа. Шведов Антон <br>
Windows 10, Open Server 5.2.2 <br>

 Инструкция по запуску: <br>
	1). Скопировать директорию thirdtask полностью;
 	2). В настройках Open Server добавить domain - thirdtask. Теперь проект можно открыть в браузере по ссылке http://secondtask;
 	3). Логика работы проекта выполнена в соответствии с заданием;
 	4). Папка csv_file содержит отчеты в формате csv. Открывать в Microsoft Excel или аналоге. Разделитель - ";". 
Папка создается автоматически;
 	5). Папка uploads автоматически не создается. Содержит загруженные файлы. Разрешена загрузка только txt-файлов;
	6). В папке DataBase лежат файлы отвечающие за логику работы с БД;
	7). в папке bdDump лежит дамп базы данных в формате .sql;

 Структура проекта:
	1). Главная страница - index.php (содержит одну кнопку "Загрузить" и таблицу для вывода результата обработки текста);
	2). К index.php подключается из папки DataBase файл selectDB.php. В selectDB.php осуществляется выбор всех строк из таблицы 
uploaded_text БД ms_bd. Функция возвращает массив данных из БД, который и разбирается в index.php;
	3). К файлу selectDB.php из той же папки подключается файл connectToDB.php. В connectToDB.php осуществляется подключение к
базе данных. В случае неудачи будет выведена ошибка и скрипт остановлен;
	4). В index.php в таблице, в столбце content осуществляется оформление строки как ссылки, которая ведет на страницу 
DetailSelectDB.php (страница детального результата анализа текста).
В файл DetailSelectDB.php передается id из таблицы uploaded_text БД ms_bd для выбора данных (text_id равен id из uploaded_text) из таблицы word
и формируется таблица с данными из word БД ms_bd;
	4). Заполнение базы данных:
	 4.1). После нажатия кнопки Загрузить на index.php происходит перенаправление на form.php.
	 4.2). В form.php оформлена форма загрузки текста как напрямую (textarea) так и посредством загрузки файла .txt;
	 4.3). При нажатии кнопки Обработать в form.php запускаются (в зависимости что заполнено) два файла formProcessing.php и/или
UploadingFile.php;
	 4.4). В formProcessing.php происходит обработка текста из textarea, формирование csv файла-отчета, добавление в БД ms_bd и редирект на index.php;
	 4.5). В UploadingFiles.php происходит обработка файла с текстом, формирование csv файла-отчета, добавление в БД ms_bd и редирект на index.php;
	 4.6). В основе своей (непосредство разбор текста и подсчет слов и количества вхождений) formProcessing.php и
UploadingFiles.php используют файл GetCountWords.php;
	 4.7). Добавление в базу данных осуществляет файл insertDB.php в папке DataBase;
	 4.8). processingUploadingFiles.php осуществляет непосредственную загрузку файла. Подключен к UploadingFiles.php;
	 4.9). После как файл проходит валидацию в validateDataFiles.php, validateDataFiles.php возвращает файл в UploadingFiles.php в
котором в свою очередь осуществляется вызов функции из processingUploadingFiles.php для загрузки файла;
	 4.10). validateDataPOST.php осуществляет проверку текста из textarea. Результат работы возвращается в formProcessing.php;
	 4.11). makeCSVFiles.php и makeDirAndMove.php отвечают за csv файлы и директорию csv_file соответственно;
	 4.12). функция из makeCSVFiles.php используется в файлах formProcessing.php и processingUploadingFiles.php;
	 4.13). Функция из makeDirAndMove.php вызывается только в makeCSVFiles.php;