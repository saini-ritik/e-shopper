<?php
session_start();
include('connection.php');

if(!isset($_SESSION['user']))
{
    // $_SESSION['user'];
    header('location:index.php');
}
?>
<?php
include('connection.php');
if(isset($_POST['add'])) // if Add button is clicked
{
    $id=$_POST['id'];// initializtion
    $productname=$_POST['productname'];// initializtion
    $brandname=$_POST['brandname'];// initializtion
    $productprice=$_POST['productprice'];// initializtion
    $productimage=$_POST['image'];// initializtion

    $query="insert into product values('$id','$productname','$brandname','$productprice','$productimage')";

    $data=mysqli_query($conn,$query); // for executing query how may times query is executed


    if($data)
    {
        echo"<script>alert('Data inserted')</script>";
    }
    else
    {
        echo"<script>alert('Not inserted')</script>";
    }

}
?>