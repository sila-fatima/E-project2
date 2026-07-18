<?php
include('header.php');
include('connection.php');
if (isset($_SESSION['emp_name'])) {

?>
    <script>
        window.addEventListener('pageshow', function(event) {
            // If the page was loaded from cache/history, force a reload
            if (event.persisted || (typeof window.performance != "undefined" && window.performance.navigation.type === 2)) {
                window.location.reload();
            }
        });
    </script>
    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-3 text-gray-800">Dashboard</h1>
        </div>

        <!-- Content Row -->
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Total Amount</div>
                                <?php
                                $totalquery = mysqli_query($con, "SELECT SUM(`Total amount`) AS total
FROM orders
LEFT JOIN `return`
ON orders.Order_id = `return`.Order_id
WHERE orders.status != 'return'
   OR orders.status = 'return'
   AND `return`.Return_type = 'Replace';");
                                $totaldata = mysqli_fetch_array($totalquery);
                                $totalamount = $totaldata["total"];
                                ?>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    RS.<?php echo number_format($totalamount); ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Total Employess</div>
                                <?php
                                $employequery = mysqli_query($con, "SELECT COUNT(*) AS total FROM employees");
                                $empdata = mysqli_fetch_array($employequery);
                                $totalemploye = $empdata["total"];

                                ?>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php echo $totalemploye; ?>
                                </div>
                            </div>
                            <div class="col-auto">

                                <i class="fas fa-user-tie fa-2x text-gray-300"></i>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Categories
                                </div>
                                <?php
                                $category_query = "SELECT COUNT(*) AS Total_Categories FROM categories";
                                $category_result = mysqli_query($con, $category_query);
                                $category_row = mysqli_fetch_array($category_result);

                                $total_category = $category_row["Total_Categories"];
                                ?>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                            <?php echo $total_category; ?>
                                        </div>
                                    </div>
                                    <div class="col">

                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Total Products</div>
                                <?php
                                $product_query = "SELECT COUNT(*) AS total_products FROM products";
                                $product_result = mysqli_query($con, $product_query);
                                $product_row = mysqli_fetch_array($product_result);

                                $total_product = $product_row["total_products"];
                                ?>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php echo $total_product; ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-cubes fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Row -->

        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 ">
                        <h6 class="m-0 font-weight-bold text-primary pt-2">Sales & Performance Dashboard </h6>
                    </div>
                    <?php
                    //  totalorders
                    $totalorders = mysqli_query($con, "SELECT COUNT(*) as total_orders FROM orders;");
                    $totalorders_row = mysqli_fetch_assoc($totalorders);
                    $total = $totalorders_row['total_orders'];
                    //    delivere orders
                    $succesfulorders = mysqli_query($con, "SELECT COUNT(*) as delivered_orders FROM orders where status ='delivered'");
                    $succesful_row = mysqli_fetch_assoc($succesfulorders);
                    $succesful = $succesful_row['delivered_orders'];
                    // process orders
                    $Inprocess_orders = mysqli_query($con, "SELECT COUNT(*) as inprocess_orders FROM orders where status ='dispatched'or status='received'");
                    $inprocess_row = mysqli_fetch_assoc($Inprocess_orders);
                    $inprocess = $inprocess_row['inprocess_orders'];
                    // refund orders
                    $refund = mysqli_query($con, "SELECT COUNT(*) as refund FROM `return` WHERE Return_type = 'refund'");
                    $refund_row = mysqli_fetch_assoc($refund);
                    $refund_count = $refund_row['refund'];
                    // replace orders
                    $replace = mysqli_query($con, "SELECT COUNT(*) as replac FROM `return` WHERE Return_type = 'replace'");
                    $replace_row = mysqli_fetch_assoc($replace);
                    $replace_count = $replace_row['replac'];


                    // progress bar
                    $success =($succesful / $total) * 100;
                    $process=($inprocess/$total)*100;
                    $refund=($refund_count/$total)*100;
                    $replace=($replace_count/$total)*100;
                    ?>
                    <div class="card-body py-5">
                        <h4 class="small font-weight-bold">Order Delivered <span class="float-right"><?php echo (int)$success?>%</span></h4>
                        <div class="progress mb-4">
                            <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo (int)$success?>%" aria-valuenow="20"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <h4 class="small font-weight-bold">Orders In process<span class="float-right"><?php echo (int)$process?>%</span></h4>
                        <div class="progress mb-4">
                            <div class="progress-bar bg-info" role="progressbar" style="width: <?php echo (int)$process?>%" aria-valuenow="40"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <h4 class="small font-weight-bold">Replace Orders <span class="float-right"><?php echo (int)$replace?>%</span></h4>
                        <div class="progress mb-4">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo (int)$replace?>%" aria-valuenow="60"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <h4 class="small font-weight-bold">Refund order <span class="float-right"><?php echo (int)$refund?>%</span></h4>
                        <div class="progress mb-4">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: <?php echo (int)$refund?>%" aria-valuenow="80"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-5">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
                        <div class="dropdown no-arrow">
                            
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-pie pt-4 pb-2">
                            <canvas id="myPieChart"></canvas>
                        </div>
                        <div class="mt-4 text-center small">
                            <span class="mr-2">
                                <i class="fas fa-circle text-primary"></i> Shop
                            </span>
                            <span class="mr-2">
                                <i class="fas fa-circle text-success"></i> Social
                            </span>
                            <span class="mr-2">
                                <i class="fas fa-circle text-info"></i> Referral
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Row -->
        <div class="row">

            <!-- Content Column -->
            <div class="col-lg-6 mb-4">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">About Us</h6>
                    </div>
                    <div class="card-body py-5">
                        <p>Arts" is a premier, specialized retail stationary shop dedicated to bringing color, creativity, and convenience to our customers' lives. We offer an extensive and diverse selection of high-quality products, ranging from artistic supplies, unique gift articles, and expressive greeting cards to dolls, files, wallets, stylish handbags, and select beauty essentials. Over the years, we have built a reputation for housing a massive variety of combinations and products under one roof, making us a beloved go-to destination for shoppers looking to find the perfect item for any occasion.</p>
                        <p class="mb-0">As the physical market becomes increasingly crowded and fast-paced, we recognize that our customers lead busy lives with precious little time to spare for traditional in-store shopping. Despite the growing competition among retail dealers, our core mission remains unchanged: to retain the trust of our loyal clients while continuously adapting to modern demands. We pride ourselves on our rich product inventory and our dedication to helping clients find exactly what they need, when they need it.</p>
                    </div>
                </div>

            </div>

            <div class="col-lg-6 mb-4">

                <!-- Illustrations -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Future Plans</h6>
                    </div>
                    <div class="card-body">

                        <p>To thrive in today’s highly competitive market and better serve our community, we are launching an advanced, automated online shopping cart application. This digital transition will allow customers to browse our entire catalog, view detailed descriptions and pricing, and seamlessly place orders from the comfort of their homes or offices. To make this experience as smooth as possible, we are implementing secure, multi-channel payment options—including credit cards, cheques, and Cash on Delivery (VPP)—alongside a reliable home-delivery system that brings purchases directly to our customers' doorsteps.</p>
                        <p class="mb-0 py-1">Behind the scenes, our future operations will be fully modernized through a robust database management system. We are integrating automated tracking for our stock, employee roles, and order processing, which features unique 7-digit product IDs and 16-digit order tracking numbers to ensure absolute accuracy. Furthermore, we are establishing a dedicated customer account portal featuring advanced search tools, a flexible 7-day return and replacement policy, and a direct feedback system. This ensures that as we scale our business digitally, our commitment to customer satisfaction and operational excellence remains at the forefront.</p>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <!-- Footer -->
<?php
    include('footer.php');
} else {
    echo "<script> location.assign('login.php')</script>";
}
?>
<!-- search program -->
