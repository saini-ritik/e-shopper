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
$query= "SELECT * FROM category";
$data1=mysqli_query($conn,$query);

//while($result=mysqli_fetch_assoc($data)){echo $result['category'];}

if(isset($_POST['add']))
{
     $sub=mysqli_real_escape_string($conn,$_POST['subcategory']);
     $cat=$_POST['category'];
    //exit();

    $q="insert into subcategory (subcategory, category) values('$sub','$cat')";

    $data=mysqli_query($conn,$q);

   if($data)
   {
    ?>
    <script>
    alert('Subcategory Added');
    window.location="managesubcategory.php";
    </script>
    <?php
   }
   else
   {
    ?>
    <script>
    alert('Failed');
    window.location="subcategory.php";
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
                                    <label for="exampleInputEmail1" class="form-label">SUB-CATEGORY</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="subcategory" required>
                                </div>
                                <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">CATEGORY</label>
                               

                                <select name="category" class="form-control"   required>
                                
                                <?php
                                while($result=mysqli_fetch_assoc($data1))
                                {
                                ?>
                                   <option value="<?php echo $result['id']; ?>"> <?php echo $result['category'];  ?></option>                           
                                <?php
                                }
                                ?>
                                </select><br>
                              <button type="submit" class="btn btn-primary" name="add">Add</button>

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