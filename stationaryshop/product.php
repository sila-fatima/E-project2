<?php
include('navbar.php');?>
  <section class="categories-section">
        <div class="container-lg">
            <h2 class="mb-4">Categories</h2>
 
            <div class="row g-2">
                <?php
                $fetch_cat = mysqli_query($con, "SELECT * FROM `categories`");
                while ($all_cat = mysqli_fetch_array($fetch_cat)) {
                ?>
                    <div class="col-lg-2 col-md-4">
                        <div class="category-tile">
                            <a href="?cat_id=<?php echo $all_cat[0] ?>" class="text-decoration-none text-reset">
                            <h5>
                                <?php echo $all_cat[1] ?></h5>
                            <p><?php echo $all_cat[3] ?></p>
                            </a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
 
    <section style="padding: 48px 0;">
        <div class="container-lg">
            <h3 class="mb-5">Products</h3>
            <div class="row g-3">
            <?php 
            if(isset($_GET['cat_id'])){
                $catid=$_GET['cat_id'];
                $pro_fetch=mysqli_query($con,"SELECT * FROM `products` WHERE category_Id =$catid");
                while($allpro=mysqli_fetch_array($pro_fetch)){
             ?>
                 <div class="col-md-4">
                 <div class="gift-card">
                <div class="card-img-top" style="font-size: 50px; text-align: center;">
                    <img src="../admin-pannel/img/<?php echo $allpro[10] ?>" height="100%" width="100%" alt="">
                </div>
                <div class="card-body">
                    <h5 class="card-title">
                        <a href="productdetail.php?proid=<?php echo $allpro[0] ?>" class="text-decoration-none text-reset">
                            <?php echo $allpro[4]; ?>
                        </a>
                    </h5>
 
                    <form action="" method="post">
                        <div class="input-group qty-group mt-3">
                            <button class="btn btn-sm qty-btn" type="button" onclick="decreaseQty(this)">−</button>
                            <input type="text" class="form-control form-control-sm text-center qty-input p-0" value="1" readonly>
                            <button class="btn btn-sm qty-btn" type="button" onclick="increaseQty(this)">+</button>
                        </div>
 
                        <div class="mt-3 d-flex justify-content-between align-items-center">
                            <span class="card-price">PKR <?php echo $allpro[8]; ?></span>
                            <input type="hidden" value="<?php echo $allpro[0] ?>" name="proid">
                            <input type="hidden" value="<?php echo $allpro[3] ?>" name="proid7">
                            <input type="hidden" value="<?php echo $allpro[4] ?>" name="proname">
                            <input type="hidden" value="<?php echo $allpro[8] ?>" name="proprice">
                            <input type="hidden" value="<?php echo $allpro[10] ?>" name="proimg">
                            <input type="hidden" name="proqty" class="proqty-hidden" value="1">
                            <button class="btn btn-primary" style="width: 180px; background-color:#C44A33" type="submit" name="addtocart">Add to cart</button>
                        </div>
                    </form>
                </div>
                </div>
                </div> 
        <?php }} else{
            $pro_fetch=mysqli_query($con,"SELECT * FROM `products`");
                while($allpro=mysqli_fetch_array($pro_fetch)){
             ?>
     <div class="col-md-4">
            <div class="gift-card">
                <div class="card-img-top" style="font-size: 50px; text-align: center;">
                    <img src="../admin-pannel/img/<?php echo $allpro[10] ?>" height="100%" width="100%" alt="">
                </div>
                <div class="card-body">
                    <h5 class="card-title">
                        <a href="productdetail.php?proid=<?php echo $allpro[0] ?>" class="text-decoration-none text-reset">
                            <?php echo $allpro[4]; ?>
                        </a>
                    </h5>
 
                    <form action="" method="post">
                        <div class="input-group qty-group mt-3">
                            <button class="btn btn-sm qty-btn" type="button" onclick="decreaseQty(this)">−</button>
                            <input type="text" class="form-control form-control-sm text-center qty-input p-0" value="1" readonly>
                            <button class="btn btn-sm qty-btn" type="button" onclick="increaseQty(this)">+</button>
                        </div>
 
                        <div class="mt-3 d-flex justify-content-between align-items-center">
                            <span class="card-price">PKR <?php echo $allpro[8]; ?></span>
                            <input type="hidden" value="<?php echo $allpro[0] ?>" name="proid">
                            <input type="hidden" value="<?php echo $allpro[4] ?>" name="proname">
                            <input type="hidden" value="<?php echo $allpro[8] ?>" name="proprice">
                            <input type="hidden" value="<?php echo $allpro[10] ?>" name="proimg">
                            <input type="hidden" name="proqty" class="proqty-hidden" value="1">
                            <button class="btn btn-primary" style="width: 180px; background-color:#C44A33" type="submit" name="addtocart">Add to cart</button>
                        </div>
                    </form>
                </div>
            </div>
   
        </div>
        <?php }} ?>
 
    </section>
 
 
    <?php 
    include('footer.php'); ?>
 
