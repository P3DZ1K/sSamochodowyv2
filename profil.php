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
  <script src="./js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="./css/profil.css">
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
    <h1 style="color:red;text-align:center;font-size:auto;">Hi <?php echo $_SESSION['imie_klienta']; ?></h1>
    <div class="jednosc">
        <table class="table table-condensed">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>City</th>
                    <th>Phone</th>
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
        <h4>Client edit</h4>
        <form method="POST" action="editklient.php" id="Back">
            Name: <input value="<?php echo $wiersz['imie_klienta']; ?>" type="text" name="f_imie" autocomplete="off" style="margin-left:62px;">
            <br><br>City: <input value="<?php echo $wiersz['miasto_klienta']; ?>" type="text" name="f_miasto" autocomplete="off" style="margin-left:77px;">
            <br><br>Phone: <input value="<?php echo $wiersz['telefon_klienta']; ?>" type="text" name="f_telefon" autocomplete="off" style="margin-left:59px;">
            <br><br>Avatar: <input value="<?php echo $wiersz['zdjecie_klienta']; ?>" type="number" min="1" max="3" name="f_zdjecie" autocomplete="off" style="margin-left:60px;width:163px; text-align: center;">
            <br><br><button type="submit" id="BUTTONN">SAVE</button>
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