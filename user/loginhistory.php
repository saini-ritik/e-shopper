<html>
    <head>
        <title>Login History</title>
    </head>
<body>
<?php
    session_start();
    include("connection.php");

    $query="SELECT * FROM user WHERE email='email' and password='password'";

    $data=mysqli_query($conn,$query);

    $total=mysqli_num_rows($data);
    
    if($data)
    {
        
        $ip = $_SERVER['REMOTE_ADDR'];
        $data = mysqli_query($conn, "insert login_history(email, ip) values('$_SESSION[email]','$ip')");
        echo mysqli_error($con);
    }

    //echo $total;

    if($total != 0)
    {
        ?>
            <h2 align="center"><mark>Displaying All Records</mark></h2>
            <table border="1px" cellspacing="10" width="100%" align="center">
                <tr>
                    
                    <th width=40%>Email</th>
                    <th width=40%>IP</th>
                    <th width="20%">Time</th>
                </tr>

        <?php
        
        while($result = mysqli_fetch_assoc($data))
        {
        ?>
            <tr>
                    <td><?php $result['email'] ?></td>
                    <td><?php $result['ip'] ?></td>
                    <td>Time</td>
                </tr>
        <?php
            }
    }
    else
    {
        echo "No records found";
    }
?>
</table>
</body>
</html>