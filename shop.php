<?php
session_start();
$search=$_GET['search'];


include_once('admin/connection.php');

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
if(isset($_POST['addcart']))
{
    $ad_id=$_POST['ad_id'];

    $q77="INSERT INTO cart(productid,useremail) VALUES ('$ad_id','".$_SESSION['user']."')";

    $d99=mysqli_query($conn,$q77);

    if($d99)
    {
        ?>
        <script>
        alert('Added To Cart');
        window.location="cart.php";
        </script>
        <?php
    }
    else
    {
        ?>
        <script>
        alert('Failed To Add To Cart');
        window.location="shop.php";
        </script>
        <?php
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>MultiShop - Online Shop Website Template</title>
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
    <script>
        function getproduct(val)
        {
            //alert(val);
            $.ajax
            ({
                type:"POST",
                url:"search.php",
                data:'serachvalue='+val,
                success: function(data)
                {
                    $("#searchh").html(data);
                }
            })
        }
    </script>
</head>

<body>
    <?php
    include('topbar.php');
    include('nav.php');
    ?>



<!--Products Start-->
<?php
include_once('admin/connection.php');


$rows_per_page = 8; 

$q="SELECT * FROM product  where productname like '%$search%'  or productdetail like '%$search%'";

$d=mysqli_query($conn,$q);

 $total_row = mysqli_num_rows($d); 

 $number_of_page = ceil ($total_row / $rows_per_page); 

 if (!isset ($_GET['page']) ) 
 {  
    $page = 1;  
 }
 else
 {  
    $page = $_GET['page'];  
 }  
 $offset = ($page-1) * $rows_per_page;  

 $newq=$q." limit ".$offset.",".$rows_per_page;

 $d1=mysqli_query($conn,$newq);

?>
<input type="text" value="" id="row" class="ml-5 pl-3" style="outline:none" onkeyup="getproduct(this.value)" placeholder="search">
<div class="container-fluid pt-5 pb-3">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Recent Products</span></h2>
        <div class="row px-xl-5" id ="searchh">
            <?php
            while($r=mysqli_fetch_assoc($d1))
            {
                ?>
                <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <div class="product-item bg-light mb-4">
                    <div class="product-img position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="<?php echo "admin/".$r['productimage']; ?>" alt="" style="height:350px">
                        <div class="product-action">
                            <a class="btn btn-outline-dark btn-square" href="singleproduct.php?s_id=<?php echo $r['id'];?>"><i class="fa fa-shopping-cart"></i></a>
                            <form action="" method="post">
                            <input type="hidden" name="n_id" value="<?php echo $r['id'];?>">
                            <button type="submit" name="wish" class="btn"><a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a></button>
                            </form>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>
                        </div>
                    </div>
                    <div class="text-center py-4">
                        <a class="h6 text-decoration-none text-truncate" href=""><?php echo $r['productname'];?></a>
                        <div class="d-flex align-items-center justify-content-center mt-2">
                            <h5><?php echo $r['productprice']; ?></h5>
                        </div>
                        <div class="d-flex align-items-center justify-content-center mb-1">
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                        </div>
                        <form action="" method="post">
                        <input type="hidden" name="ad_id" value="<?php echo $r['id'];?>">
                        <button type="submit" class="btn btn-primary px-3" name="addcart"><i class="fa fa-shopping-cart mr-1"></i>Add To Cart</button>
                        </form>
                    </div>
                </div>
            </div>          
            <?php
            }
            ?>
            </div>   

            <div class="col-12">
                <nav>
                    <ul class="pagination justify-content-center">
                        <li class="page-item"><a class="page-link" href="?page=<?php echo ($page - 1);?>">Previous</span></a></li>
                        <?php
                        for($page = 1; $page<= $number_of_page; $page++)
                        {
                        ?>
                        <li class="page-item "><?php echo '<a class="page-link" href="shop.php?page='.$page.'">'.$page.'</a>';?></li>
                        <?php
                        }
                        ?>
                        <li class="page-item"><a class="page-link" href="?page=<?php echo ($page + 1);?>">Next</a></li>
                        
                    </ul>
                </nav>
            </div>

        </div>
    </div>


    <?php

// for($page = 1; $page<= $number_of_page; $page++) {  
//     echo '<a href = "shop.php?page=' . $page . '">' . $page . ' </a>';  
// }  
?>
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