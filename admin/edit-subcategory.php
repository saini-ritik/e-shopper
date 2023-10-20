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

$subcat_id=$_REQUEST['subcat_id'];

$q1="SELECT * FROM subcategory where id='$subcat_id'";

$d=mysqli_query($conn,$q1);

$r=mysqli_fetch_assoc($d);

$q2= "SELECT * FROM category";

$d2=mysqli_query($conn,$q2);

?>
<?php
//while($result=mysqli_fetch_assoc($data)){echo $result['category'];}

if(isset($_POST['update']))
{
    $id=$_POST['id'];
    $sub=$_POST['subcategory'];
    $cat=$_POST['category'];

    $q="UPDATE subcategory set subcategory='$sub',category='$cat' where id='$id'";

    $data=mysqli_query($conn,$q);

    if($data)
    {
    ?>
        <script>
        alert('Subcategory Updated');
        window.location="managesubcategory.php";
        </script>
    <?php
    }
    else
    {
    ?>
        <script>
        alert('Failed to Updated');
        header.location="managesubcategory.php";
        </script>
    <?php
    }
}
?>  




<!DOCTYPE html>
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;6
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Add Sub-category</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <?php
        include('sidenav.php');
        include('topnav.php');
        ?>


            <!-- Form Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary rounded h-100 p-4">
                            <form action="" method="post">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label"></label>
                                    <input type="hidden" class="form-control" id="exampleInputEmail1" name="id" value="<?php echo $r['id'];  ?>">
                                    <label for="exampleInputEmail1" class="form-label">SUB-CATEGORY</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="subcategory" value="<?php echo $r['subcategory'];  ?>">
                                </div>
                                <div class="mb-3">

                                <select name="category" class="form-control"   required>
                                
                                <?php
                               while($r2=mysqli_fetch_assoc($d2))
                                {
                                ?>
                                    <option value="<?php echo $r2['id'];?>"> <?php echo $r2['category']; ?> </option>                   
                                <?php
                                }
                                ?>
                                </select><br>
                              <button type="submit" class="btn btn-primary" name="update">Update</button>

                                </div>
                                
                            </form>
                        </div>
                    </div>

                </div>
            </div>
            <!-- Form End -->
            <?php
            include('footer.php');
            ?>      
</body>

</html>