<?php
	session_start();
	unset($_COOKIE['usersLogins']);
	unset($_SESSION['login']);
?>
<head>
	<link rel="stylesheet" href="css/styleIndexPHP.css">
</head>
<body>
	<div class="fullwidth-bg">
	    <video loop muted autoplay class="fullscreen-bg__video">
	        <source src="/img/particle.mp4" type="video/mp4">
	        <source src="/img/particle.webm" type="video/webm">
	    </video>
	    <div class = "refRegistration">
	    	<a href = "registrationForm.php">Зарегистрироваться</a>
	    </div>
		<form name="mainForm" action="bufferProcessingEntry.php" method="POST" enctype="multipart/form-data">
			<div class = "windowLogin">
				<div class = "fieldLogin">
					<b>Введите логин:</b><br />
					<input type="text" name="fieldLogin">
				</div>
				<div class = "fieldPassword">
					<b>Введите пароль:</b><br />
					<input type="password" name="fieldPassword">
				</div>
				<div class = "loadingMainForm">
					<input type="submit" name="loadingMainForm" value="Войти">
				</div>
			</div>
		</form>
	
	</div>
</body>