<?PHP
 $f_imie = $_POST["f_imie"];
 $f_nazwisko = $_POST["f_nazwisko"];
 $f_miasto = $_POST["f_miasto"];
 $f_telefon = $_POST["f_telefon"];
 $f_email = $_POST["f_email"];
 $f_id= $_POST["f_id"];


    include 'connect.php';
    $baza = mysqli_connect($host,$db_user,$db_password,$db_name) or ('cos nie tak z polaczenie z BD');

    $zapytanie="UPDATE `klienci` SET `nazwa_klienta` = '$f_imie', `adres_klienta` = '$f_nazwisko', `miasto_klienta` = '$f_miasto', `telefon_klienta` = '$f_telefon', `email_klienta` = '$f_email' WHERE `klienci`.`id` = $f_id;";
    $result = $baza->query($zapytanie) or die ('bledne zapytanie');


    $baza->close();
?>