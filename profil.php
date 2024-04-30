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
  <title>Moja Strona Profilowa</title>
  <script src="./js/bootstrap.min.js"></script>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f4f4f4;
    }

    .container {
      max-width: 70%;
      margin: 50px auto;
      background-color: #fff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      
    }

    .profile-picture {
      width: 150px;
      height: 150px;
      border-radius: 50%;
      margin: 0 auto 20px;
      display: block;
      background-color: #ccc;
    }

    table {
      max-width: 20%;
      border-collapse: collapse;
      margin-bottom: 20px;
      margin: auto;
      border-spacing: 0;
    }

    table td, table th {
      padding: 10px;
      border: 1px solid #ddd;
      font-size: 18px;
      border-top: 1px solid #ddd;
      padding: 5px 12px;
      text-align: center;
      vertical-align: top;
    }

    table th {
      background-color: #f4f4f4;
    }
    @media (max-width: 1000px) {
      /* Dla urządzeń o szerokości do 600px */
      .container {
        padding: 10px;
      }
      .profile-picture {
        width: 100px;
        height: 100px;
      }
      
	    .rwd-table {
		    overflow-x:scroll;
	}	
  .table td, table th{
    font-size:10px;
  }
}
@media (max-width: 700px){
  .table td, table th{
    font-size:7px;
  }
}
@media (max-width: 540px){
  .table td, table th{
    font-size:5px;
  }
}
.form-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        display: none;
        justify-content: center;
        align-items: center;
    }

    #formContainer {
        width: 60%px;
        background-color: #f0f0f0;
        border: 2px solid #ccc;
        padding: 20px;
        border-radius: 10px;
        position: relative;
    }

    #closeButton {
        position: absolute;
        top: 5px;
        right: 5px;
        cursor: pointer;
    }
    #showFormButton{
      width:70%;
    }
    #showFormButton:hover{
      transform: rotate(45deg);
    }
    
    .jednosc{
      display:flex;
      justify-content: center;
      justify-content: space-around;
      flex-direction: row-reverse;
    }
  </style>
</head>
<body>

<div class="rwd-table">
 
<div class="container">
  
  <img class="profile-picture" src="placeholder.jpg" alt="Zdjęcie profilowe">
  <?php 
  echo "<h1 style='color:red;text-align:center;'>Witaj ".$_SESSION['imie_klienta']."</h1>";
  ?>
  <div class="jednosc">


  
<table class="table table-condensed">
  
  <thead>
    <tr>
    <th>Imię</th> <th>Nazwisko</th> <th>Miasto</th> <th>Telefon</th> <th>email</th> <th>Edit</th>
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


	$prof = $_SESSION['imie_klienta'];



// Przykładowe zapytanie SQLtutaajjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj
$sql = "SELECT id_klienta, imie_klienta, nazwisko_klienta, miasto_klienta, telefon_klienta, email_klienta FROM klienci where imie_klienta = '$prof'  ";

// Wykonanie zapytania
$wynik = mysqli_query($polaczenie, $sql);

// Sprawdzenie, czy zapytanie zostało wykonane poprawnie
if (!$wynik) {
    die("Błąd zapytania SQL: " . mysqli_error($polaczenie));
}

$idd=0;
// Przetwarzanie wyników zapytania
while ($_row = mysqli_fetch_assoc($wynik)) {
    // Tutaj możesz wykonywać operacje na danych, na przykład:
    $idd++;
    echo "<tr><td> ". $_row['imie_klienta'] . "</td><td>" . $_row['nazwisko_klienta'] ."</td><td>". $_row["miasto_klienta"]."</td><td>" . $_row['telefon_klienta'] . "</td><td>" . $_row['email_klienta'] . "</td><td>"."<img src='./images/pencil.png' id='showFormButton'>"."</td></tr>";
}
// Zamknięcie połączenia
mysqli_close($polaczenie);
?>

</div>
</div>
<!--<img src="./images/pencil.png" id="showFormButton"> -->

<div class="form-overlay" id="formOverlay">
    <div id="formContainer">
        <span id="closeButton">X</span>
        <h4>Edycja klienta</h4>
<form method="POST" action="updateklient.php" id="formUpdateKlient">
<input hidden value="<?php echo $wiersz['id']; ?>" type="text" name="f_id" autocomplete="off">
Imię: <input value="<?php echo $wiersz['imie_klienta']; ?>" type="text" name="f_imie" autocomplete="off">
Nazwisko: <input value="<?php echo $wiersz['imie_klienta']; ?>" type="text" name="f_nazwizsko" autocomplete="off">
<br>Adres firmy: <input value="<?php echo $wiersz['miasto_klienta']; ?>"type="text" name="f_adres" autocomplete="off">
<br>Telefon: <input value="<?php echo $wiersz['telefon_klienta']; ?>"type="text" name="f_telefon" autocomplete="off">
<br>Email: <input value="<?php echo $wiersz['email_klienta']; ?>"type="text" name="f_telefon" autocomplete="off">
<br><button type="submit" id="add"> ZAPISZ ZMIANY </button>
</form>
        
        
        <script>
    document.getElementById("showFormButton").addEventListener("click", function() {
        document.getElementById("formOverlay").style.display = "flex"; // Pokazanie formularza
    });

    document.getElementById("closeButton").addEventListener("click", function() {
        document.getElementById("formOverlay").style.display = "none"; // Ukrycie formularza
    });
</script>

</div>
</body>
</html>