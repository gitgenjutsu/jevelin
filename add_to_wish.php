<?php
include('user_auth.php');
include_once("includes/config.php");

// with ajax
if (isset($_SESSION['userID'])) {

    //logged in user
    $userID = $_SESSION['userID'];

    //selected product id
    $id = $_POST['id'];


    //check if product already wishlisted
    $sqlSelect = "SELECT * from wishlist WHERE prod_id='$id' AND user_id='$userID'";
    $result = mysqli_query($conn, $sqlSelect);
    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            echo "Already Added";
        } else {
            $sql = "INSERT INTO `wishlist`( `prod_id`, `user_id`) VALUES ('$id','$userID')";
            mysqli_query($conn, $sql);
        }
    }
} else {
    echo "Session not set";
}
