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
		<b>СТРАНИЦА ДЕТАЛЬНОГО ПРОСМОТРА ОТДЕЛЬНОГО ИЗОБРАЖЕНИЯ</b> <br />
		для просмотра в увеличенном размере щелкните по изображению
		<div>
			<?php
				echo '<a href ="'.$_REQUEST['path'].$_REQUEST['name'].'"><img src="'.$_REQUEST['path'].$_REQUEST['name'].'" width="100" height="100" alt = "фото"></a>';
			?>
		</div>
		<div class = "backOnViewPic">
			<a href="formToLookThroughPictures.php">Вернуться на страницу просмотра изображений</a>
		</div>
		<br />
		<div>
			<?php
				require_once "classes\classConnect.php";
				require_once "classes\classAddCountView.php";

				$newConnect = new connectingToDb("logpas_fs");

				$addCount = new addQuantityCountView($_SESSION['login'], $_REQUEST['name'], $_REQUEST['path'], $newConnect);

				$addCount->updateCountView();
			?>
		</div>
		<br />
		<div>
			<?php
				echo "Количество просмотров этой фотографии: ",$addCount->getAmountQuantityView()[0]['count_view'];
			?>
		</div>
</body>
<?php
	session_write_close();
?>