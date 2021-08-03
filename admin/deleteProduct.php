<?php
include('includes/config.php');
$id = $_POST['del'];

$sql = "DELETE FROM products WHERE id='$id'";
$run = $conn->query($sql);

if ($run) {
    echo "Deleted";
} else {
    echo "Failed";
}
