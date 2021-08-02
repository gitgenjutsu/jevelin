<?php
include('user_auth.php');
include_once("includes/config.php");

// with ajax
if (isset($_SESSION['userID'])) {

    //logged in user
    $userID = $_SESSION['userID'];

    //selected product id
    $prod = $_POST['id'];

    $sqlSelect = "DELETE  from wishlist WHERE prod_id='$prod' AND user_id='$userID'";
    $result = mysqli_query($conn, $sqlSelect);
} else {
    echo "Session not set";
}
