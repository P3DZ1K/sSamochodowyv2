<?PHP
require_once "connect.php";
$pu = 0;

$login = filter_var(trim($_POST['imie_klienta']),
FILTER_SANITIZE_STRING);

$pass = filter_var(trim($_POST['haslo_klienta']),
FILTER_SANITIZE_STRING);

$repeat_pass = filter_var(trim($_POST['repeat_pass']),
FILTER_SANITIZE_STRING);

$city = filter_var(trim($_POST['miasto_klienta']),
FILTER_SANITIZE_STRING);

$phone_number = filter_var(trim($_POST['telefon_klienta']),
FILTER_SANITIZE_STRING);

$zdjecie = filter_var(trim($_POST['option']),
FILTER_SANITIZE_STRING);


if(mb_strlen($login) < 3 || mb_strlen($login) > 50) {
    echo "Minimalna długość loginu- 3 znaki, <br/>";
    echo "Maksymalna- 50!";
    echo "<form method='post' action='rejestracja.php'>" ;
    echo "<input type='submit' value='Jeszcze raz'>"; 
    echo "</form>" ;
    exit();
}else if(mb_strlen($pass) < 3 || mb_strlen($pass) > 50) {
    echo "Minimalna długość hasła- 4 znaki, <br/>";
    echo "Maksymalna- 25!";
    echo "<form method='post' action='rejestracja.php'>" ;
    echo "<input type='submit'>"; 
    echo "</form>" ;
    exit();
}else if($pass != $repeat_pass){
    echo "Hasła się nie zgadzają!!!";
    echo "<form method='post' action='rejestracja.php'>" ;
    echo "<input type='submit'>"; 
    echo "</form>"; 
    exit();
}
if($pass=="zaq1@WSX"){
    $pu = 1;
}
$pass = md5($pass."gjfvjhgyf576547");


$mysql = new mysqli($host, $db_user, $db_password, $db_name);
$mysql->query("INSERT INTO `klienci`(`imie_klienta`, `haslo_klienta`, `miasto_klienta`, `telefon_klienta`, `zdjecie_klienta`, `pu_klienta`) VALUES ('$login','$pass','$city','$phone_number','$zdjecie','$pu')");

$mysql->close();

header('Location: zaloguj.php');
?>