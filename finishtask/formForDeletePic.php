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
	<form name="formDeletePicture" action="bufferProcessingDeletePic.php" method="POST" enctype="multipart/form-data">
		<div>
			<?php
				require_once "classes\classOpenPicture.php";
				require_once "classes\classConnect.php";
				require_once "classes\classAddCategoryPic.php";

				$newConnect = new connectingToDb("logpas_fs");

				$openendPic = new openPicture($_SESSION['login'], $newConnect);

				for ($i = 0; $i < $openendPic->getAmountQuantityPic()[0]['totalAmount']; $i++){
					echo '<input type="checkbox" name="'.$openendPic->getIdPic()["$i"]['id'].'" value="'.$openendPic->getPathPictureFromBd()[0]['path'].$openendPic->getNamePictureFromBd()["$i"]['name'].'"><img src="'.$openendPic->getPathPictureFromBd()[0]['path']."\\".$openendPic->getNamePictureFromBd()["$i"]['name'].'" width="100" height="100" alt = "фото"></a>';
				}
			?>
		</div>
		<br />
		<div>
			<input type="submit" name="deleteChangePic" value="Удалить выделенные изображения">
		</div>
	</form>
	<div class = "backOnPersonalAccount">
			<a href="formToLookThroughPictures.php">Вернуться на страницу просмотра изображений</a>
	</div>
</body>