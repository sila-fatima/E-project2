<?php
include('navbar.php');
?>
<script>
        window.addEventListener('pageshow', function (event) {
            // If the page was loaded from cache/history, force a reload
            if (event.persisted || (typeof window.performance != "undefined" && window.performance.navigation.type === 2)) {
                window.location.reload();
            }
        });
    </script>
<div class="page active" id="homePage">
    <!-- HERO SECTION -->
    <section class="hero-section">
        <div class="container-lg">
            <div class="row align-items-center">
                <div class="col-lg-6 pe-lg-5">
                    <div class="d-flex align-items-center gap-2 mb-4"
                        style="color: var(--gold); font-size: 13px; letter-spacing: 0.08em; text-transform: uppercase;">
                        ✒️ premium tools for analog minds
                    </div>
                    <h1 class="hero-title">
                        Tools for your craft,<br>
                        <span class="italic">treasures for your heart.</span>
                    </h1>
                    <p class="hero-subtitle">
                        Every tool on this site is hand-picked to elevate your writing workflow. Hover one — go on,
                        see details before you buy it.
                    </p>
                    <div class="d-flex gap-3 flex-wrap">
                        <a class="btn btn-primary " href="product.php" style="width:190px; background-color:#C44A33;">Browse the shop ➜</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="hero-art">
                        <div class="art-canvas">
                            <div class="sheet-accent"></div>
                            <div class="abstract-sheet sheet-sub"></div>
                            <div class="abstract-sheet sheet-main">
                                <div style="color: var(--plum); opacity: 0.4; font-family: 'Fraunces', serif;">01 //
                                    Notebook</div>
                                <div>
                                    <div class="mock-lines"></div>
                                    <div class="mock-lines"></div>
                                    <div class="mock-lines"></div>
                                </div>
                                <div style="display:flex; justify-content: space-between; align-items: center;">
                                    <span style="font-size: 24px;">✒️</span>
                                    <span
                                        style="font-family: 'JetBrains Mono', monospace; font-size: 12px; color: var(--plum); opacity: 0.5;">arts
                                        Co.</span>
                                </div>
                            </div>
                            <div class="sheet-rule">
                                <span>1 . . 2 . . 3 . . 4 . . 5</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>

<div class="page active">
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
                            <a href="product.php?cat_id=<?php echo $all_cat[0] ?>" class="text-decoration-none text-reset">
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
                $fetchpro = mysqli_query($con, "SELECT * FROM products ORDER BY RAND() LIMIT 6;");
                while ($allpro = mysqli_fetch_array($fetchpro)) {
                ?>
                    <div class="col-md-4">
                        <div class="gift-card">
                            <div class="card-img-top" style="font-size: 50px; text-align: center;">
                                <img src="../admin-pannel/img/<?php echo $allpro[9] ?>" height="100%" width="100%" alt="">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">
                                    <a href="productdetail.php?proid=<?php echo $allpro[0] ?>" class="text-decoration-none text-reset">
                                        <?php echo $allpro[4]; ?>
                                    </a>
                                     <h6 style="color: red;"><?php if($allpro[6]==0){
                                       echo "Not available";}elseif($allpro[6]<=3){echo"only $allpro[6] remaining"; }?></h6>
                                </h5>

                                <form action="" method="post">
                                    <div class="input-group qty-group mt-3">
                                        <button class="btn btn-sm qty-btn" type="button" onclick="decreaseQty(this)">−</button>
                                        <input type="text" class="form-control form-control-sm text-center qty-input p-0" value="1" readonly>
                                        <button class="btn btn-sm qty-btn" type="button" onclick="increaseQty(this)">+</button>
                                    </div>

                                    <div class="mt-3 d-flex justify-content-between align-items-center">
                                        <span class="card-price">PKR <?php echo $allpro[7]; ?></span>
                                        <input type="hidden" value="<?php echo $allpro[0] ?>" name="proid">
                                        <input type="hidden" value="<?php echo $allpro[3] ?>" name="proid7">
                                        <input type="hidden" value="<?php echo $allpro[4] ?>" name="proname">
                                        <input type="hidden" value="<?php echo $allpro[7] ?>" name="proprice">
                                        <input type="hidden" value="<?php echo $allpro[9] ?>" name="proimg">
                                        <input type="hidden" name="proqty" class="proqty-hidden" value="1">
                                        <?php if($allpro[6]==0){ ?>
                                        <button class="btn btn-primary" style="width: 180px; background-color:#C44A33" onclick="alert('Not Available Currently');">Add to cart</button>
                                        <?Php
                                        } else{?>
                                    
                                        <button class="btn btn-primary" style="width: 180px; background-color:#C44A33" name="addtocart" type="submit">Add to cart</button>
                                         <?Php
                                        } ?>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div> <?php } ?>
                <div class="text-center mt-5">
                    <a href="product.php" class="btn btn-outline-light">Browse all products</a>
                </div>
            </div>
        </div>
    </section>
    <div class="trust-strip">
        <div class="container-lg">
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="trust-item">
                        <div style="color: var(--gold);">📦</div>
                        <div>
                            <h6 class="mb-1">Free Shipping</h6>
                            <p>Get Free Shipping on Your All Orders</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="trust-item">
                        <div style="color: var(--gold);">🚚</div>
                        <div>
                            <h6 class="mb-1">3-7 day delivery</h6>
                            <p>Order Will Be Delivered Within A week </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="trust-item">
                        <div style="color: var(--gold);">🔒</div>
                        <div>
                            <h6 class="mb-1">7 Day Return</h6>
                            <p>You Can Return Any Oder Within 7 day Of delivery</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('footer.php'); ?>



</body>

</html>