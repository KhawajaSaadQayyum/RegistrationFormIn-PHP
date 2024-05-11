<?php
$host="localhost";
$admin= "root";
$password= "";
$db="login";

$connect= new mysqli($host,$admin,$password,$db);

if($connect->connect_error){
    echo"Connection failed".$connect->connect_error;
}