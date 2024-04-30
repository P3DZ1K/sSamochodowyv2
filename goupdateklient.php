<?PHP
 $f_nazwa = $_POST["f_nazwa"];
 $f_adres = $_POST["f_adres"];
 $f_telefon = $_POST["f_telefon"];
 $f_id= $_POST["f_id"];


    include 'connect.php';
    $baza = mysqli_connect($host,$db_user,$db_password,$db_name) or ('cos nie tak z polaczenie z BD');

    $zapytanie="UPDATE `klienci` SET `nazwa` = '$f_nazwa', `adres` = '$f_adres', `telefon` = '$f_telefon' WHERE `klienci`.`id` = $f_id;";
    $result = $baza->query($zapytanie) or die ('bledne zapytanie');


    $baza->close();
?>