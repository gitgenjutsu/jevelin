<?php
include("includes/session.php");
include_once("includes/config.php");
$id = $_POST['id'];
if (isset($_SESSION['cart'])) {

    //storing the session value of cart
    $cart = $_SESSION['cart'];

    $count = 0;
    foreach ($cart as $key => $value) {
        $sqlQuery = "SELECT * FROM products where id = '$key'";
        $result = $conn->query($sqlQuery);
        if ($result->num_rows > 0) {
            ++$count;
        }
    }
    echo $count;
}
