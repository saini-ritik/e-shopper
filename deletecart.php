<?php
include_once('admin/connection.php');

$crt_id=$_REQUEST['crt_id'];

$qy="DELETE FROM cart WHERE id='$crt_id'";


$ql=mysqli_query($conn,$qy);

if($ql)
{
    ?>
    <script>
    alert('Removed');
    window.location="cart.php";
    </script>
    <?php
}
else
{
    ?>
    <script>
    alert('Failed to Remove');
    window.location="cart.php";
    </script>
    <?php
}


?>