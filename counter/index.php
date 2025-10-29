<!DOCTYPE html>
<html>
<head></head>
<body>
<?php
// a dalej neviem :D
if (isset($_COOKIE["counter"])) {
	$count = $_COOKIE["counter"];
} else {
	$count = 0;
}
$count++;
setcookie("counter", $count);
?>
<p><?= $count ?>
</body>
</html>

