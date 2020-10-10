<?php
$localhost="localhost:3306";
$username="root";
$password="";
$db="performance";
$con = mysqli_connect($localhost,$username,$password,$db);
if(!($con))
{
     die("connection failed." .mysqli_connect_error($con));
}
else
{
    //echo "Succesfully connected";
}







?>