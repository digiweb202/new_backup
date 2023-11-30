<?php
session_start();
echo "logged out successfully";
// session_destroy();
$_SESSION['loggedin_admin'] = false;

header("Location:/hit/admin/sneat-bootstrap-html-admin-template/html/auth-login-basic.html");
?>