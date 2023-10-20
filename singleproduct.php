
<?php
session_start();

include_once('admin/connection.php');

$s_id=$_REQUEST['s_id']; 

$qry="SELECT * FROM product where id='$s_id'";

$sql=mysqli_query($conn,$qry);

$single=mysqli_fetch_assoc($sql);
?>
<?php 
 
$sq="SELECT * FROM product where subcategory='".$single['subcategory']."' and id !='".$s_id."'";


$sqle=mysqli_query($conn,$sq);

//$related=mysqli_fetch_assoc($sqle);

?>

<?php
include_once("admin/connection.php");

$rv_id = $single['id'];

$rat="SELECT product.id,product.productimage,product.productname,product.productprice,review.username,review.email,review.date,review.review,review.rating from `review` left join  product on product.id=review.productid where review.email='".$_SESSION['user']."' AND product.id='" .$s_id. "'";

$qrry=mysqli_query($conn,$rat);

//$result=mysqli_fetch_assoc($qrry);

$recrd=mysqli_num_rows($qrry);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Product</title>
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

<body>
    <?php
    include('topbar.php');
    include('nav.php');
    ?>

    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">Home</a>
                    <a class="breadcrumb-item text-dark" href="#">Shop</a>
                    <span class="breadcrumb-item active">Shop Detail</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Shop Detail Start -->
    <div class="container-fluid pb-5">
        <?php
        ?>
        <div class="row px-xl-5">
            <div class="col-lg-5 mb-30">
                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner bg-light">
                        <div class="carousel-item active">
                            <img class="w-100 h-100" src="<?php echo "admin/".$single['productimage'];?>" style="height:350px"alt="Image" >
                        </div>
                        <div class="carousel-item">
                            <img class="w-100 h-100" src="<?php echo "admin/".$single['productimagee'];?>" style="height:350px"alt="Image">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                        <i class="fa fa-2x fa-angle-left text-dark"></i>
                    </a>
                    <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                        <i class="fa fa-2x fa-angle-right text-dark"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-7 h-auto mb-30">
                <div class="h-100 bg-light p-30">
                    <h3><?php echo $single['productname'];?></h3>
                    <div class="d-flex mb-3">
                            <h4>Price</h4>
                    </div>
                    <h3 class="font-weight-semi-bold mb-4"><?php echo $single['productprice'];?></h3>
                    <p class="mb-4"><?php echo $single['productdetail'];?></p>
                    
                    <div class="d-flex mb-4">
                        <strong class="text-dark mr-3">Colors:</strong>
                        <form action="" method="post">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="checkbox" class="custom-control-input" value="Black" id="color-1" name="colr[]">
                                <label class="custom-control-label" for="color-1">Black</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="checkbox" class="custom-control-input" value="white" id="color-2" name="colr[]">
                                <label class="custom-control-label" for="color-2">White</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="checkbox" class="custom-control-input" value="red" id="color-3" name="colr[]">
                                <label class="custom-control-label" for="color-3">Red</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="checkbox" class="custom-control-input" value="blue" id="color-4" name="colr[]">
                                <label class="custom-control-label" for="color-4">Blue</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="checkbox" class="custom-control-input" value="green" id="color-5" name="colr[]">
                                <label class="custom-control-label" for="color-5">Green</label>
                            </div>
            
                    </div>
                    <div class="d-flex align-items-center mb-4 pt-2">
                        <div class="input-group quantity mr-3" style="width: 130px;">
                            <div class="input-group-btn">
                                <button class="btn btn-primary btn-minus">
                                    <i class="fa fa-minus"></i>
                                </button>
                            </div>
                            
                            <input type="text" class="form-control bg-secondary border-0 text-center" name="quantity">
                            <div class="input-group-btn">
                                <button class="btn btn-primary btn-plus">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>
                    

                        <?php
                        if(isset($_POST['add_to_cart']))
                        {
                            $proid = $_POST['proid'];

                            $quantity = $_POST['quantity'];

                        
                            $qry4 = "INSERT INTO cart (productid, useremail, quantity) VALUES ('$proid', '".$_SESSION['user']."', '$quantity')";
                        
                            $qry3 = mysqli_query($conn, $qry4);
                        
                            if($qry3)
                            {
                                ?>
                                <script>
                                alert("Product Added to Cart");
                                window.location = "cart.php";
                                </script>
                                <?php
                            }
                            else
                            {
                                ?>
                                <script>
                                alert("Failed to Add to Cart");
                                window.location = "singleproduct.php";
                                </script>
                                <?php
                            }
                        }
                        ?>
                        
                
                        <input type="hidden" name="proid" value="<?php echo $rv_id ?>">
                        <button type="submit" class="btn btn-primary px-3" name="add_to_cart"><i class="fa fa-shopping-cart mr-1"></i>Add To Cart</button>
                        </form>
                    </div>
                    <div class="d-flex pt-2">
                        <strong class="text-dark mr-2">Share on:</strong>
                        <div class="d-inline-flex">
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-pinterest"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="bg-light p-30">
                    <div class="nav nav-tabs mb-4">
                        <a class="nav-item nav-link text-dark active" data-toggle="tab" href="#tab-pane-1">Description</a>
                        <a class="nav-item nav-link text-dark" data-toggle="tab" href="#tab-pane-3">Review(<?php echo $recrd;?>)</a>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tab-pane-1">
                            <h4 class="mb-3">Product Description</h4>
                            <p><?php echo $single['description'];?></p>                         
                        </div>
                       


        <!---Review Start--->
    
    
        <div class="tab-pane fade" id="tab-pane-3">
    <div class="row">
        <div class="col-md-6">
            <?php
            while($result=mysqli_fetch_assoc($qrry))
            {                           
            ?>
            <div class="media mb-4">
                <img src="img/user.jpg" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
                <div class="media-body">
                    <h6><?php echo $result['username'];?><small> - <i><?php echo $result['date'];?></i></small></h6>
                    <div class="text-primary mb-2">
                        <?php
                        $i=$result['rating'];
                        for($j=0;$j<$i;$j++)
                        {
                        ?>
                            <i class="fas fa-star"></i>
                        <?php
                        }
                        ?>                               
                    </div>
                    <p><?php echo $result['review'];?></p>
                </div>
            </div>
            <?php
            }
            ?>
        </div>
        <div class="col-md-6">
            <h4 class="mb-4">Leave a review</h4>
            <div class="d-flex my-3">
                <p class="mb-0 mr-2">Your Rating  :</p>
                <div class="text-primary">
                    <i class="far fa-star"></i>
                    <i class="far fa-star"></i>
                    <i class="far fa-star"></i>
                    <i class="far fa-star"></i>
                    <i class="far fa-star"></i>
                </div>
            </div>
            <form action="" method="post">
                <div class="form-group">
                    <label for="message">Add Rating</label>
                    <input type="number" cols="30" rows="5" class="form-control" name="rating" required>
                </div>
                <div class="form-group">
                    <label for="message">Your Review</label>
                    <textarea id="message" cols="30" rows="5" class="form-control" name="view" required></textarea>
                </div>
                <div class="form-group mb-0">
                    <input type="hidden" name="rv_id" value="<?php echo $single['id'];?>">
                    <input type="submit" value="Leave Your Review" name="review" class="btn btn-primary px-3" required>
                </div>
            </form>
            <?php
            if(isset($_POST['review']))
            {
                $rv_id=$_POST['rv_id'];     
                $rating=$_POST['rating'];
                $view=$_POST['view'];

                $rev="INSERT INTO review(productid,email,username,review,rating) VALUES ('$rv_id','".$_SESSION['user']."','".$_SESSION['username']."','$view','$rating')";

                $revv=mysqli_query($conn,$rev);

                if($revv)
                {
                ?>
                <script>
                alert("Review Added");
                window.location="singleproduct.php?s_id=<?php echo $s_id; ?>";
                </script>
                <?php
                }
                else
                {
                ?>
                <script>    
                alert("Failed To Add Review");
                window.location="singleproduct.php?s_id=<?php echo $s_id; ?>";
                </script>
                <?php
                }
            }
            ?>
        </div>
    </div>
</div>



<!---Review end-->

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Detail End -->
    

    <!-- Products Start -->

    <div class="container-fluid py-5">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">You May Also Like</span></h2>
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel related-carousel">
                    <?php
                    if(isset($_POST['wish']))
                    {
                        $n_id=$_POST['n_id'];                      

                        $qry41="INSERT INTO wishlist(productid,useremail) values ('$n_id','".$_SESSION['user']."')";

                        $qry33=mysqli_query($conn,$qry41);
     
                    if($qry33)
                    {
                        ?>
                        <script>
                        alert("Product Added to Wishlist");
                        window.location="wishlist.php";
                        </script>
                        <?php
                    }
                    else
                    {
                        ?>
                        <script>
                        alert("Failed to Add to Wishlist");
                        window.location="shop.php";
                        </script>
                        <?php
                    }
                    }
                    ?>
                    <?php
                    while($related=mysqli_fetch_assoc($sqle))
                    { 
                    ?>
                    <div class="product-item bg-light">
                        <div class="product-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="<?php echo "admin/".$related['productimage'];?>" alt="" style="height:350px">
                            <div class="product-action">
                                <a class="btn btn-outline-dark btn-square" href="singleproduct.php?s_id=<?php echo $related['id'];?>"><i class="fa fa-shopping-cart"></i></a>
                                <form action="" method="post">
                                <input type="hidden" name="n_id" value="<?php echo $single['id'];?>">
                                <button type="submit" name="wish" class="btn"><a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a></button>
                                </form>
                                <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <a class="h6 text-decoration-none text-truncate" href=""><?php echo $related['productname'];?></a>
                            <div class="d-flex align-items-center justify-content-center mt-2">
                                <h5><?php echo $related['productprice'];?></h5><h6 class="text-muted ml-2"></h6>
                            </div>
                            <div class="d-flex align-items-center justify-content-center mb-1">
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                            </div>
                            <form action="" method="post">
                            <input type="hidden" name="proid" value="<?php echo $single['id'];?>">
                            <button type="submit" class="btn btn-primary px-3" name="add_to_cart"><i class="fa fa-shopping-cart mr-1"></i>Add To Cart</button>
                            </form>
                        </div>
                    </div>
                    <?php
                    }
                    ?>               
                </div>
            </div>
        </div>
    </div>
    <!-- Products End -->


    <?php
    include('footer.php');
    ?>

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>