<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
        <style>
            /* Resetowanie marginesów dla całej strony */
body{
 background-image: url(./images/udaloSie.gif);
 background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
}

        </style>
</head>
<body>
</body>
</html>
<?PHP
 $f_imie = $_POST["f_imie"];
 $f_miasto = $_POST["f_miasto"];
 $f_telefon = $_POST["f_telefon"];
 $f_zdjecie = $_POST["f_zdjecie"];



    include 'connect.php';
    $baza = mysqli_connect($host,$db_user,$db_password,$db_name) or ('cos nie tak z polaczenie z BD');

    $zapytanie="UPDATE `klienci` SET `imie_klienta` = '$f_imie',
     `miasto_klienta` = '$f_miasto', `telefon_klienta` = '$f_telefon',
      `zdjecie_klienta` = '$f_zdjecie' WHERE `imie_klienta` = '$f_imie';";
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