<?php
include('connection.php');

$s_id=$_REQUEST['s_id'];

$q="DELETE FROM slider WHERE id='$s_id'";

$d=mysqli_query($conn,$q);

if($d)
{
    ?>
    <script>
    alert("Slider Image Deleted");
    window.location="manageslider.php";
    </script>
    <?php
}
else
{
    ?>
    <script>
    alert("Failed to Delete Slider Image");
    window.location="manageslider.php";
    </script>
    <?php
}

?>