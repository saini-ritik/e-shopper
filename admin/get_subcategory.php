<?php
include "connection.php";
 $cat=$_REQUEST['category'];

 $q="SELECT * FROM subcategory where category='$cat'";

 $d=mysqli_query($conn,$q);

while($r=mysqli_fetch_assoc($d))
{
?>

<option><?php echo $r['subcategory'] ;?></option>

<?php
}

?>