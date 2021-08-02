<?php
include_once("includes/config.php");
session_start();
// sleep(5);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];

    function custom_validate($value)
    {
        $value = trim($value);
        $value = stripslashes($value);
        $value = htmlspecialchars($value);
        return $value;
    }

    //validation

    if (!empty($username) && !empty($password)) {
        $username = custom_validate($_POST["username"]);
        $password = custom_validate($_POST["password"]);
        $password = md5($password);
        $sql = "SELECT * FROM users WHERE username='$username'";
        $result = mysqli_query($conn, $sql) or die();
        $rows = mysqli_num_rows($result);
        $data = mysqli_fetch_assoc($result);
        $storedPass = $data['password'];
        $storedID = $data['id'];

        if ($rows > 0) {
            if ($storedPass === $password) {
                $_SESSION['username'] = $username;
                $_SESSION['userID'] = $storedID;
                echo "Login Success";
            } else {
                echo "Wrong Password";
            }
        } else {
            echo "Invalid Username";
        }
    }
}
