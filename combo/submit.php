<?php
session_start();
$dsn = "sqlite:./pdo.db";
$username = "";
$pwd = "";
$options = [
	PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
	PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
];
$pdo = new PDO($dsn, $username, $pwd, $options);

if(!isset($_SESSION['data_seeded'])){
	$pdo->exec("
		CREATE TABLE IF NOT EXISTS users (
			id INTEGER PRIMARY KEY AUTOINCREMENT,
			username TEXT NOT NULL,
			password TEXT NOT NULL,
			lang TEXT NOT NULL
		)
	");
	$popul_stmt = $pdo->prepare("INSERT INTO users (username, password, lang) VALUES (:username, :password, :lang)");
	$users = [
		['user', 'pwd', 'en'],
		['feri', 'heslo', 'cz'],
		['david', 'vyjebanypes', 'en'],
		['meno', 'heslo', 'cz']
	];
	foreach ($users as $user){
		$popul_stmt->execute([
			':username' => $user[0],
			':password' => password_hash($user[1], PASSWORD_DEFAULT),
			':lang' => $user[2]
		]);
	}
	$_SESSION['data_seeded'] = true;
}

$login = $_POST["username"] ?? '';
$pwd = $_POST["password"] ?? '';

$stmt = $pdo->prepare("SELECT username, password, lang FROM users WHERE username = ?");
$stmt->execute([$login]);
$res = $stmt->fetch();

if ($res && password_verify($pwd, $res['password'])) {
	$_SESSION['user'] = $res['username'];
	setcookie('lang', $res['lang']);
}

header("Location: index.php");
exit;
?>
