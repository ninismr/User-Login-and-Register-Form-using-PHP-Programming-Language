<?php 

$server = '127.0.0.2';
$user = "root";
$pass = getenv("MySQL_Pswd");
$database = "login_register_form";
$port = 3307;

$conn = mysqli_connect($server, $user, $pass, $database, $port);

if (!$conn) {
    die("<script>alert('Connection Failed.')</script>");
}

?>
