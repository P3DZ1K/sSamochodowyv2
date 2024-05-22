<?php
$imie = $_SESSION['imie_klienta'];
include 'connect.php'; // Załóżmy, że w pliku connect.php masz zdefiniowane zmienne $host, $db_user, $db_password, $db_name dla połączenia z bazą danych.

// Nawiązanie połączenia z bazą danych
$baza = mysqli_connect($host, $db_user, $db_password, $db_name) or die('Cos nie tak z połączeniem z BD');

// Zapytanie SQL
$zapytanie = "SELECT pu_klienta FROM klienci WHERE imie_klienta = '$imie'";
$result = $baza->query($zapytanie) or die('Błędne zapytanie: ' . $baza->error);

// Sprawdzenie, czy wyniki zostały znalezione
if ($result->num_rows > 0) {
    // Pobranie pierwszego wiersza wyników
    $row = $result->fetch_assoc();
    
    // Pobranie wartości 'pu_klienta' z wiersza wyników
    $pu_klienta = $row['pu_klienta'];
    
    // Przypisanie wartości 'pu_klienta' do sesji
    $_SESSION['pu_klienta'] = $pu_klienta;
    
    // Wyświetlanie wartości 'pu_klienta'
} else {
    echo "Brak wyników dla zapytania.";
}

