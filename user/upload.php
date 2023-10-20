<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Log-in></title>
    <link rel="" href="style.css"> 
</head>
<body>
<form action="" method="post" enctype="multipart/form-data">


<input type="file" class="form-control" name="myfile">
<br>
<br>
<button type="submit" name="btn">Upload Images</button>

</form>


<?php


    if(isset($_REQUEST['btn']))
    {    
        echo $filename=$_FILES['myfile']['name'];

        echo $size=$_FILES['myfile']['size'];
        
        echo $type=$_FILES['myfile']['type'];

        if($size>1000000)
        {
            echo"too large file only:1 mb is allowed";
            exit;
        }
        //check for image height validation
        $image_info=getimagesize($_FILES["myfile"]["tmp_name"]);
        $imagewidth=$image_info[0];
        $imageheight=$image_info[1];

        if($imagewidth > 2000 || $imageheight > 1500)
        {
            echo"image is too Big in resolution max size allowed 2000x1000px";
            exit;
        }
        //only for jpg png jpeg gif
        if($type!="image/jpg" && $type!="image/jpeg" && $type!="image/JPG" && $type!="image/png" && $type!="image/PNG"
         && $type!="image/gif" && $type!="image/GIf")
        {
            echo"Invalid Image only pictures allowed for profile";
            exit;
        }
        //if validation are ok then upload the file to the server
        $path="pics/img/";

        $fullname=$path.basename($filename);

        if(move_uploaded_file($_FILES['myfile']['tmp_name'],$fullname))
        {
            echo"file Uploaded";
        }
        else
        {
            echo"error";
        }
    }

?>

</body>
</html>