<?php
session_start();
include_once("includes/config.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    //destroy the session for particular product id
    unset($_SESSION['cart'][$id]);
    header('location:cart.php');
}
