<?PHP
 $f_imie = $_POST["f_imie"];
 $f_nazwisko = $_POST["f_nazwisko"];
 $f_miasto = $_POST["f_miasto"];
 $f_telefon = $_POST["f_telefon"];
 $f_email = $_POST["f_email"];
 $f_id= $_POST["f_id"];


    include 'connect.php';
    $baza = mysqli_connect($host,$db_user,$db_password,$db_name) or ('cos nie tak z polaczenie z BD');

    $zapytanie="UPDATE `klienci` SET `nazwa_klienta` = '$f_nazwa', `adres` = '$f_adres', `telefon` = '$f_telefon' WHERE `klienci`.`id` = $f_id;";
    $result = $baza->query($zapytanie) or die ('bledne zapytanie');


    $baza->close();
?>