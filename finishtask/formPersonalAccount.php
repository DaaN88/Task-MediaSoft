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
	<link rel="stylesheet" href="css/styleFormPHP.css">
</head>
<body>
	<div clas = "information">
		<?php
			echo "Здравствуйте, {$_SESSION['login']}!";
		?>
	</div>
	<div class = "formUploading">
		<form name="formUploadingPicture" action="bufferProcessingUpldPict.php" method="POST" enctype="multipart/form-data">
			<div class = "buttonUploadFiles">
				<b>Выберите и загрузите изображения:</b><br />
				<input type="file" name="uploading[]" multiple>
			</div>
			<div class = "buttonSubmit">
				<input type="submit" name="executeUploading" value="Загрузить">
			</div>
			<div class = "selectCategory">
				<b>Выберите категорию куда сохранить изображения:</b><br/>
				<select name = "categoryForPic" size = 1>
					<option disabled>Выберите категорию для сохранения изображения</option>
					<option value = "Несортированное">Несортированное</option>
					<option value = "Домашнее фото">Домашнее фото</option>
					<option value = "Фото с работы">Фото с работы</option>
					<option value = "Фото с друзьями">Фото с друзьями</option>
					<option value = "Документы">Документы</option>
				</select>
			</div>
			<br/>
			<div class = "uploadedPictures">
				<?php
					require_once "classes\classOpenPicture.php";
					require_once "classes\classConnect.php";
					require_once "classes\classMakeDirForPicture.php";

					$checkPathDirForUser = new makeDirForPicture($_SESSION['login'], $_FILES['uploading']);
					$newConnect = new connectingToDb("logpas_fs");
					$openendPic = new openPicture($_SESSION['login'], $newConnect);

					if ( file_exists($checkPathDirForUser->getPathToDirWithPicUser() ) ) {
						
						//подсчитываем количество картинок в папке пользователя для цикла for (цикл выводит все изображения)
						$calculationOfQuantityPic = new FilesystemIterator($checkPathDirForUser->getPathToDirWithPicUser(), FilesystemIterator::SKIP_DOTS);
						$amountCountPic = iterator_count($calculationOfQuantityPic);
						
						for ($i = 0; $i < $amountCountPic; $i++){
							echo '<img src="'.$openendPic->getPathPictureFromBd()[0]['path']."\\".$openendPic->getNamePictureFromBd()["$i"]['name'].'" width="100" height="100" alt="Лого">';
							//echo "<p>";
							echo '<figcaption>'.$openendPic->getNamePictureFromBd()["$i"]['name'].'</figcaption>';
							//echo "</p>";
						}

					} else {
						
						echo "Ни один файл не загружен","<br /";
					}
				?>
			</div>
		</form>
	</div>
	<div class = "refs">
		<p>
			<a href = "index.php"> Выход из личного кабинета </a>
			<a href = "formToLookThroughPictures.php"> Просмотреть изображения по категориям </a>
		</p>
	</div>
</body>
<?php
	session_write_close();
?>