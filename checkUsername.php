<?php
include_once("includes/config.php");
$name = $_POST['user'];
$sql = "SELECT * FROM users Where username='$name'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
if ($row) {
    echo "Not Available";
} else {
    echo "Available";
}
