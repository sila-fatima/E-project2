<?php
include('query.php');
?>
 
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
<!-- Shop Detail Start -->
<!-- fetch products -->
<?php
include('../admin-pannel/connection.php');
if (isset($_GET['proid'])) {
    $proid = $_GET['proid'];
    $fetch_pro = mysqli_query($con, "SELECT * FROM `products` WHERE id = $proid");
    $all_rows = mysqli_fetch_array($fetch_pro);
?>
    <form action="" method="POST" class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col-lg-5 pb-5">
                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    <img class="w-100 h-100" src="../admin-pannel/img/<?php echo $all_rows[10] ?>" alt="Image">
                </div>
            </div>
 
            <div class="col-lg-7" style="padding-top: 130px;">
                <h3 class="font-weight-semi-bold"><?php echo $all_rows[4] ?></h3>
                <div class="d-flex mb-3">
                    <div class="text-primary mr-2"></div>
                </div>
                <h3 class="font-weight-semi-bold mb-4">PKR <?php echo $all_rows[8] ?></h3>
                <p class="mb-4"><?php echo $all_rows[5] ?></p>
 
                <input type="hidden" value="<?php echo $all_rows[0] ?>" name="proid">
                <input type="hidden" value="<?php echo $all_rows[4] ?>" name="proname">
                <input type="hidden" value="<?php echo $all_rows[8] ?>" name="proprice">
                <input type="hidden" value="<?php echo $all_rows[10] ?>" name="proimg">
 
                <div class="d-flex align-items-center mb-4 pt-2">
                    <div class="input-group quantity mr-3" style="width: 130px;">
                        <div class="input-group-btn">
                            <button type="button" class="btn btn-primary btn-minus">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
 
                        <input type="text" name="proqty" class="form-control bg-secondary text-center" value="1">
 
                        <div class="input-group-btn">
                            <button type="button" class="btn btn-primary btn-plus">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
 
                    <button type="submit" name="addtocart" class="btn btn-primary px-3">
                        <i class="fa fa-shopping-cart mr-1"></i> Add To Cart
                    </button>
                </div>
            </div>
        </div>
    </form>
<?php } ?>
 
 
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
 
