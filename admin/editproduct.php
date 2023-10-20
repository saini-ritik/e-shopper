<?php
session_start();
include('connection.php');

if (!isset($_SESSION['user'])) {
    header('location:index.php');
    exit();
}

include('connection.php');

$product_id = $_REQUEST['product_id'];

$q1 = "SELECT * FROM product WHERE id='$product_id'";
$d1 = mysqli_query($conn, $q1);
$r1 = mysqli_fetch_assoc($d1); // Fetching Product Id

$q2 = "SELECT * FROM subcategory";
$d2 = mysqli_query($conn, $q2);

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $productname = mysqli_real_escape_string($conn, $_POST['productname']);
    $productdetail = mysqli_real_escape_string($conn, $_POST['productdetail']);
    $productprice = mysqli_real_escape_string($conn, $_POST['productprice']);
    $subcategory = mysqli_real_escape_string($conn, $_POST['subcategory']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);

    $imagename = rand(0000, 99999) . basename($_FILES['productimage']['name']);
    $temp = $_FILES['productimage']['tmp_name'];
    $path = "img2/";
    $dir = $path . $imagename;
    $upload = move_uploaded_file($temp, $dir);

    // FOR SECOND IMAGE

    $imagenameee = rand(0000, 99999) . basename($_FILES['productimageee']['name']);
    $temppp = $_FILES['productimageee']['tmp_name'];
    $pathhh = "img2/";
    $dirrr = $pathhh . $imagenameee;
    $uploaddd = move_uploaded_file($temppp, $dirrr);

    $q = "UPDATE product SET productname='$productname', productdetail='$productdetail',
    productprice='$productprice', productimage='$dir', productimagee='$dirrr', subcategory='$subcategory', description='$description' WHERE id='$id'";

    $d = mysqli_query($conn, $q);

    if ($d) {
        ?>
        <script>
        alert('Product Updated');
        window.location = "manageproduct.php";
        </script>
        <?php
    } else {
        ?>
        <script>
        alert('Failed to Update Product');
        window.location = "manageproduct.php";
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
    <title>Add-Product</title>
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
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="mb-3">
                                     <label for="exampleInputEmail1" class="form-label"></label>
                                    <input type="hidden" class="form-control" id="exampleInputEmail1" name="id" value="<?php echo $r1['id']; ?>" required>
                                    <label for="exampleInputEmail1" class="form-label">PRODUCT NAME</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="productname" value="<?php echo $r1['productname']; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">PRODUCT DETAIL</label>
                                    <input type="textarea" class="form-control" id="exampleInputPassword1" name="productdetail" required value="<?php echo $r1['productdetail']; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">PRODUCT PRICE</label>
                                    <input type="text" class="form-control" id="exampleInputPassword1" name="productprice" required value="<?php echo $r1['productprice']; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">PRODUCT IMAGE</label>
                                    <input type="file" class="form-control" id="exampleInputPassword1" name="productimage">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">PRODUCT IMAGE II</label>
                                    <input type="file" class="form-control" id="exampleInputPassword1" name="productimageee">
                                </div>
                                <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">SUBCATEGORY</label>
                                <select name="subcategory" class="form-control"   required> 
                                <?php
                                while($r2=mysqli_fetch_assoc($d2))
                                {
                                ?>
                                   <option value="<?php echo $r2['id'];?>"> <?php echo $r2['subcategory'];  ?></option>                           
                                <?php
                                }
                                ?>
                                </select><br>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">DESCRIPTION</label>
                                    <input type="text" class="form-control" id="exampleInputPassword1" name="description" required value="<?php echo $r1['description'];?>">
                                </div>
                                <button type="submit" class="btn btn-primary" name="update">update</button>
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

