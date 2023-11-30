<?php
session_start();
echo "logged out successfully";
$_SESSION['loggedin_vendor']=false;

header("Location:/Hit/Mart-Website Frontend\Njoymart-Website-Frontend\nest\demo\index.php");
?>