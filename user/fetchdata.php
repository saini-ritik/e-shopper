<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fetched data</title>
</head>
<body>
<center>
<h1>Fetched Data</h1>
<table border="1">
<tr>
<th>username</th>
<th>email</th>
<th>phonenumber</th>
<th>password</th>
<th>dob</th>
<th>gender</th>
</tr>


<?php
include("connection.php");
$query= "SELECT * FROM user";
$data=mysqli_query($conn,$query);
$total=mysqli_num_rows($data);

if($total!=0)
{
    while($result=mysqli_fetch_assoc($data))
    {
        echo"<tr>
        <td>".$result['username']."</td>
        <td>".$result['email']."</td>
        <td>".$result['phonenumber']."</td>
        <td>".$result['password']."</td>
        <td>".$result['dob']."</td>
        <td>".$result['gender']."</td>
        </tr>";
    }
}
else
{
    echo"no records";
}
?>
</center>
</table>
</body>
</html>