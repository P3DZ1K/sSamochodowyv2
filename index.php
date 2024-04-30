<?php

	session_start();
	
	if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
	{
		header('Location: menu.php');
		exit();
	}

?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Osadnicy - gra przeglądarkowa</title>
	<link rel="stylesheet" href="./css/logowanie.css">
</head>

<body>
	
	
	
	
<div id="panel">
<form method="post" action="zaloguj.php" action="profil.php"> 
<label for="username">Nazwa użytkownika:</label>
<input type="text" id="username" name="imie_klienta">
<label for="password">Hasło:</label>
<input type="password" id="password" name="haslo_klienta">
<div id="lower">
<input type="checkbox"><label class="check" for="checkbox">Zapamiętaj mnie!</label>
<input type="submit" value="Login">
</form>
<form method="post" action="rejestracja.php"> 

  <button class="register">
  Register
  </button>
  <?php
	if(isset($_SESSION['blad']))	echo $_SESSION['blad'];
?>
</form>
</div>
</div>
	


</body>
</html>