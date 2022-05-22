<?php

include('config.php');
session_start();
$sid=$_SESSION['id'];

$product=$_POST['sales_product'];
$qty=$_POST['tvalue'];
if ($product==0){
    $_SESSION['msg']="Please select a product";
    header('location:index.php');
}
else{
    //MySQLi Procedural
    //mysqli_query($conn,"insert into sales (productid,sales_qty) values ('$product','$qty')");

    //MySQLi OOP
    $conn->query("insert into income (income,tvalue,uid) values ('$product','$qty','$sid')");
    header('location:index.php');
}
?>