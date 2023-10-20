<?php
include_once('admin/connection.php');

$ct_id=$_REQUEST['ct_id'];

$req="Select * from product";

$qr=mysqli_query($conn,$req);

$cat=mysqli_fetch_assoc($qr);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>MultiShop</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">  

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<div class="container-fluid pt-5 pb-3">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Recent Products</span></h2>
        <div class="row px-xl-5" id ="searchh">
            <?php
            while($cat=mysqli_fetch_assoc($qr))
            {
                ?>
                <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <div class="product-item bg-light mb-4">
                    <div class="product-img position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="<?php echo "admin/".$cat['productimage']; ?>" alt="" style="height:350px">
                        <div class="product-action">
                            <a class="btn btn-outline-dark btn-square" href="singleproduct.php?s_id=<?php echo $cat['id'];?>"><i class="fa fa-shopping-cart"></i></a>
                            <form action="" method="post">
                            <input type="hidden" name="n_id" value="<?php echo $cat['id'];?>">
                            <button type="submit" name="wish" class="btn"><a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a></button>
                            </form>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>
                        </div>
                    </div>
                    <div class="text-center py-4">
                        <a class="h6 text-decoration-none text-truncate" href=""><?php echo $cat['productname'];?></a>
                        <div class="d-flex align-items-center justify-content-center mt-2">
                            <h5><?php echo $cat['productprice']; ?></h5>
                        </div>
                        <div class="d-flex align-items-center justify-content-center mb-1">
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                        </div>
                        <form action="" method="post">
                        <input type="hidden" name="ad_id" value="<?php echo $cat['id'];?>">
                        <button type="submit" class="btn btn-primary px-3" name="addcart"><i class="fa fa-shopping-cart mr-1"></i>Add To Cart</button>
                        </form>
                    </div>
                </div>
            </div>          
            <?php
            }
            ?>
            </div>   

