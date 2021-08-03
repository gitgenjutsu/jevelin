<?php
session_start();
// if(session_destroy()){
// 	header("Location:login.php");
// }
unset($_SESSION['admin']);
header("Location:login.php");
