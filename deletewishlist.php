<?php
include_once('admin/connection.php');

$wish_id=$_REQUEST['wish_id'];

$qy="DELETE FROM wishlist WHERE id='$wish_id'";

$ql=mysqli_query($conn,$qy);

if($ql)
{
    ?>
    <script>
    alert('Removed');
    window.location="wishlist.php";
    </script>
    <?php
}
else
{
    ?>
    <script>
    alert('Failed to Remove');
    window.location="wishlist.php";
    </script>
    <?php
}


?>