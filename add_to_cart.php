<?php
// include('user_auth.php');
include("includes/session.php");

// without ajax
// if (isset($_GET['id'])) {
//     //checking if quantity of product is more than 1
//     if (isset($_GET['prod_quantity'])) {
//         $quantity = $_GET['prod_quantity'];
//     } else {
//         $quantity = 1;
//     }

//     //session for cart
//     $id = $_GET['id'];
//     $_SESSION['cart'][$id] = array('quantity' => $quantity);
//     header('location:cart.php');
// }



// with ajax
if (isset($_POST['id'])) {

    //checking if quantity of product is more than 1
    if (isset($_POST['prod_quantity'])) {
        $quantity = $_POST['prod_quantity'];
    } else {
        $quantity = 1;
    }

    //session for cart
    $id = $_POST['id'];
    $_SESSION['cart'][$id] = array('quantity' => $quantity);
}
