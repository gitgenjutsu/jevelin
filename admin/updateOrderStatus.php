<?php
include_once("includes/config.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_REQUEST['id'];
    $order_status = $_REQUEST['status'];
    $reason = $_REQUEST['reason'];


    //Data Insertion of Order tracking
    $sqlInsert = "INSERT INTO `orders_tracking`(`order_id`, `orderStatus`, `reason`) VALUES ('$id','$order_status','$reason')";

    if (mysqli_query($conn, $sqlInsert)) {

        //Data Insertion of Order tracking
        $sql = "UPDATE `orders` SET `orderStatus`= '$order_status' WHERE id = '$id'";
        mysqli_query($conn, $sql);
    }
}
