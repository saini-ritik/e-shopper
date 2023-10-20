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

$cate="SELECT * FROM category";
$category=mysqli_query($conn,$cate);


if(isset($_POST['add'])) // if Add button is clicked
{
    //print_r($_FILES['image']);
    //exit();
    $productname=mysqli_real_escape_string($conn,$_POST['productname']);// initializtion
    $productdetail=mysqli_real_escape_string($conn,$_POST['productdetail']);// initializtion
    $productprice=mysqli_real_escape_string($conn,$_POST['productprice']);// initializtion
    $description=mysqli_real_escape_string($conn,$_POST['description1']);// initializtion
    $colours=mysqli_real_escape_string($conn,$_POST['colours']);// initializtion
    //$productimage=$_POST['image'];// initializtion
    $subcategory=$_POST['subcategory'];// initializtion

    //image uploading// 
    $imagename=rand(0000,99999).basename($_FILES['image']['name']);
    //$imagetype=$_FILES(['image']['type']);
    //$imagesize=$_FILES(['image']['size']);
    $temp=$_FILES['image']['tmp_name'];

    $path="img2/";
    $dir=$path.basename($imagename);
    $upload=move_uploaded_file($temp,$dir);

    //FOR IMAGE 2

    $imagenamee=rand(0000,99999).basename($_FILES['imagee']['name']);
    $tempp=$_FILES['imagee']['tmp_name'];
    $pathh="img2/";
    $dirr=$pathh.basename($imagenamee);
    $uploadd=move_uploaded_file($tempp,$dirr);




    

    if($upload)
    {
        $query="insert into product (productname,productdetail, productprice, productimage,productimagee,subcategory,description,colours) values('$productname','$productdetail','$productprice','$dir','$dirr','$subcategory','$description','$colours')";

        $data=mysqli_query($conn,$query); // for executing query how may times query is executed 
    
    if($data)
    {
?>
        <script>
        alert('Product Added')
        window.location="manageproduct.php";
        </script>    
    <?php
    }
    else
    {
    ?>
        <script>
        alert('Failed to Add')
        window.location="addproduct.php";
        </script>
    <?php
    }
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
    <script>
function getsubcategory(val) 
{
	//alert(val);
	$.ajax
    ({
	type: "POST",
	url: "get_subcategory.php",
	data:'category='+val,
	success: function(data)
    {
		$("#subcat").html(data);
	}
	});
}


    </script>
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
                                    <label for="exampleInputEmail1" class="form-label">PRODUCT NAME</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="productname" required>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">PRODUCT DETAIL</label>
                                    <input type="textarea" class="form-control" id="exampleInputPassword1" name="productdetail" required>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">PRODUCT PRICE</label>
                                    <input type="text" class="form-control" id="exampleInputPassword1" name="productprice" required>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">PRODUCT IMAGE</label>
                                    <input type="file" class="form-control" id="exampleInputPassword1" name="image" required>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">PRODUCT IMAGE II</label>
                                    <input type="file" class="form-control" id="exampleInputPassword1" name="imagee" required>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">CATEGORY</label>
                                    <select name="subcategory" class="form-control" id="cat"  required onchange="getsubcategory(this.value)">
                                    <?php
                                    while($rcat=mysqli_fetch_assoc($category))
                                    {
                                    ?>
                                        <option value="<?php echo $rcat['id']; ?>"><?php echo $rcat['category'];?></option>
                                    <?php
                                    }
                                    ?>
                                    </select><br>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label"   >SUB-CATEGORY</label>
                                    <select name="subcategory" class="form-control" id="subcat"  required>
                                    
                                    </select><br>
                                </div>
                                    <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">DESCRIPTION</label>
                                    <input type="text" class="form-control" id="exampleInputPassword1" name="description1" required>
                                    </div>
                                    <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Colours Available</label>
                                    <input type="text" class="form-control" id="exampleInputPassword1" name="colours" required>
                                </div>
                                    <button type="submit" class="btn btn-primary" name="add">Add</button>
                                </div>
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