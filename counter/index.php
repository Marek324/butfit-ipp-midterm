<!DOCTYPE html>
<html>
<head></head>
<body>
	<h3>Cookies visit counter</h3>

	<?php
	if (isset($_COOKIE["counter"])) {
		$count = $_COOKIE["counter"];
	} else {
		$count = 0;
	}
	$count++;
	setcookie("counter", $count);
	?>

	<p>Count: <?= $count ?>
</body>
</html>

