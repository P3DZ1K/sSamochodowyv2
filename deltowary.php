<link rel="icon" href="./images/car.png" sizes="72x72" type="image/png">
<title>BMW</title>
<style>
            /* Resetowanie marginesów dla całej strony */
body{
 background-image: url(./images/udaloSie.gif);
 background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
}

        </style>
<?php
session_start();

if (isset($_GET['nr'])) {
    $nr = $_GET['nr'];

    include 'connect.php';
    $baza = mysqli_connect($host, $db_user, $db_password, $db_name) or die('cos nie tak z polaczenie z BD');

    
        $zapytanie = "DELETE FROM transakcje USING transakcje JOIN samochody ON samochody.id_samochodu = transakcje.samochod_id JOIN klienci ON transakcje.klient_id = klienci.id_klienta WHERE transakcje.id = '$nr'";
        $result = $baza->query($zapytanie) or die('bledne zapytanie');
    

    $baza->close();
} else {
    die('Nie podano imienia klienta');
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Przekierowanie</title>
    <style>
        /* Resetowanie marginesów dla całej strony */
        body {
            background-image: url(./images/udaloSie.gif);
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 100% 100%;
        }
    </style>
</head>
<body>
    <script>
        // Funkcja do automatycznego przekierowania po załadowaniu strony
        window.onload = function() {
            setTimeout(function() {
                var redirectUrl = "strefaklienta.php"; // Ustaw adres URL docelowy
                window.location.href = redirectUrl; // Przekieruj na podany URL
            }, 2500); // Przekierowanie po 2,5 sekundach (2500 milisekund)
        };
    </script>
</body>
</html>
