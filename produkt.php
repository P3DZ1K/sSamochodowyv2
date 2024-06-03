<?php
    require_once "connect.php";
	session_start();
	
	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: index.php');
		exit();
	}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./images/car.png" sizes="72x72" type="image/png">
    <link rel="stylesheet" type="text/css" href="./css/produkt.css">
</head>
<body>

<div class="container">
    <h1>BMW</h1>
<?php
    if (isset($_GET['image'])) {
        // Pobierz wartość 'image' z parametru GET
        $img = $_GET['image'];

        // Wyświetl obrazek samochodu
       ?>
        <div class="gallery-container">
        <div class="gallery">
           <img src=" <?php echo "$img" ?>" ;
            </div>
        </div>

<?php
    } else {
        // Jeśli parametr 'image' nie został przekazany, wyświetl komunikat
        echo 'Nieprawidłowy parametr URL.';
    }
   ?>
</div>
<div class="rightside">


<?php
    require_once "connect.php";

    // Połączenie z bazą danych
    $polaczenie = mysqli_connect($host, $db_user, $db_password, $db_name);
    
    // Sprawdzenie połączenia
    if (!$polaczenie) {
        die("Błąd połączenia z bazą danych: " . mysqli_connect_error());
    }
    


    //
    // Tutaj możesz wykonywać operacje na bazie danych
   $prof = $_SESSION['imie_klienta'];
   $sql1 ="SELECT samochody.cena_samochodu FROM samochody JOIN dane_samochodu ON dane_samochodu.id_dane_samochodu = samochody.id_dane_samochodu WHERE dane_samochodu.zdjecie_dane_samochodu = '$img'";
   $sql2 ="SELECT `opis_dane_samochodu` FROM `dane_samochodu` WHERE `zdjecie_dane_samochodu` = '$img'";
   $sql3 ="SELECT samochody.model_samochodu FROM samochody JOIN dane_samochodu ON dane_samochodu.id_dane_samochodu = samochody.id_dane_samochodu WHERE dane_samochodu.zdjecie_dane_samochodu = '$img'";
   $sql4 ="SELECT samochody.typ_nadwozia_samochodu FROM samochody JOIN dane_samochodu ON dane_samochodu.id_dane_samochodu = samochody.id_dane_samochodu WHERE dane_samochodu.zdjecie_dane_samochodu = '$img'";
   $sql5 ="SELECT `kolor_dane_samochodu` FROM `dane_samochodu` WHERE `zdjecie_dane_samochodu` = '$img'"; 


   $wynik = mysqli_query($polaczenie, $sql1);
   $wynik2 = mysqli_query($polaczenie, $sql2);
   $wynik3 = mysqli_query($polaczenie, $sql3);
   $wynik4 = mysqli_query($polaczenie, $sql4);
   $wynik5 = mysqli_query($polaczenie, $sql5);
  

   // Sprawdzenie, czy zapytanie zostało wykonane poprawnie
   if (!$wynik) {
       die("Błąd zapytania SQL: " . mysqli_error($polaczenie));
   }
   
   // Przetwarzanie wyników zapytania
   while ($_row = mysqli_fetch_assoc($wynik)) {
    $cena = $_row['cena_samochodu'];
    echo "<h2>Price: ".$cena." zł</h2>";
   }
   while ($_row = mysqli_fetch_assoc($wynik2)) {
    $opis = $_row['opis_dane_samochodu'];
    echo "<p1>".$opis."</p1>";
   }
   
   
   
?>

</div>
<div class="bottomside">

    <p>
        <strong>Kolor:</strong> 
        <?php
        while ($_row = mysqli_fetch_assoc($wynik5)) {
            $kolor = $_row['kolor_dane_samochodu'];
            echo "<p1>".$kolor."</p1>";
           }
        ?>
        <br>
        <strong>Model:</strong>
        <?php
        while ($_row = mysqli_fetch_assoc($wynik3)) {
            $model = $_row['model_samochodu'];
            echo "<p1>".$model."</p1>";
           }
        ?>
          <title>
        <?php echo "BMW model ".$model; ?>
        </title>
        <br>
        <strong>Typ nadwodzia:</strong>
        <?php
        while ($_row = mysqli_fetch_assoc($wynik4)) {
             $typ_nadwozia = $_row['typ_nadwozia_samochodu'];
             echo "<p1>".$typ_nadwozia."</p1>";
             }?>
        <br>
    </p>
</div>
         <div class="dodajdokoszyka">    
    <form action="towaradd.php" method="POST">
    <input type="hidden" name="image" value="<?php echo htmlspecialchars($img); ?>">
        <button class="blue-button">Dodaj do koszyka</button>
    </form>
            </div>
            <div class="anuluj">
    <form action="strefaklienta.php" method="POST">
        <button class="blue-button">Anuluj</button>
    </form>
            </div>
</div>


<?php
    mysqli_close($polaczenie);
  ?>
</body>
</html>