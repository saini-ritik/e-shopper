<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <link rel="stylesheet" href="index.css">
    <!--bootstrap css-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!--bootstrap script-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <!--font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="top-nav-bar">
        <div class="search-box">
            <i class="fa-solid fa-bars" id="menu-btn" onclick="openmenu()"></i>
            <i class="fa-solid fa-times" id="close-btn" onclick="closemenu()"></i>
            <img src="images.png"  class="logo">
            <input type="text" class="form-control">
            <span class="input-group-text"><i class="fa-solid fa-magnifying-glass"></i></span>
        </div>

        <div class="menubar">
            <ul>
                <li><a href="#"><i class="fa-solid fa-globe"></i></a></li>
                <li><a href="#"><i class="fa-solid fa-bag-shopping"></i></i></a></li>
                <li><a href="#"><i class="fa-solid fa-cart-shopping"></i></a></li>
                <li><a href="#"><i class="fa-solid fa-user"></i></a></li>
            </ul>
        </div>
    </div>

    <!--Sibgle Product-->
    <section class="single-product">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div id="carouselExampleDark" class="carousel carousel-dark slide">
                        <div class="carousel-indicators">
                          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>
                        
                        <div class="carousel-inner">
                          <div class="carousel-item active" data-bs-interval="10000">
                            <img src="m7.jpg" class="d-block" class="img-fluid"alt="..." width="100%">
                            <div class="carousel-caption d-none d-md-block">
                              
                            </div>
                          </div>
                          <div class="carousel-item" data-bs-interval="2000">
                            <img src="m9.jpg" class="d-block" class="img-fluid"alt="..." width="100%">
                            <div class="carousel-caption d-none d-md-block">
                             
                            </div>
                          </div>
                        </div>
                        
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Next</span>
                        </button>
                      </div>
                </div>
                    <div class="col-md-7">
                        <p class="new-arival text-center">NEW</p>
                        <h2>Best Camera</h2>
                        <p>Product code: IRSC2019</p>

                        <div class="product-bottom">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half"></i>

                            <p class="price">USD $15.00</p>
                            <p><b>Availability:</b>In Stock</p>
                            <p><b>Company:</b>xyz Company</p>
                            <label>Quantity:</label>
                            <input type="text" value="1"><br><br>
                            <button type="button" class="btn btn-primary">Add to Cart</button>
                            <button type="button" class="btn btn-primary">Buy Now</button>
                        </div>
                    </div>

            </div>
        </div>
    </section>







    <!--footer section-->
<section class="footer">
    <div class="container text-center">
        <div class="row">
            <div class="col-md-3">
                <h1>Useful Links</h1>
                <p>Privacy Policy</p>
                <p>Terms of Use</p>
                <p>Retun Policy</p>
                <p>Discount Coupans</p>
            </div>


            <div class="col-md-3">
                <h1>Company</h1>
                <p>About Us</p>
                <p>Contact us</p>
                <p>Career</p>
                <p>Affiliate</p>
            </div>

            <div class="col-md-3">
                <h1>Follow Us</h1>
                <p><i class="fa-brands fa-facebook"></i>&nbsp;&nbsp;&nbsp;Facebook</p>
                <p><i class="fa-brands fa-instagram"></i>&nbsp;&nbsp;&nbsp;Instagram</p>
                <p><i class="fa-brands fa-twitter"></i>&nbsp;&nbsp;&nbsp;Twitter</p>
                <p><i class="fa-brands fa-linkedin-in"></i>&nbsp;&nbsp;&nbsp;Linkedin </p>
            </div>
            <div class="col-md-3 footer-image">
                <h1>Download App</h1>
                <img src="m45.png">
            </div>
        </div>
        <hr size="10">
        <p class="copyright">Made by Shubham</p>
    </div>
</section>



    <script>
        function openmenu()
        {
            document.getElementById("side-menu").style.display="block";
            document.getElementById("menu-btn").style.display="none";
            document.getElementById("close-btn").style.display="block";
        }
        function closemenu()
        {
            document.getElementById("side-menu").style.display="none";
            document.getElementById("menu-btn").style.display="block";
            document.getElementById("close-btn").style.display="none";
        }
    </script>

</body>
</html>