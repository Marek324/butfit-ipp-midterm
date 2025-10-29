<!DOCTYPE html>
<html>
<head></head>
<body>
	<h3>Evaluate if user is an adult.</h3>
	<form action="<?= $_SERVER['PHP_SELF'] ?>" method="GET">
		<label for="age">Age:</label><br>
		<input type="number" id="age" name="age" required><br>
		<input type="radio" id="male" name="sex" value="male" required>
		<label for="male">Male</label><br>
		<input type="radio" id="female" name="sex" value="female">
		<label for="female">Female</label><br>
		<input type="submit" value="Submit"/><br>
	</form>
<?php
if (isset($_GET["age"])){
	$age = $_GET["age"];
	if ($age >= 18) {
	?>
		<p>Age check: OK.</p>
	<?php
	} else {
	?>
		<p>Age check: You are not old enough!</p>
	<?php
	}
}
?>
</body>
</html>
