<form name="mainForm" action="form.php" method="POST" enctype="multipart/form-data">
	<p>
		<b>Обработка текста:</b><br>
		<textarea name="textFromUser" rows="20" cols="100">Введите текст</textarea>
	</p>
	<p>
		<input type="hidden" name="MAX_FILE_SIZE" value="50000000">
		<b>Загрузить файлы:</b><br>
		<input type="file" name="fileFromUser"> <br><br>
		<input type="submit" name="processing" value="Обработать">
	</p>
	<p>
		<?php
			require_once "formProcessing.php";
		?>
	</p>
	<p>
		<?php
			require_once "UploadingFile.php";
		?>
	</p>
	<p>
		<a href="index.php"> На главную </a>
	</p>
	
</form>