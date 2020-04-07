<div>
	<form name="registrationForm" action="bufferProcessingRegistration.php" method="POST" enctype="multipart/form-data">
		<div>
			<b>Придумайте и введите Ваш логин:</b><br />
			<input type="text" name="insertLogin">
		</div>
		<div>
			<b>Придумайте и введите Ваш пароль:</b><br />
			<input type="password" name="insertPassword">
		</div>
		<div>
			<b>Повторите пароль:</b><br />
			<input type="password" name="repeatPassword">
		</div>
		<br />
		<div>
			<input type="submit" name="confirm" value="Зарегистрироваться">
		</div>
		<div>
			<a href="index.php">На главную</a>
		</div>
	</form>
</div>