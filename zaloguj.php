<?php

	session_start();
	
	if ((!isset($_POST['imie_klienta'])) || (!isset($_POST['haslo_klienta'])))
	{
		header('Location: index.php');
		exit();
	}

	require_once "connect.php";

	$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
	
	if ($polaczenie->connect_errno!=0)
	{
		echo "Nie działa: ".$polaczenie->connect_errno;
	}
	else
	{
		$login = $_POST['imie_klienta'];
		$haslo = $_POST['haslo_klienta'];
		
		$login = htmlentities($login, ENT_QUOTES, "UTF-8");
		$haslo = htmlentities($haslo, ENT_QUOTES, "UTF-8");
	
		if ($rezultat = @$polaczenie->query(
		sprintf("SELECT * FROM klienci WHERE imie_klienta='%s' AND haslo_klienta='%s'",
		mysqli_real_escape_string($polaczenie,$login),
		mysqli_real_escape_string($polaczenie,$haslo))))
		{
			$ilu_userow = $rezultat->num_rows;
			if($ilu_userow>0)
			{
				$_SESSION['zalogowany'] = true;
				
				$wiersz = $rezultat->fetch_assoc();
				
				$_SESSION['imie_klienta'] = $wiersz['imie_klienta'];
				
				
				unset($_SESSION['blad']);
				$rezultat->free_result();
				header('Location: menu.php');
				
			} else {
				
				$_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
				header('Location: index.php');
				
			}
			
		}
		
		$polaczenie->close();
	}
	
?>