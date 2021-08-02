<?php
session_start();
if (isset($_SESSION['username']) && empty($_SESSION['cart'])) {
    header("Location:index.php");
} elseif (!isset($_SESSION['username'])) {
    header("Location:user_login.php");
    exit();
}
