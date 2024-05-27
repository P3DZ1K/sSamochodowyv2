<?PHP
session_start();
	
if (!isset($_SESSION['zalogowany']))
{
    header('Location: index.php');
    exit();

}
 $prof = $_SESSION['imie_klienta'];
 if (isset($_GET['image'])) {
    // Pobierz wartość 'image' z parametru GET
    $img = $_GET['image'];
 }

 
    include 'connect.php';
    $baza = mysqli_connect($host,$db_user,$db_password,$db_name) or ('cos nie tak z polaczenie z BD');
    $klient_id ="SELECT `id_klienta` FROM `klienci` WHERE imie_klienta ='$prof'";
    $samochod_id = "SELECT samochody.id_samochodu FROM samochody JOIN dane_samochodu ON dane_samochodu.id_dane_samochodu = samochody.id_dane_samochodu WHERE dane_samochodu.zdjecie_dane_samochodu = '$img'";



    $zapytanie="INSERT INTO `transakcje` (`id`, `klient_id`, `samochod_id`, `data_transakcji`) VALUES (NULL, '$klient_id', '$samochod_id', now());";
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