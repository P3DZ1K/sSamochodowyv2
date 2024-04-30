<h3>lista klientów</h3>
<table class="table table-condensed">
  
  <thead>
    <tr>
    <th>Lp.</th> <th>Imię</th> <th>Nazwisko</th> <th>Miasto</th> <th>Telefon</th> <th>email</th> 
    </tr>
  </thead>

  <tbody>
<?php
require_once "connect.php";

// Nawiązanie połączenia z bazą danych
$polaczenie = mysqli_connect($host, $db_user, $db_password, $db_name);

// Sprawdzenie połączenia
if (!$polaczenie) {
    die("Błąd połączenia z bazą danych: " . mysqli_connect_error());
}



// Tutaj możesz wykonywać operacje na bazie danych

// Przykładowe zapytanie SQL
$sql = "SELECT id_klienta, imie_klienta, nazwisko_klienta, miasto_klienta, telefon_klienta, email_klienta FROM klienci;";

// Wykonanie zapytania
$wynik = mysqli_query($polaczenie, $sql);

// Sprawdzenie, czy zapytanie zostało wykonane poprawnie
if (!$wynik) {
    die("Błąd zapytania SQL: " . mysqli_error($polaczenie));
}

$idd=0;
// Przetwarzanie wyników zapytania
while ($row = mysqli_fetch_assoc($wynik)) {
    // Tutaj możesz wykonywać operacje na danych, na przykład:
    $idd++;
    echo "<tr><td> " . $idd . "</td><td>" . $row['imie_klienta'] . "</td><td>" . $row['nazwisko_klienta'] ."</td><td>". $row["miasto_klienta"]."</td><td>" . $row['telefon_klienta'] . "</td><td>" . $row['email_klienta'] . "</td></tr>";
}
// Zamknięcie połączenia
mysqli_close($polaczenie);
?>