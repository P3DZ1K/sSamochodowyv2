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
	<title>Rejestracja</title>
    <link rel="icon" href="./images/car.png" sizes="72x72" type="image/png">
	<link rel="stylesheet" href="./css/logowanie.css">
    <link rel="stylesheet" type="text/css" href="./css/rejestracja.css">
</head>

<body>
	
	
	
	
<div id="panel">
<div class="log_form">
                        <h2 style="text-align:center;">Rejestracja</h2>
                            <br>
<form method="post" action="check.php"> 
<label for="username">Nazwa użytkownika:</label>
<input type="text" id="username" name="imie_klienta">
<label for="password">Hasło:</label>
<input type="password" id="password" name="haslo_klienta">
<label for="password">Powtórz Hasło:</label>
<input id="password" type="password" name="repeat_pass" placeholder="">
<label for="username">Miasto:</label>
<input type="text" id="username" name="miasto_klienta">
<label for="Phone_number">Telefon:</label>
<input type="text" id="username" name="telefon_klienta">
<br>
       <div class="radio">
        <input type="radio" value="1" name="option"  checked>
        <input type="radio" value="2" name="option" >
        <input type="radio" value="3" name="option" >
    <br>
    <br>
   
    <br>
    </div>
    <div class="awatary">
        <img src="./images/awatar1.jfif" alt="avatar1">
        <img src="./images/awatar2.jfif" alt="avatar2">
        <img src="./images/awatar3.jfif" alt="avatar3">
    </div>
<div id="lower">
<input type="submit" value="Zarejestruj" id="button1">

</form>
<form action="index.php">
<a href="index.php"><button class="register">Zaloguj</button></a>
    </form>
            </div>
        </div>
  <?php
	if(isset($_SESSION['blad']))	echo $_SESSION['blad'];
?>
</div>
</div>
	


</body>
</html>