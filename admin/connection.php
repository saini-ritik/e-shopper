<?php
$servername="localhost";
$username="root";
$password="";
$dbname="ecommerce";

$conn=mysqli_connect($servername,$username,$password,$dbname);

if($conn)
{
   // echo"Connected";
}
else
{
    echo "Failed";
}
?>