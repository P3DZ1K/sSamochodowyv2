<?php
session_start();
require_once "connect.php";

if (!isset($_POST['login']) || !isset($_POST['haslo'])) {
    header('Location: menu.php');
    exit();
}

// Nawiązanie połączenia z bazą danych
$polaczenie = mysqli_connect($serwer, $uzytkownik, $haslo, $baza_danych);

if ($polaczenie->connect_errno != 0) {
    echo "Error: " . $polaczenie->connect_errno;
} else {
    $login = $_POST['login'];
    $haslo = $_POST['haslo'];
    
    $login = htmlentities($login, ENT_QUOTES, "UTF-8");
    $haslo = htmlentities($haslo, ENT_QUOTES, "UTF-8");
    
    if ($rezultat = $polaczenie->query(
        sprintf("SELECT * FROM uzytkownicy WHERE user='%s' AND pass='%s'",
        mysqli_real_escape_string($polaczenie, $login),
        mysqli_real_escape_string($polaczenie, $haslo))
    )) {
        $ilu_userow = $rezultat->num_rows;
        if ($ilu_userow > 0) {
            $_SESSION['zalogowany'] = true;
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
