<?php
include('query.php');
include('../admin-pannel/connection.php');?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>EShopper - Bootstrap Shop Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row align-items-center py-3 px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a href="" class="text-decoration-none">
                    <!-- <img src="eshopper-1.0.0/eshopper-1.0.0/img/logo" alt=""> -->
                    <img src="img/weblogo.png" alt="Logo" style="width:50%">
                    <!-- <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1> -->
                </a>
            </div>
            <div class="col-lg-6 col-6 text-left">
                <form action="">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for Products">
                        <div class="input-group-append">
                            <span class="input-group-text bg-transparent text-primary">
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-3 col-6 text-right">
                <a href="" class="btn border">
                    <i class="fas fa-heart text-primary"></i>
                    <span class="badge">0</span>
                </a>
                <a href="javascript:void(0);" class="btn border js-open-cart">
                    <i class="fas fa-shopping-cart text-primary"></i>
                    <span class="badge">               <?php
                $count=0;
                if(isset($_SESSION['cart'])){
                    $count=count($_SESSION['cart']);
                        echo $count;}
                
                ?></span>
                </a>
            </div>
        </div>
    </div>
    
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid mb-5">
        <div class="row border-top px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
                    <h6 class="m-0">Categories</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse show navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0" id="navbar-vertical">
                    <div class="navbar-nav w-100 overflow-hidden" style="height: 410px">
                        <!-- fetch categories -->
                        <?php
                        $fetch_cat=mysqli_query($con,"SELECT * FROM `categories`");
                        while( $Each_cat=mysqli_fetch_array($fetch_cat)){
                        ?>
                        <a href="shop.php?catid=<?php echo $Each_cat[0] ;?>" class="nav-item nav-link"><?php echo $Each_cat[1]; ?></a>
                        <?php }?>
                    </div>
                </nav>
                
<!-- CLOSE row -->
    </div>
    <div class="col-lg-9">
        <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
            <a href="" class="text-decoration-none d-block d-lg-none">
                n <!-- <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1> -->
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav mr-auto py-0">
                    <a href="index.php" class="nav-item nav-link ">Home</a>
                    <a href="shop.php" class="nav-item nav-link">Shop</a>
                    <a href="order.php" class="nav-item nav-link">Orders</a>
                    <a href="contact.php" class="nav-item nav-link">Help</a>
                </div>
                <div class="navbar-nav ml-auto py-0">
                    <a href="login.php" class="nav-item nav-link">Login</a>
                    <a href="Logout.php" class="nav-item nav-link">Logout</a>
                </div>
            </div>
        </nav>
        <div id="customSidebarCart" class="bg-white shadow" style="position: fixed; top: 0; right: 0; width: 400px; max-width: 100%; height: 100vh; z-index: 2050; transform: translateX(100%); transition: transform 0.3s ease-in-out;">

            <div class="d-flex justify-content-between align-items-center p-3 border-bottom">
                <h5 class="m-0 font-weight-bold text-dark">Your Cart</h5>
                <button type="button" class="btn text-dark p-0 js-close-cart" style="font-size: 1.5rem; line-height: 1;">&times;</button>
            </div>

            <div class="p-3 d-flex flex-column justify-content-between" style="height: calc(100vh - 70px); overflow-y: auto;">

                <ul class="list-unstyled m-0 p-0">
                    <?php 
if (isset($_SESSION['cart'])) {
    $amount=0;
    foreach($_SESSION['cart'] as $cartitems){
        $total=$cartitems['pprice']*$cartitems['pqty'];
        $amount+=$total
 ?>

                   <li class="d-flex align-items-center mb-3 pb-3 border-bottom position-relative">
        <div class="border mr-3" style="width: 70px; height: 70px; flex-shrink: 0;">
            <img src="../admin-pannel/img/<?php echo $cartitems['pimg'] ?>" alt="Product Image" class="w-100 h-100" style="object-fit: cover;">
        </div>
        <div class="flex-grow-1 pr-4">
            <a href="#" class="text-dark font-weight-semi-bold d-block text-decoration-none mb-1"><?php echo $cartitems['pname'] ?></a>
            <span class="text-muted small"><?php echo $cartitems['pqty'] ?> x PKR <?php echo $cartitems['pprice']?></span>
            <div style="position: absolute; right: 0; top: 50%; transform: translateY(-50%);">
            <a href="?dlt=<?php echo $cartitems['pid']; ?>" class="text-dark font-weight-bold text-decoration-none" style="font-size: 1.2rem;">
                &times;
            </a>
        </div>
    </li>
    <?php }}?>
                </ul>

                <div class="mt-auto border-top pt-3">
                    <div class="d-flex justify-content-between align-items-center mb-3" style="font-size: 1.1rem;">
                        <span class="text-muted">Total Value:</span>
                        <span class="font-weight-bold text-primary">PKR <?php echo $amount?></span>
                    </div>
                    <div class="d-flex">
                        <a href="checkout.php" class="btn btn-primary w-90 py-2 font-weight-semi-bold">Check Out</a>
                    </div>
                </div>
            </div>
        </div><div id="header-carousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#header-carousel" data-slide-to="0" class="active"></li>
        <li data-target="#header-carousel" data-slide-to="1"></li>
        <li data-target="#header-carousel" data-slide-to="2"></li>
    </ol>
    <!-- Changed bg-dark to bg-white so empty spaces blend in perfectly -->
    <div class="carousel-inner bg-white" style="height: 410px;">
        <div class="carousel-item active">
            <img class="w-100" src="img/slide 1.png" alt="Find a Gift They'll Adore" style="height: 410px; object-fit: contain;">
        </div>
        <div class="carousel-item">
            <img class="w-100" src="img/slide 2.png" alt="Gifts With a Personal Touch" style="height: 410px; object-fit: contain;">
        </div>
        <div class="carousel-item">
            <img class="w-100" src="img/slide 3.png" alt="Build the Perfect Hamper" style="height: 410px; object-fit: contain;">
        </div>
    </div>
    <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
        <div class="btn btn-dark" style="width: 45px; height: 45px;">
            <span class="carousel-control-prev-icon mb-n2"></span>
        </div>
    </a>
    <a class="carousel-control-next" href="#header-carousel" data-slide="next">
        <div class="btn btn-dark" style="width: 45px; height: 45px;">
            <span class="carousel-control-next-icon mb-n2"></span>
        </div>
    </a>
</div>
</div>
</div>
</div>

        <div class="js-cart-backdrop" style="position: fixed; top: 0; left: 0; width: 100vw; height: 100vh; background: rgba(0, 0, 0, 0.5); z-index: 2040; display: none;"></div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script>
            $(document).ready(function() {
                // Slide In the Sidebar Layout Panel
                $('.js-open-cart').on('click', function(e) {
                    e.preventDefault();
                    $('#customSidebarCart').css('transform', 'translateX(0)');
                    $('.js-cart-backdrop').fadeIn(200);
                });

                // Slide Out / Dismiss Sidebar Panel
                $('.js-close-cart, .js-cart-backdrop').on('click', function() {
                    $('#customSidebarCart').css('transform', 'translateX(100%)');
                    $('.js-cart-backdrop').fadeOut(200);
                });
            });
        </script>