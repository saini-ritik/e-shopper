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
    <title>Manage Product</title>
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
                            <h6 class="mb-4">Product</h6>
                            <div class="table-responsive">
                                <?php
                                    $q="SELECT product.id,product.dateandtime,product.productname,
                                    product.productdetail,product.productprice,product.description,
                                    product.productimage,product.subcategory,subcategory.subcategory,subcategory.id as subcatid
                                     from `product` left join  subcategory on product.subcategory=subcategory.id order by id desc";
                        
                                    $d=mysqli_query($conn,$q);

                                    $t=mysqli_num_rows($d);


                                    if($t!=0)
                                    {
                                    ?>
                                        <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">DATE&TIME</th>
                                            <th scope="col">PRODUCT NAME</th>
                                            <th scope="col">PRODUCT DETAIL</th>
                                            <th scope="col">PRODUCT PRICE</th>
                                            <th scope="col">IMAGE</th>                         
                                            <th scope="col">SUBCATEGORY</th>
                                            <th scope="col">DESCRIPTION</th>
                                            <th scope="col">SUBCAT ID</th>
                                            <th scope="col">MANAGE</th>
                                        </tr>
                                    </thead>
                                    <?php
                                        while($r=mysqli_fetch_assoc($d))
                                        {
                                        ?>
                                            <tr>
                                                <td><?php echo $r['id'];?> </td>
                                                <td><?php echo $r['dateandtime'];?> </td>
                                                <td><?php echo $r['productname'];?> </td>
                                                <td><?php echo $r['productdetail'];?> </td>
                                                <td><?php echo $r['productprice'];?> </td>
                                                <td><img src="<?php echo $r['productimage'];?>" height="100px"></td>
                                                <td><?php echo $r['subcategory'];?> </td>
                                                <td><?php echo $r['description'];?> </td>
                                                <td><?php echo $r['subcatid'];?> </td>
                                                <td><a href="editproduct.php?product_id=<?php echo $r['id'];?>"class="btn btn-success mr-2">Edit
                                                <a href="deleteproduct.php?product_id=<?php echo $r['id'];?>"class="btn btn-danger mr-2">Delete</td>
                                            </tr>
                                        <?php
                                        }
                                    }
                                    else
                                    {
                                    ?>
                                        <script>
                                        alert('Table has no records');
                                        header.location="manageproduct.php";
                                        </script>
                                    <?php
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