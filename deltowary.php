<?php
session_start();
$imie = $_SESSION['imie_klienta'];

    include 'connect.php';
    $baza = mysqli_connect($host, $db_user, $db_password, $db_name) or ('cos nie tak z polaczenie z BD');

    $zapytanie="DELETE transakcje 
    FROM transakcje 
    JOIN samochody ON samochody.id_samochodu = transakcje.samochod_id 
    JOIN klienci ON transakcje.klient_id = klienci.id_klienta 
    WHERE klienci.imie_klienta = '$imie';";
    $result = $baza->query($zapytanie) or die ('bledne zapytanie');

$baza->close();

?>
<script>
    // Funkcja do automatycznego przekierowania po załadowaniu strony
    window.onload = function() {
        setTimeout(function() {
            var redirectUrl = "strefaklienta.php"; // Ustaw adres URL docelowy
            window.location.href = redirectUrl; // Przekieruj na podany URL
        }, 2500); // Przekierowanie po 2 sekundach (2000 milisekund)
    };
</script>