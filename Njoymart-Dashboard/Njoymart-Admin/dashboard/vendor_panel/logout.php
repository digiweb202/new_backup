<?php
echo "<script>alert('You have been logged out successfully');</script>";

// Unset and destroy the current session
session_start();
session_unset();
session_destroy();

// Redirect to the desired location after logout
header("Location: ../../../../Mart-Website Frontend/Njoymart-Website-Frontend/nest/demo/index.php");
exit;
?>
