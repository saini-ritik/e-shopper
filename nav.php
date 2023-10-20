<?php

include('admin/connection.php');

$q="SELECT * FROM category";

$d=mysqli_query($conn,$q);

$q4="SELECT * from cart where useremail= '".$_SESSION['user']."'";

$d3=mysqli_query($conn,$q4);

$total=mysqli_num_rows($d3);

?>

<?php
$q25="SELECT * FROM wishlist WHERE useremail='".$_SESSION['user']."'";

$wishlist=mysqli_query($conn,$q25);

$total3=mysqli_num_rows($wishlist);

?>

<!-- Navbar Start -->
<div class="container-fluid bg-dark mb-30">
        <div class="row px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn d-flex align-items-center justify-content-between bg-primary w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; padding: 0 30px;">
                    <h6 class="text-dark m-0"><i class="fa fa-bars mr-2"></i>Categories</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 999;">
                    <div class="navbar-nav w-100">
                        <div class="nav-item dropdown dropright">
                                
                            <?php
                            while ($r = mysqli_fetch_assoc($d))
                            {
                            ?>
                                <div class="dropdown">
                                    <a href="subcategoryprdct.php?c_id=<?php echo $r['id']; ?>" class="nav-link" data-toggle="dropdown"><?php echo $r['category']; ?></a>
                                    <div class="dropdown-menu position-absolute rounded-0 border-0 m-0">
                                        <?php
                                        $q1 = "SELECT * FROM subcategory where category='" . $r['id'] . "'";
                                        $d1 = mysqli_query($conn, $q1);
                                        ?>
                            
                                        <?php
                                        while ($r1 = mysqli_fetch_assoc($d1)) 
                                        {
                                        ?>
                                            <a href="subcategoryprdct.php?s_id=<?php echo $r1['id']; ?>" class="dropdown-item"><?php echo $r1['subcategory']; ?></a>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                            
                        </div>
                    </div>
                </nav>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <span class="h1 text-uppercase text-dark bg-light px-2">Multi</span>
                        <span class="h1 text-uppercase text-light bg-primary px-2 ml-n1">Shop</span>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="index.php" class="nav-item nav-link active">Home</a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages <i class="fa fa-angle-down mt-1"></i></a>
                                <div class="dropdown-menu bg-primary rounded-0 border-0 m-0">
                                    <a href="cart.php" class="dropdown-item">Shopping Cart</a>
                                    <a href="checkout.php" class="dropdown-item">Checkout</a>
                                    <a href="wishlist.php" class="dropdown-item">Wish List</a>
                                </div>
                            </div>
                            <a href="contact.php" class="nav-item nav-link">Contact</a>
                        </div>
                        <div class="navbar-nav ml-auto py-0 d-none d-lg-block">
                            <a href="wishlist.php" class="btn px-0">
                                <i class="fas fa-heart text-primary"></i>
                                <a href="wishlist.php"><span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;"><?php echo $total3 ?></span></a>
                            </a>
                            <a href="cart.php" class="btn px-0 ml-3">
                                <i class="fas fa-shopping-cart text-primary"></i>
                               <a href="cart.php"><span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;"><?php echo $total ?></span></a>
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->
