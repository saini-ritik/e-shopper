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
$product_id=$_REQUEST['product_id'];

$q="delete from product where id='$product_id'";

$d=mysqli_query($conn,$q);

if($d)
{
    ?>
    <script>
    alert('Product Deleted');
    window.location="manageproduct.php";
    </script>
    <?php
}
else
{
    ?>
    <script>
    alert('Failed to Delete');
    window.location="manageproduct.php";
    </script>
    <?php
}
?>