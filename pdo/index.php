<?php

$db_file = './pdo.db';
$dsn = "sqlite:$db_file";
$username = "";
$pwd = "";
$options = array(
	PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
	PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
);

$pdo = new PDO($dsn, $username, $pwd, $options);
$pdo->exec("
	CREATE TABLE IF NOT EXISTS users (
		id INTEGER PRIMARY KEY AUTOINCREMENT,
		name TEXT NOT NULL,
		age INTEGER
	)
");

$populate_stmt = $pdo->prepare("INSERT INTO users (name, age) VALUES (:name, :age)");
$users = [
	['John Doe', 25],
	['Jane Smith', 30],
	['Bob Johnson', 35]
];
foreach ($users as $user){
	$populate_stmt->execute([
		':name' => $user[0],
		':age' => $user[1]
	]);
}

$all_users = $pdo->query("SELECT * FROM users")->fetchAll();

function allUsersTable($users){
	if (empty($users)) {
		return "<p>No data in table users</p>";
	}
	 
	$table = '<table border="1">';

	$table .= '<thead><tr>';
	foreach (array_keys($users[0]) as $key) {
		$table .= '<th>' . $key . '</th>';
	}
	$table .= '</tr></thead>';

	$table .= '<tbody>';
	foreach ($users as $row) {
		$table .= '<tr>';
		foreach ($row as $cell){
			$table .= '<td>' . $cell . '</td>';
		}
		$table .= '</tr>';
	}
	$table .= '</tbody>';

	$table .= '</table>';
	return $table;
}

$table = allUsersTable($all_users);
?>
<!DOCTYPE html>
<html>
<head></head>
<body><?= $table ?></body>
</html>
