<!--Products Start-->
<?php

include_once('admin/connection.php');

$rowsperpage=8;

$q11="SELECT * FROM product";

$d11=mysqli_query($conn,$q11);

$totalrow=mysqli_num_rows($d11);

$no_ofpage=ceil ($totalrow / $rowsperpage);

if(!isset($_REQUEST['page']))
{
    $page = 1;
}
else
{
    $page = $_REQUEST['page']; 
}

$offset= ($page-1) * $rowsperpage;
 

$newqry=$q11." limit ".$offset.",".$rowsperpage;


$newrd=mysqli_query($conn,$newqry);


?>

<?php

if(isset($_POST['wishlist']))
{
     $prut_id=$_POST['prut_id'];

     $qry4="INSERT INTO wishlist(productid,useremail) values ('$prut_id','".$_SESSION['user']."')";

     $qry3=mysqli_query($conn,$qry4);
     
     if($qry3)
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
         window.location="index.php";
         </script>
         <?php
     }
}
?>
<?php
if(isset($_POST['cart']))
{
    $prr_id=$_POST['prr_id'];

    $q7="INSERT INTO cart(productid,useremail) VALUES ('$prr_id','".$_SESSION['user']."')";

    $d9=mysqli_query($conn,$q7);

    if($d9)
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
        window.location="index.php";
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
</head>



<div class="container-fluid pt-5 pb-3">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Recent Products</span></h2>
        <div class="row px-xl-5">
            <?php
            while($r11=mysqli_fetch_assoc($newrd))
            {
                ?>
                <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <div class="product-item bg-light mb-4">
                    <div class="product-img position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="<?php echo "admin/".$r11['productimage']; ?>" style="height:350px" alt="">
                        <div class="product-action">
                            <a class="btn btn-outline-dark btn-square" href="singleproduct.php?s_id=<?php echo $r11['id'];?>"><i class="fa fa-shopping-cart"></i></a>
                            <form action="" method="post">
                            <input type="hidden" name="prut_id" value="<?php echo $r11['id'];?>">
                            <button type=submit class="btn" name="wishlist"><a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a></button>
                            </form>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>
                        </div>
                    </div>
                    <div class="text-center py-4">
                        <a class="h6 text-decoration-none text-truncate" href=""><?php echo $r11['productname'];?></a>
                        <div class="d-flex align-items-center justify-content-center mt-2">
                            <h5><?php echo $r11['productprice']; ?></h5>
                        </div>
                        <div class="d-flex align-items-center justify-content-center mb-1">
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                        </div>
                        <form action="" method="post">
                        <input type="hidden" name="prr_id" value="<?php echo $r11['id'];?>">
                        <button type="submit" class="btn btn-primary px-3" name="cart"><i class="fa fa-shopping-cart mr-1"></i>Add To Cart</button>
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
                        <li class="page-item"><a class="page-link" href="?page=<?php echo ($page - 1); ?>">Previous</a></li>
                        <?php
                        for($page = 1; $page<= $no_ofpage; $page++)
                        {
                        ?>
                        <li class="page-item "><?php echo '<a class="page-link" href="recentproduct.php?page='.$page.'">'.$page.'</a>';?></li>
                        <?php
                        }
                        ?>
                        <li class="page-item"><a class="page-link" href="?page=<?php echo ($page + 1); ?>">Next</a></li>                      
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <!-- Products End -->
    
   
    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>
