<?php
include('query.php');
include('../admin-pannel/connection.php');
 ?>
<!-- Topbar Start -->

<!-- Navbar End -->
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

<!-- Page Header Start -->
<div class="container-fluid bg-secondary mb-5 " >
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Our Shop</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="">Home</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Shop</p>
        </div>
    </div>
</div>
<!-- Page Header End -->


<!-- Shop Start -->
<div class="container-fluid pt-5">
    <div class="row px-xl-5">
        <div class="row pb-3">
            <?php
            //  fetch products
            if (isset($_GET['catid'])) {
                $catid = $_GET['catid'];
                $fetch_pro = mysqli_query($con, "SELECT * FROM `products` WHERE category_Id =$catid");
                while ($each_pro = mysqli_fetch_array($fetch_pro)) {
            ?>
                    <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                        <div class="card product-item border-0 mb-4">
                            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                <img class="img-fluid w-100" style="height: 400px;" src="../admin-pannel/img/<?php echo $each_pro[10] ?>" alt="">
                            </div>
                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                <h6 class="text-truncate mb-3"><?php echo $each_pro[4] ?></h6>
                                <div class="d-flex justify-content-center">
                                    <h6>PKR <?php echo $each_pro[8] ?></h6>
                                    </h6>
                                </div>
                            </div>
                            <form action="" method="POST">
                                <input type="hidden" value="<?php echo $each_pro[0] ?>" name="proid">
                                <input type="hidden" value="<?php echo $each_pro[4] ?>" name="proname">
                                <input type="hidden" value="<?php echo $each_pro[8] ?>" name="proprice">
                                <input type="hidden" value="<?php echo $each_pro[10] ?>" name="proimg">
                                <input type="hidden" name="proqty" class="form-control bg-secondary text-center" value="1">
                                <div class="card-footer d-flex justify-content-between bg-light border">
                                    <a href="detail.php?proid=<?php echo $each_pro[0] ?>" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                                    <button type="submit" name="addtocart" class="btn btn-sm text-dark p-0 bg-transparent border-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</button>
                                </div>
                            </form>
                        </div>
                    </div>
                <?php
                }
            } else {
                $fetch_pro = mysqli_query($con, "SELECT * FROM `products`");
                while ($each_pro = mysqli_fetch_array($fetch_pro)) { ?>
                    <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                        <div class="card product-item border-0 mb-4">
                            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                <img class="img-fluid w-100" style="height: 400px;" src="../admin-pannel/img/<?php echo $each_pro[10] ?>" alt="">
                            </div>
                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                <h6 class="text-truncate mb-3"><?php echo $each_pro[4] ?></h6>
                                <div class="d-flex justify-content-center">
                                    <h6>PKR <?php echo $each_pro[8] ?></h6>
                                    </h6>
                                </div>
                            </div>
                            <form action="" method="POST">
                                <input type="hidden" value="<?php echo $each_pro[0] ?>" name="proid">
                                <input type="hidden" value="<?php echo $each_pro[4] ?>" name="proname">
                                <input type="hidden" value="<?php echo $each_pro[8] ?>" name="proprice">
                                <input type="hidden" value="<?php echo $each_pro[10] ?>" name="proimg">
                                <input type="hidden" name="proqty" class="form-control bg-secondary text-center" value="1">
                                <div class="card-footer d-flex justify-content-between bg-light border">
                                    <a href="detail.php?proid=<?php echo $each_pro[0] ?>" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                                    <button type="submit" name="addtocart" class="btn btn-sm text-dark p-0 bg-transparent border-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</button>
                                </div>
                            </form>
                        </div>
                    </div>
            <?php
                }
            }
            ?>

        </div>

        <!-- Shop Product End -->
    </div>
</div>
<!-- Shop End -->


<!-- Footer Start -->

<?php include('footer.php'); ?>

<!-- Footer End -->


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