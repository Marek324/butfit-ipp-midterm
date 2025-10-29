<!DOCTYPE html>
<html>
<head></head>
<body>
	<h3>Session authentication</h3>
	<?php
	session_start();
	if (isset($_SESSION['login'])) {
	?>
		<h1>Welcome <?=$_SESSION['login']?></h1>
		<a href="logout.php"><button>Logout</button></a>
	<?php
	} else {
	?>
		<form action="submit.php" method="POST">
			<label for="login">Login:</label><br>
			<input type="text" name="login" id="login" required><br>
			<label for="password">Password:</label><br>
			<input type="password" name="password" id="password" required><br>
			<input type="submit" value="Submit">
		</form>
	<?php
	}
	?>
</body>
</html>
