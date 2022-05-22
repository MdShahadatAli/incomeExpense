<?php

$server = "localhost";
$user = "root";
$pass = "";
$database = "income_expense";

$conn = mysqli_connect($server, $user, $pass, $database);

if (!$conn) {
    die("<script>alert('Connection Failed.')</script>");
}

session_start();

$sid=$_SESSION['id'];


if(isset($_GET['sales_product']) && isset($_GET['ivalue'])){
    
    $i=$_GET['sales_product'];
    $l=$_GET['ivalue'];


    try{
        ///try to connect with database
        $conn=new PDO("mysql:host=localhost:3306;dbname=income_expense", "root", "");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $ex){

        echo "<script>location.assign('home.php');</script>";
    }

    ///if database connection is ok
    $mysqlcode="INSERT INTO income (income, tvalue, uid) VALUES ('$i','$l','$sid')";

    try{
        $conn->exec($mysqlcode);

        echo "<script>location.assign('home.php');</script>";
    }
    catch(PDOException $ex){
        echo "<script>location.assign('home.php');</script>";
    }


}

?>