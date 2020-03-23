<?php
	session_start();

	require_once ".\DataBase\selectDB.php";
	$printSelectUploadedText = selectFromDataBase();
?>
<!-- Таблица для оформления вывода результата -->
<form name="mainForm" action="form.php" method="POST" enctype="multipart/form-data">
<p>
	<input type="submit" name="loadingForm" value="Загрузить">
</p>
<p>
	<table>
		<tr>
			<td>
				id
			</td>
			<td>
				Content
			</td>
			<td>
				Date
			</td>
		</tr>
		<tr>
			<td>
				<?php
					foreach ($printSelectUploadedText as $key => $value){
						echo $printSelectUploadedText[$key]['id'];
						echo "<br>";
					}
				?>
			</td>
			<td>
				<?php
					if ($printSelectUploadedText[0]['content'] == ""){
						echo "База данных пуста";
					}else{
						foreach ($printSelectUploadedText as $key => $value){
							$tmp = $printSelectUploadedText[$key]['id'];
							echo "<a href=\"DataBase\DetailSelectDB.php?id=$tmp\">".mb_strimwidth( $printSelectUploadedText[$key]['content'], 0, 50, "..." )."</a>";
							echo "<br>";
						}
					}
				?>
			</td>
			<td>
				<?php
					foreach ($printSelectUploadedText as $key => $value){
						echo $printSelectUploadedText[$key]['date'];
						echo "<br>";
					}
				?>
			</td>
		</tr>
	</table>
</p>
<p>
	<?php
	require_once "processingErrors.php";
	?>
</p>