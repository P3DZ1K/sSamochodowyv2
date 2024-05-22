<style>
    /* Stylizacja tabeli */
    table {
        width: 100%;
        border-collapse: collapse;
        border: 2px solid #ddd;
    }

    th, td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #f2f2f2;
    }

    /* Stylizacja nagłówka */
    th:first-child, td:first-child {
        border-left: none;
    }

    th:last-child, td:last-child {
        border-right: none;
    }
</style>

<table id="tabklienci">
  
  <thead>
    <tr>
    <th>Lp.</th> <th>Imię</th> <th>samochód</th> <th>Data</th> <th>Usuń</th> 
    </tr>
  </thead>

  <tbody>

  <?php
session_start();
$imie = $_SESSION['imie_klienta'];

require_once "funkcjasu.php";
include 'connect.php';
$pu = $_SESSION['pu_klienta'];
// Połączenie z bazą danych
$baza = mysqli_connect($host, $db_user, $db_password, $db_name) or die(mysqli_connect_error());

if(isset($_SESSION['pu_klienta']) && ($_SESSION['imie_klienta']) && ($_SESSION['pu_klienta']==1)){
    $zapytanie1 = "SELECT imie_klienta FROM klienci";
    $result1 = $baza->query($zapytanie1) or die(mysqli_error($baza));
    
    // Zapytanie o modele samochodów
    $zapytanie2 = "SELECT samochody.model_samochodu FROM samochody JOIN transakcje ON samochody.id_samochodu = transakcje.samochod_id JOIN klienci ON transakcje.klient_id = klienci.id_klienta;";
    $result2 = $baza->query($zapytanie2) or die(mysqli_error($baza));
    
    // Zapytanie o date transakcji
    $zapytanie3 = "SELECT transakcje.data_transakcji FROM samochody JOIN transakcje ON samochody.id_samochodu = transakcje.samochod_id JOIN klienci ON transakcje.klient_id = klienci.id_klienta;";
    $result3 = $baza->query($zapytanie3) or die(mysqli_error($baza));
    
    $n = 0;
    
    // Sprawdzanie czy są wyniki do wyświetlenia
    if ($result1->num_rows > 0 && $result2->num_rows > 0) {
        while ($wiersz1 = $result1->fetch_assoc() and $wiersz2 = $result2->fetch_assoc() and $wiersz3 = $result3->fetch_assoc()) {
            $n++;
    
            echo "<tr><td>" . $n . "</td><td>" . $wiersz1['imie_klienta'] . "</td><td>" . $wiersz2['model_samochodu'] . "</td><td>" . $wiersz3['data_transakcji'] . "</td><td>" . "<a href=deltowary.php?id=".$imie."><button>X</button></a>";
        }}


}else{
// Zapytanie o imię klienta
$zapytanie1 = "SELECT imie_klienta FROM klienci WHERE imie_klienta = '$imie';";
$result1 = $baza->query($zapytanie1) or die(mysqli_error($baza));

// Zapytanie o modele samochodów
$zapytanie2 = "SELECT samochody.model_samochodu FROM samochody JOIN transakcje ON samochody.id_samochodu = transakcje.samochod_id JOIN klienci ON transakcje.klient_id = klienci.id_klienta WHERE klienci.imie_klienta = '$imie';";
$result2 = $baza->query($zapytanie2) or die(mysqli_error($baza));

// Zapytanie o date transakcji
$zapytanie3 = "SELECT transakcje.data_transakcji FROM samochody JOIN transakcje ON samochody.id_samochodu = transakcje.samochod_id JOIN klienci ON transakcje.klient_id = klienci.id_klienta WHERE klienci.imie_klienta = '$imie'";
$result3 = $baza->query($zapytanie3) or die(mysqli_error($baza));

$n = 0;

// Sprawdzanie czy są wyniki do wyświetlenia
if ($result1->num_rows > 0 && $result2->num_rows > 0) {
    while ($wiersz1 = $result1->fetch_assoc() and $wiersz2 = $result2->fetch_assoc() and $wiersz3 = $result3->fetch_assoc()) {
        $n++;

        echo "<tr><td>" . $n . "</td><td>" . $wiersz1['imie_klienta'] . "</td><td>" . $wiersz2['model_samochodu'] . "</td><td>" . $wiersz3['data_transakcji'] . "</td><td>" . "<a href=deltowary.php?id=".$imie."><button>X</button></a>";
    }}
        
}
// Zamykanie połączenia z bazą danych
$baza->close();
?>


  </tbody>
  
</table>
