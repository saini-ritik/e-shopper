<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Log-in></title>
    <link rel="stylesheet" href="style.css"> 
</head>
<body>
    <div class="container">
        <center>
            <h1>Log-in</h1>
        <form action="logincd.php" method="POST">
            <table cellpadding="15px">
            <tr>
            <td><input type="email" name="email" placeholder="E-mail"  autocomplete="off" required><br></td>
            </tr>
            <tr>
                <td><input type="password" name="password" placeholder="Password"  autocomplete="off" required><br></td>
            </tr>
            </table>
            <b>Don't have an Account?</b><a href="signup.php">Sign-up</a><br><br>
            <b>forgot Password?</b><a href="forgot.php">Click Here </a><br><br>
            
            <input type="submit" name="login" value="log-in" class="btn">
        </form>
        </center>
    </div>
</body>
</html>

