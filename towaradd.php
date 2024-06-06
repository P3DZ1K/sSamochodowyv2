<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BMW</title>
    <link rel="icon" href="./images/car.png" sizes="72x72" type="image/png">
    
        <style>
            /* Resetowanie marginesów dla całej strony */
body{
 background-image: url(./images/loading.gif);
 background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
}

        </style>
</head>
<?php
session_start();

if (!isset($_SESSION['zalogowany'])) {
    header('Location: index.php');
    exit();
}

$prof = $_SESSION['imie_klienta'];

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['image'])) {
    $img = $_POST['image'];
} else {
    echo 'Brak danych do odbioru.';
    exit();
}

include 'connect.php';

$baza = new mysqli($host, $db_user, $db_password, $db_name);

if ($baza->connect_error) {
    die('Błąd połączenia z bazą danych: ' . $baza->connect_error);
}

// Przygotowanie zapytania do pobrania id klienta
$stmt = $baza->prepare("SELECT `id_klienta` FROM `klienci` WHERE `imie_klienta` = ?");
$stmt->bind_param('s', $prof);
$stmt->execute();
$stmt->bind_result($klient_id);
$stmt->fetch();
$stmt->close();

if (!$klient_id) {
    echo 'Nie znaleziono klienta.';
    $baza->close();
    exit();
}

// Przygotowanie zapytania do pobrania id samochodu
$stmt = $baza->prepare("SELECT `samochody`.`id_samochodu` FROM `samochody` JOIN `dane_samochodu` ON `dane_samochodu`.`id_dane_samochodu` = `samochody`.`id_dane_samochodu` WHERE `dane_samochodu`.`zdjecie_dane_samochodu` = ?");
$stmt->bind_param('s', $img);
$stmt->execute();
$stmt->bind_result($samochod_id);
$stmt->fetch();
$stmt->close();

if (!$samochod_id) {
    echo 'Nie znaleziono samochodu.';
    $baza->close();
    exit();
}

// Przygotowanie zapytania do wstawienia nowej transakcji
$stmt = $baza->prepare("INSERT INTO `transakcje` (`klient_id`, `samochod_id`, `data_transakcji`) VALUES (?, ?, NOW())");
$stmt->bind_param('ii', $klient_id, $samochod_id);

if ($stmt->execute()) {
    
} else {
    echo 'Błąd podczas dodawania transakcji: ' . $stmt->error;
}

$stmt->close();
$baza->close();
?>
<script>
    window.onload = function() {
        setTimeout(function() {
            var redirectUrl = "strefaklienta.php";
            window.location.href = redirectUrl;
        }, 2500);
    };
</script>
