<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>matrix</title>
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
            <img src="images.png"  class="logo">
            <input type="text" class="form-control">
            <span class="input-group-text"><i class="fa-solid fa-magnifying-glass"></i></span>
        </div>

        <div class="menubar">
            <ul>
                <li><a href="#"><i class="fa-solid fa-globe"></i></a></li>
                <li><a href="#"><i class="fa-solid fa-bag-shopping"></i></i></a></li>
                <li><a href="#"><i class="fa-solid fa-cart-shopping"></i></a></li>
                <li><a href="logout.php"><i class="fa-solid fa-user"></i></a></li>
            </ul>
        </div>
    </div>
     
    <!--Links nav bar-->

    <nav class="navbar navbar-expand-sm bg-body-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#"><i class="fa-solid fa-angle-left"></i></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Best Seller</a>
              </li><li class="nav-item">
                <a class="nav-link" href="#">Mobile</a>
              </li><li class="nav-item">
                <a class="nav-link" href="#">Customer Care</a>
              </li>
            </li><li class="nav-item">
                <a class="nav-link" href="#">Groceries</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Categories
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Electronics</a></li>
                  <li><a class="dropdown-item" href="#">Books</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Kitchen</a></li>
                </ul>
              
            </ul>
          </div>
        </div>
      </nav>
    
    <section class="header">
       <!--- <div class="side-menu" id="side-menu">
            <ul>
                <li>on sale<i class="fa-solid fa-angle-right"></i>
                <ul>
                <li>sub menu-1</li>
                <li>sub menu-1</li>
                <li>sub menu-1</li>
                <li>sub menu-1</li>
                </ul>
                </li>
                <li>electronics<i class="fa-solid fa-angle-right"></i>
                <ul>
                <li>sub menu-1</li>
                <li>sub menu-1</li>
                <li>sub menu-1</li>
                <li>sub menu-1</li>
                </ul>
                </li>
            </ul>
        </div>-->
        <div class="slider">
        <div id="carouselExampleDark" class="carousel carousel-dark slide">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            
            <div class="carousel-inner">
              <div class="carousel-item active" data-bs-interval="10000">
                <img src="m7.jpg" class="d-block w-100" class="img-fluid"alt="...">
                <div class="carousel-caption d-none d-md-block">
                  
                </div>
              </div>
              <div class="carousel-item" data-bs-interval="2000">
                <img src="m3.jpg" class="d-block w-100" class="img-fluid"alt="...">
                <div class="carousel-caption d-none d-md-block">
                 
                </div>
              </div>
              <div class="carousel-item">
                <img src="m12.jpg" class="d-block w-100" class="img-fluid"alt="...">
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
    </section>


<!--featured--->

<section class="featured-categories">
    <div class="container">
        <div class="row">
            <div class="col-md-4" >
                <img src="m4.jpg">
            </div>
            <div class="col-md-4">
                <img src="m5.jpg">
            </div>
            <div class="col-md-4">
                <img src="m7.jpg">
            </div>
        </div>
    </div>
</section>


<!--one sale products-->
<section class="on-sale">
    <div class="container">
        <div class="title-box">
            <h2>On sale</h2>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="product-top">
                    <img src="m69.jpg" width="100%">
                    
                </div>
                <div class="product-bottom text-center">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <h3>Phone</h3>
                    <h5>$20</h5>
                </div>
            </div>


            <div class="col-md-3">
                <div class="product-top">
                    <img src="m0.jpeg" width="100%">
                    
                </div>
                <div class="product-bottom text-center">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <h3>Laptop</h3>
                    <h5>$80</h5>
                </div>
            </div>


            <div class="col-md-3">
                <div class="product-top">
                  <a href="product.php"><img src="m20.jpeg" width="100%"></a>
                    
                </div>
                <div class="product-bottom text-center">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <h3>Camera</h3>
                    <h5>$30</h5>
                </div>
            </div>


            <div class="col-md-3">
                <div class="product-top">
                    <img src="h1.jpg" width="100%">
        
                </div>
                <div class="product-bottom text-center">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <h3>Curse Child Novel</h3>
                    <h5>$10</h5>
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
    
</body>
</html>