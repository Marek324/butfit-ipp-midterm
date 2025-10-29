<?php
function validate($login, $pwd) {
	if ($login == "Marek" && $pwd == "pwd") {
		return true;
	} else {
		return false;
	}
}

session_start();

$login = $_POST["login"] ?? '';
$pwd = $_POST["password"] ?? '';

if (validate($login, $pwd)){
	$_SESSION["login"] = $login;
}

header("Location: index.php");
exit;
?>
