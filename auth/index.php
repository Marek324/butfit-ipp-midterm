<!DOCTYPE html>
<html>
<head></head>
<body>
	<?php
	session_start();
	if (isset($_SESSION['login'])) {
	?>
		<h1>Welcome <?=$_SESSION['login']?></h1>
	<?php
	} else {
	?>
<form action="submit.php" method="POST">
			<label for="login">login</label>
			<input type="text" name="login" id="login" required>
			<label for="password">password</label>
			<input type="text" name="password" id="password" required>
			<input type="submit" value="submit">
		</form>
		
	<?php
	}
	?>
</body>
</html>
