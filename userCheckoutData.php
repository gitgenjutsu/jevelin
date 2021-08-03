<?php
session_start();
include_once("includes/config.php");
// sleep(5);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_REQUEST['username'];
    $email = $_REQUEST['email'];
    $fullName = $_REQUEST['inputName'];
    $phone = $_REQUEST['inputDigit'];
    $areaCode = $_REQUEST['inputPinCode'];
    $landmark = $_REQUEST['inputLocality'];
    $state = $_REQUEST['state'];
    $addressType = $_REQUEST['radioDemo'];
    $address = $_REQUEST['inputAddress'];
    $userID = $_REQUEST['userID'];


    if (
        !empty($username) && !empty($email)
        && !empty($fullName)
        && !empty($phone)
        && !empty($areaCode)
        && !empty($landmark)
        && !empty($state)
        && !empty($addressType)
        && !empty($address)
    ) {
        $sqlData = "SELECT * FROM users_data WHERE userId= '$userID'";
        $result = mysqli_query($conn, $sqlData);

        if (mysqli_num_rows($result) == 1) {
            //update if data already available
            $sql = "UPDATE `users_data` SET `name`='$fullName',`phone`='$phone',`pincode`='$areaCode',`state`='$state',`locality`='$landmark',`address`='$address',`address_type`='$addressType' WHERE userId='$userID' ";
            $run = $conn->query($sql);

            if ($run) {
                echo "Updated";
            } else {
                echo "Failed Query Update";
            }
        } else {
            //insert if data not available

            $sql = "INSERT INTO `users_data`( `userId`, `username`, `name`, `phone`, `pincode`, `state`, `locality`, `address`, `address_type`) VALUES ('$userID', '$username','$fullName','$phone','$areaCode','$state','$landmark','$address','$addressType')";
            $run = $conn->query($sql);

            if ($run) {
                echo "Inserted";
            } else {
                echo "Failed Query Insertion";
            }
        }
    } else {
        echo "Data Empty";
    }
}
