<!DOCTYPE html>
<html>
<head></head>
<body>
	<h3>V jazyce PHP napište kód skriptu index.php, který ověří, zda je uživatel přihlášen (v rámci session je nastavena hodnota,,user"). V kladném případě pozdraví uživatele v jazyce nastaveném v cookies s názvem "lang" (uvažujte jazyky,,en" a,,cs"). V záporném případě zobrazí přihlašovací formulář pro vyplnění uživatelského jména a hesla a odesílacím tlačítkem, po jehož stisku se vyplněný údaj odešle na server (submit.php) vhodnou HTTP metodou.
	<br>
	V jazyce PHP napište kód skriptu submit.php, který zpracuje hodnoty z formuláře v otázce 3, pomocí PDO vyhledá v databázi uvedeného uživatele, provede a autentizaci a v kladném případě zjistí preferovaný jazyk uživatele a uloží jej do cookie s názvem ,,lang". Předpokládejte, že existuje tabulka users se sloupci username, password a lang reprezentující uživatelské jméno, heslo a preferovaný jazyk. Heslo je převedeno na hash pomocí hashovací funkce hash ($pwd)). Přístupové údaje k databázi jen naznačte. Není nutné dodržet přesně syntaxi a jména všech funkcí PDO, ale musí být zřejmé, jaké operace se provedou a s jakými parametry.</h3>
	<?php
	session_start();
	if (isset($_SESSION['user'])) {
		if (isset($_COOKIE['lang'])){
			$lang = $_COOKIE['lang'];
		} else {
			$lang = 'en';
		}
	?>
		<h1><?= $lang == 'en' ? 'Welcome' : 'Vitej'?> <?=$_SESSION['user']?></h1>
		<a href="logout.php"><button>Logout</button></a>
	<?php
	} else {
	?>
		<form action="submit.php" method="POST">
			<label for="username">Username:</label><br>
			<input type="text" name="username" id="username" required><br>
			<label for="password">Password:</label><br>
			<input type="password" name="password" id="password" required><br>
			<input type="submit" value="Submit">
		</form>
	<?php
	}
	?>
</body>
</html>
