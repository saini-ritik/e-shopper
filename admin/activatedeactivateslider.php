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
include_once('connection.php');

if(isset($_REQUEST['a_id']))
{
$a_id=$_REQUEST['a_id'];

$qry="UPDATE slider SET status=1 WHERE id='$a_id'";

$sql=mysqli_query($conn,$qry);
?>
<script>
    alert('Image Activated');
    window.location="manageslider.php";
</script>
<?php
}
?>
<?php
if(isset($_REQUEST['d_id']))
{
$d_id=$_REQUEST['d_id'];

$qry1="UPDATE slider SET status=0 WHERE id='$d_id'";

$sql1=mysqli_query($conn,$qry1);
?>
<script>
    alert('Image Deactivated');
    window.location="manageslider.php";
</script>
<?php
}
?>