<?php
include("admin/connection.php");
 $val=$_REQUEST['serachvalue'];
$pro="SELECT * FROM product where productname like '%$val%' or productdetail like '%$val%'";


$qry=mysqli_query($conn,$pro);
while($r=mysqli_fetch_assoc($qry))
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
