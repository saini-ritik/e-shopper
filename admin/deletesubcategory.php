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
$subcat_id=$_REQUEST['subcat_id'];

include('connection.php');
$sql1="delete from subcategory where id='$subcat_id'";
$d=mysqli_query($conn,$sql1);


if($d)
{
?>

    <script>
    alert('subcategory deletd');
    window.location="managesubcategory.php";
    </script>
<?php
}
else
{
?>
    <script>
    alert('Failed to Delete');
    window.location="managesubcategory.php";
    </script>
<?php
}
?>
