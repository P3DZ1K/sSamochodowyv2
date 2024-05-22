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
      background-color: #89d2e1;
    }

    

    .profile-picture {
      width: 20%;
      border-radius: 50%;
      margin: 0 auto 20px;
      display: block;
      background-color: #ccc;
    }

    
    @media (max-width: 1020px) {
      /* Dla urządzeń o szerokości do 600px */
      .container {
        padding: 10px;
      }
      .profile-picture {
        width: 100px;
        height: 100px;
      }
  
}
table {
        width: 30%;
        border-collapse: collapse;
        border: 2px solid #ddd;
    }

    th, td {
        padding: 18px;
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
      width:85%;
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
    #BUTTONN{
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            color: #fff;
            text-align: center;
            text-decoration: none;
            background-color: #00a1e0;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-left:40px;
            display: flex;
            margin-left: 128px;

    }
    .logo
        {
            
         color: #fff;
         text-transform: uppercase;
         cursor: pointer;
         margin-left:20px;
        }
        a{
          text-decoration: none;
        }
  </style>
</head>
<body>
<a href="menu.php"><h2 class="logo" style="">BMW</h2></a>
<div class="rwd-table">
    <?php
    require_once "connect.php";

    $polaczenie = mysqli_connect($host, $db_user, $db_password, $db_name);
    if (!$polaczenie) {
        die("Błąd połączenia z bazą danych: " . mysqli_connect_error());
    }

    $prof = $_SESSION['imie_klienta'];
    $sql = "SELECT `zdjecie_klienta` FROM `klienci` WHERE `imie_klienta` = '$prof'";
    $wynik = mysqli_query($polaczenie, $sql);

    if (!$wynik) {
        die("Błąd zapytania SQL: " . mysqli_error($polaczenie));
    }

    $zdjecie = 0;
    while ($_row = mysqli_fetch_assoc($wynik)) {
        $zdjecie = $_row['zdjecie_klienta'];
    }

    if ($zdjecie == 1) {
        echo '<img src="./images/awatar1.jfif" class="profile-picture" alt="Zdjęcie profilowe">';
    } elseif ($zdjecie == 2) {
        echo '<img src="./images/awatar2.jfif" class="profile-picture" alt="Zdjęcie profilowe">';
    } else {
        echo '<img src="./images/awatar3.jfif" class="profile-picture" alt="Zdjęcie profilowe">';
    }

    mysqli_close($polaczenie);
    ?>
    <h1 style="color:red;text-align:center;font-size:auto;">Witaj <?php echo $_SESSION['imie_klienta']; ?></h1>
    <div class="jednosc">
        <table class="table table-condensed">
            <thead>
                <tr>
                    <th>Imię</th>
                    <th>Miasto</th>
                    <th>Telefon</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
            <?php
            require_once "connect.php";
            $polaczenie = mysqli_connect($host, $db_user, $db_password, $db_name);
            if (!$polaczenie) {
                die("Błąd połączenia z bazą danych: " . mysqli_connect_error());
            }

            $prof = $_SESSION['imie_klienta'];
            $sql = "SELECT id_klienta, imie_klienta, miasto_klienta, telefon_klienta FROM klienci WHERE imie_klienta = '$prof'";
            $wynik = mysqli_query($polaczenie, $sql);

            if (!$wynik) {
                die("Błąd zapytania SQL: " . mysqli_error($polaczenie));
            }

            while ($_row = mysqli_fetch_assoc($wynik)) {
                echo "<tr>
                        <td>{$_row['imie_klienta']}</td>
                        <td>{$_row['miasto_klienta']}</td>
                        <td>{$_row['telefon_klienta']}</td>
                        <td><img src='./images/pencil.png' id='showFormButton'></td>
                      </tr>";
            }
            mysqli_close($polaczenie);
            ?>
            </tbody>
        </table>
    </div>
</div>

<?php
$prof = $_SESSION['imie_klienta'];
include 'connect.php';
$baza = mysqli_connect($host, $db_user, $db_password, $db_name) or die('cos nie tak z polaczenie z BD');

$zapytanie = "SELECT imie_klienta, miasto_klienta, telefon_klienta, zdjecie_klienta FROM klienci WHERE `imie_klienta`= '$prof'";
$result = $baza->query($zapytanie) or die('bledne zapytanie');

while ($wiersz = $result->fetch_assoc()) {
?>
<div class="form-overlay" id="formOverlay">
    <div id="formContainer">
        <span id="closeButton">X</span>
        <h4>Edycja klienta</h4>
        <form method="POST" action="groupDateKlient.php" id="Back">
            Imię: <input value="<?php echo $wiersz['imie_klienta']; ?>" type="text" name="f_imie" autocomplete="off" style="margin-left:80px;">
            <br><br>Adres firmy: <input value="<?php echo $wiersz['miasto_klienta']; ?>" type="text" name="f_miasto" autocomplete="off" style="margin-left:30px;">
            <br><br>Telefon: <input value="<?php echo $wiersz['telefon_klienta']; ?>" type="text" name="f_telefon" autocomplete="off" style="margin-left:60px;">
            <br><br>Awatar: <input value="<?php echo $wiersz['zdjecie_klienta']; ?>" type="number" min="1" max="3" name="f_zdjecie" autocomplete="off" style="margin-left:62px;width:163px; text-align: center;">
            <br><br><button type="submit" id="BUTTONN">ZAPISZ ZMIANY</button>
        </form>
    </div>
</div>
<?php
}
$baza->close();
?>
        <script>
    document.getElementById("showFormButton").addEventListener("click", function() {
        document.getElementById("formOverlay").style.display = "flex"; // Pokazanie formularza
    });

    document.getElementById("closeButton").addEventListener("click", function() {
        document.getElementById("formOverlay").style.display = "none"; // Ukrycie formularza
    });
</script>


</body>
</html>