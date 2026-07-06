<?php
include('header.php');
include('connection.php');
?>
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-2 text-gray-800">
            Orders
            <select class="form-control form-control-sm d-inline-block ml-2" style="width: auto;" onchange="location = this.value;">
                <option value="">See All</option>
                <option value="?filter=date">Filter by Date</option>
                <option value="?filter=2">Filter by COD</option>
                <option value="?filter=1">Filter by VPP</option>
                <option value="?filter=3">Filter by Bank Transfer</option>
                <option value="?filter=To pay">Filter by Unpaid</option>
            </select>
        </h1>
    </div>


    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>OrderID</th>
                    <th>Customer</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Phone Number</th>
                    <th>Order Date</th>
                    <th>Payment Methode</th>
                    <th>Status</th>
                    <th>Amount</th>
                    <th>Action</th>
                </tr>
            </thead>
            <?php
            if (isset($_GET['filter'])) {
                $filterby = $_GET['filter'];
                if ($filterby == 1 || $filterby == 2 || $filterby == 3) {
                    $fetch_orders = mysqli_query($con, "SELECT * FROM `orders` WHERE payment_id=$filterby");
                } elseif ($filterby == "To pay") {
                    $fetch_orders = mysqli_query($con, "SELECT * FROM `orders` WHERE status='$filterby'");
                } elseif ($filterby == "date") {
                    $fetch_orders = mysqli_query($con, "SELECT * FROM orders ORDER BY Order_date ASC");
                }
            }elseif(isset($_GET['search']) && $_GET['search'] !="" ){
                 $search =trim($_GET['search']);
                 $fetch_orders=mysqli_query($con,"SELECT * FROM `orders` WHERE Order_id ='$search' OR Customer='$search'");
                 if (mysqli_num_rows($fetch_orders)<=0) {
echo "<script>alert('No Order Found'); location.assign('order.php');</script>";
                    
                 }
            }
            
            else {
                $fetch_orders = mysqli_query($con, "SELECT * FROM `orders`");
            }
            while ($all_order = mysqli_fetch_array($fetch_orders)) { ?>

                <tbody>
                    <tr>
                        <td> <?php echo $all_order[3]; ?></td>
                        <td> <?php echo $all_order[4]; ?></td>
                        <td> <?php echo $all_order[5]; ?></td>
                        <td> <?php echo $all_order[7]; ?></td>
                        <td> <?php echo $all_order[8]; ?></td>
                        <td> <?php echo $all_order[11]; ?></td>
                        <td> <?php if ($all_order[1] == 1) {
                                    echo 'VPP';
                                } elseif ($all_order[1] == 2) {
                                    echo 'COD';
                                } else {
                                    echo 'Online Transfer';
                                } ?></td>
                        <td> <?php echo $all_order[10]; ?></td>
                        <td> <?php echo $all_order[9]; ?></td>
                        <td>
                             <a href="orderdetail.php?orderid=<?php echo $all_order[3] ?>" class="btn btn-outline-info mb-3">See Details</a>
                            <?php if($all_order[10]=="To Pay") {?>
                            <a onclick="alert('Order Need To Be Paid first');" class="btn btn-outline-success">Update Status</a>
                            <?php } else { ?>

                            <a href="status.php?orderid=<?php echo $all_order[3] ?>" class="btn btn-outline-success">Update Status</a>
                            <?php } ?>
                           
                        </td>

                    </tr>
                </tbody>
            <?php  } ?>


        </table>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php
include('footer.php');
?>