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
$cat_id=$_REQUEST['cat_id'];

include('connection.php');
$sql="delete from category where id='$cat_id'";
$q=mysqli_query($conn,$sql);

if($q)
{
?>
    <script>
    alert('Category Deleted');
    window.location="managecategory.php";
    </script>
<?php
}
else
{
?>
    <script>
    alert('Category Deleted');
    window.location="managecategory.php";
    </script>
<?php
}
?>





