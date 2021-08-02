<?php
include_once("includes/config.php");
$id = $_GET['id'];
$sql = "SELECT * FROM cart WHERE cart.id = $id";

$run= $conn->query($sql);
if($run){
	header("Location:edit.php");
}

?>