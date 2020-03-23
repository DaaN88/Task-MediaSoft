<?php
session_start();
	if ($_COOKIE['usersLogins'] == ""){
		ob_start();
		echo "Пожалуйста, перезайдите.";
		header('refresh: 2; index.php');
		exit();
		ob_end_flush();
	}
?>
<head>
</head>
<body>
	<form name="formNavigatePicture" action="" method="POST" enctype="multipart/form-data">
		<div class = "navigateForCategory">
			<b>Выберите категорию для изображения:</b><br/>
				<select name = "navigateCategoryPic" size = 1>
					<option disabled>Выберите категорию для просмотра изображений</option>
					<option value = "Несортированное">Несортированное</option>
					<option value = "Домашнее фото">Домашнее фото</option>
					<option value = "Фото с работы">Фото с работы</option>
					<option value = "Фото с друзьями">Фото с друзьями</option>
					<option value = "Документы">Документы</option>
				</select>
		</div>
		<br />
		<div>
			<input type="submit" name="toFilter" value="Отфильтровать по категориям">
		</div>
		<br />
		<div>
			<?php
				require_once "classes\classNavigateForCategoryPic.php";
				require_once "classes\classConnect.php";
				
				$newConnect = new connectingToDb("logpas_fs");

				$pathToPic = new navigateForCategoryPicture($_SESSION['login'], $_POST['navigateCategoryPic'], $newConnect);

				for ($i = 0; $i < $pathToPic->getAmountCountPicAccordingToCategory()[0]['amountCount']; $i++){
					
					$tmpStr = strval($pathToPic->getPathAccordingToCategory()[0]['path']);
					
					echo "<a href = \"formDetailLookPic.php?path={$tmpStr}&name={$pathToPic->getNameAccordingToCategory()["$i"]['name']}\">".'<img src="'.$pathToPic->getPathAccordingToCategory()[0]['path'].$pathToPic->getNameAccordingToCategory()["$i"]['name'].'" width="100" height="100" alt = "фото">'."</a>";
				}
			?>
		</div>
	</form>
	<br />
	<div>
		<button>
			<a href="formForDeletePic.php">Перейти к удалению изображений</a>
		</button>
	</div>
	<br />
	<div class = "backOnPersonalAccount">
			<a href="formPersonalAccount.php">Вернуться на главную страницу личного кабинета</a>
	</div>
</body>
<?php
	session_write_close();
?>