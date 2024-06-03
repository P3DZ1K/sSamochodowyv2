<?php
session_start();
$imie = $_SESSION['imie_klienta'];

require_once "funkcjasu.php";
include 'connect.php';
$pu = $_SESSION['pu_klienta'];

// Połączenie z bazą danych
$baza = mysqli_connect($host, $db_user, $db_password, $db_name) or die(mysqli_connect_error());

// Sprawdzanie czy użytkownik jest administratorem
if(isset($pu) && $pu == 1){
    // Administrator - wyświetla wszystkie transakcje
    $zapytanie = "SELECT transakcje.id, klienci.imie_klienta, samochody.model_samochodu, transakcje.data_transakcji 
                  FROM transakcje 
                  JOIN klienci ON transakcje.klient_id = klienci.id_klienta 
                  JOIN samochody ON transakcje.samochod_id = samochody.id_samochodu;";
} else {
    // Zwykły użytkownik - wyświetla swoje transakcje
    $zapytanie = "SELECT transakcje.id, klienci.imie_klienta, samochody.model_samochodu, transakcje.data_transakcji 
                  FROM transakcje 
                  JOIN klienci ON transakcje.klient_id = klienci.id_klienta 
                  JOIN samochody ON transakcje.samochod_id = samochody.id_samochodu 
                  WHERE klienci.imie_klienta = '$imie';";
}

$result = $baza->query($zapytanie) or die(mysqli_error($baza));

?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Transaction List</title>
    <link rel="stylesheet" type="text/css" href="./css/koszyk.css">
</head>
<body>

<table id="tabklienci">
    <thead>
        <tr>
            <th>Lp.</th>
            <th>name</th>
            <th>Car</th>
            <th>Date</th>
            <th>Remove</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $n = 0;

        // Sprawdzanie czy są wyniki do wyświetlenia
        if ($result->num_rows > 0) {
            while ($wiersz = $result->fetch_assoc()) {
                $n++;
                echo "<tr>";
                echo "<td>" . $n . "</td>";
                echo "<td>" . $wiersz['imie_klienta'] . "</td>";
                echo "<td>" . $wiersz['model_samochodu'] . "</td>";
                echo "<td>" . $wiersz['data_transakcji'] . "</td>";
                echo "<td><a href='deltowary.php?nr=".$wiersz['id']."'><button>X</button></a></td>";
                echo "</tr>";
                
            }
        }
        
        // Zamykanie połączenia z bazą danych
        $baza->close();
        ?>
    </tbody>
</table>

</body>
</html>
