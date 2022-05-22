<?php 

$server = "localhost";
$user = "root";
$pass = "";
$database = "income_expense";

$conn = mysqli_connect($server, $user, $pass, $database);

if (!$conn) {
    die("<script>alert('Connection Failed.')</script>");
}

?>