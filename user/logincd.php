<?php
include("connection.php");

if(isset($_POST['login']))
{
    $email=$_POST['email'];
    $password=$_POST['password'];

    $query="SELECT * FROM user WHERE email='$email' && password='$password'";

    $data=mysqli_query($conn,$query);

    $total=mysqli_num_rows($data);
    if($total=mysqli_num_rows($data))
    {
        
        $result=mysqli_fetch_assoc($data);
        $ip= $_SERVER['REMOTE_ADDR'];
        $s= mysqli_query($conn,"INSERT INTO `loginhistory`(email,ip)values('$email','$ip')");
        header('location:index.php');
        echo"<script>alert('sucess')</script>";
    }

    else
    {
        echo"<script>alert('failed')</script>";
    }   
}
?>