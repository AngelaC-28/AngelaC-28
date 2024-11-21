<?php
include_once "db_connect.php";
session_start();

if(isset($_GET['addTocart'])){
    $itemId = $_GET['itemId'];
    $itemQty = 1;
    if(isset($_SESSION['user_id'])){
         $cusId =  $_SESSION['user_id'];
    } 

    //insert into orders table...



}
?>