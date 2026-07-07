<?php
include('navbar.php');

if(isset($_GET['proid'])){
    $proid=$_GET['proid'];
    $detail_query=mysqli_query($con,"SELECT * FROM `products` WHERE id =$proid");
    $product=mysqli_fetch_array($detail_query)

?><section class="py-5">
        <div class="container">
            <div class="row ">
                <div class="col-lg-6 col-md-6 col-12 ">
                    <img src="../admin-pannel/img/<?php echo $product[9]; ?>" style="width:100%; height:500px;" class="img-fluid rounded" alt="<?php echo $product[4]; ?>">
                </div>
                
                <div class="col-lg-6 col-md-6 col-12" style="padding-top:100px;">
                    <h1  style="color:#C9A35D;"><?php echo $product[4]; ?></h1>
                    <p class="mt-4"><?php echo $product[5]; ?></p>
                    <h3 class="text-primary text-light">PKR <?php echo $product[7]; ?></h3>
                </div>
            </div>
        </div>
    </section>
    <?php }?>