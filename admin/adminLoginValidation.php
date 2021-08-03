<?php
include_once("includes/config.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];

    $sql = "SELECT * FROM admin WHERE username='$username' AND password='" . md5($password) . "'";
    $result = mysqli_query($conn, $sql) or die();
    $rows = mysqli_num_rows($result);

    if ($rows == 1) {
        $_SESSION['admin'] = $username;
        // header("Location:products.php");
        echo "Login";
    } else {
        echo "Failed";
    }
}
