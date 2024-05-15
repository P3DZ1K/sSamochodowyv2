<?php
include 'connect.php';
$mysqli = mysqli_connect($host, $db_user, $db_password, $db_name);


function getData($products_id) {
    global $mysqli;
    $where = "";
    $join = "";
    if($products_id){
    $where = "WHERE products_id =".$products_id;
    $join = "JOIN opis ON opis.product_id = products.products_id";}

    $result = $mysqli->query("SELECT * FROM products $join $where");


    $mysqli->close();
    if(!$products_id)
        return resultToArray($result);
    else
        return $result->fetch_assoc();
}

function resultToArray($result) {
    $info = array ();
    while (($row = $result->fetch_assoc()) !=false) {
        $info[] = $row;
    }
    return $info;
}
?>