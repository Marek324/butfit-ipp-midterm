<!DOCTYPE html>
<html>
<head></head>
<body>
	<form action="<?= $_SERVER['PHP_SELF'] ?>" method="GET">
		<label for="age">age</label>
		<input type="text" id="age" name="age">
		<input type="radio" id="male" name="sex" value="male">
		<label for="male">male</label>
		<input type="radio" id="female" name="sex" value="female">
		<label for="female">female</label>
		<input type="submit" value="submit"/> 
	</form>
<?php
if (isset($_GET["age"])){
	$age = $_GET["age"];
	if ($age >= 18) {
	?>
		<h3>You are adult.</h3>
	<?php
	} else {
	?>
		<h3>You are not old enough!</h3>
	<?php
	}
}
?>
</body>
</html>
