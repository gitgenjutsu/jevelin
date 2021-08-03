<?php

$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "jevelin";

$count = 0;
// object oriented
$conn = new mysqli($hostname, $username, $password, $dbname);

if ($conn->connect_error) {
    die($conn->connect_error);
}

//Data INSERT
// $sql = "INSERT INTO `cart` (`count`, `cloth_name`, `size`, `category`, `price`, //`delivery_date`) VALUES (NULL, 'Oversized denim jacket', 'Medium', 'Jacket', '25', //'2021-06-26');";


 //if (!$conn->query($sql) == TRUE) {
   //  echo $conn->error;
 //} 

?>
