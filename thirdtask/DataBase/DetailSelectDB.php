<?php
	
	require_once "connectToDB.php";
	
	function getDetailSelectWordDB($a){

		$pdo = connectToDataBase();

		try{
			$selectQueryWord = "SELECT * FROM word WHERE text_id ="."{$a}";
			$printSelectWord = $pdo->query($selectQueryWord)->fetchAll(PDO::FETCH_ASSOC);
		}catch(PDOException $e){
			echo "Ошибка выполнения запроса: ".$e->getMessage()."<br>";
			exit();
		}

		echo"<p>";
			echo"<table>";
				echo"<tr>";
					echo"<td>";
						echo "id";
					echo"</td>";
					echo"<td>";
						echo "text_id";
					echo"</td>";
					echo"<td>";
						echo "word";
					echo"</td>";
					echo"<td>";
						echo "count";
					echo"</td>";
				echo"</tr>";
				echo"<tr>";
					echo"<td>";
						foreach ($printSelectWord as $key => $value){
							echo $printSelectWord[$key]['id'];
							echo "<br>";
						}
					echo"</td>";
					echo"<td>";
						foreach ($printSelectWord as $key => $value){
							echo $printSelectWord[$key]['text_id'];
							echo "<br>";
						}
					echo"</td>";
					echo"<td>";
						foreach ($printSelectWord as $key => $value){
							echo $printSelectWord[$key]['word'];
							echo "<br>";
						}
					echo"</td>";
					echo"<td>";
						foreach ($printSelectWord as $key => $value){
							echo $printSelectWord[$key]['count'];
							echo "<br>";
						}
					echo"</td>";
				echo"</tr>";
			echo"</table>";
		echo"</p>";

	}

	getDetailSelectWordDB( htmlspecialchars($_REQUEST['id']) );