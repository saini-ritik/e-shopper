<!-- Categories Start -->
<?php

include_once('admin/connection.php');

$q="SELECT * FROM category order by id desc";
$d=mysqli_query($conn,$q);

//$r=mysqli_fetch_assoc($d);

?>
<div class="container-fluid pt-5">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Categories</span></h2>
        <div class="row px-xl-5 pb-3">
            <?php
            while($r=mysqli_fetch_assoc(($d)))
            {
                ?>
                <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <a class="text-decoration-none" href="subcategoryprdct.php?s_id=<?php echo $r['id'];?>">
                    <div class="cat-item d-flex align-items-center mb-4">
                        <div class="overflow-hidden" style="width: 100px; height: 100px;">
                            <a href="displaycategoryproduct.php?ct_id=<?php echo $r['id'];?>"><img class="img-fluid" src="<?php echo "admin/".$r['img'];?>" alt=""></a>
                        </div>
                        <div class="flex-fill pl-3">
                            <h6><?php echo $r['category'];?></h6>
                        </div>
                    </div>
                </a>
                </div>
                <?php
            }
            ?>
            </div>
    </div>
    <!-- Categories End -->
