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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Manage-Category</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 
    
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


            <!-- Table Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Category</h6>
                            <div class="table-responsive">
                                
                                <?php    
                        
                                $q="SELECT * from category order by id desc";
                                
                                $data=mysqli_query($conn,$q);

                                $total=mysqli_num_rows($data);
                                
                                if($total!=0)
                                {   
                                ?>
                                    <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">CATEGORY</th>
                                            <th scope="col">CATEGORY-IMAGE</th>
                                            <th scope="col">MANAGE</th>
                                        </tr>
                                    </thead>
                                <?php
                                    while($result=mysqli_fetch_assoc($data))
                                    {
                                        ?>
                                        
                                        <tr>
                                            <td><?php echo $result['id']; ?></td>
                                            <td><?php echo $result['category']; ?></td>
                                            <td><img src="<?php echo $result['img']; ?>" height="100px" class=""></td>
                                            <td><a href="edit-category.php?cat_id=<?php echo $result['id']; ?>"  class="btn btn-success mr-2">Edit</a>
                                            <a href="deletecategory.php?cat_id=<?php echo $result['id']; ?>"  class="btn btn-danger">Delete</a></td>
                                        </tr>
                                   <?php 
                                   }
                                }
                                else
                                {
                                        echo"<script>alert*('Table has no records')</script>";
                                }
                                ?>        
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Table End -->

            <?php
            include('footer.php');
            ?>
            
</body>

</html>