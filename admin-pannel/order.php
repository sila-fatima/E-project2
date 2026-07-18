<?php
include('header.php');
include('connection.php');
?>
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-2 text-gray-800">
            Orders
            <select class="form-control form-control-sm d-inline-block ml-2" style="width: auto;" onchange="location = this.value;">
                <option value="?filter=dateold">See All</option>
                <option value="?filter=date">Filter by Date</option>
                <option value="?filter=2">Filter by COD</option>
                <option value="?filter=1">Filter by VPP</option>
                <option value="?filter=3">Filter by Bank Transfer</option>
                <option value="?filter=To pay">Filter by Unpaid</option>
            </select>
        </h1>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-sm" id="dataTable" width="100%" cellspacing="0" style="font-size: 0.85rem;">
            <thead>
                <tr>
                    <th>OrderID</th>
                    <th>Customer</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Phone</th> 
                    <th>Order Date</th>
                    <th>Payment</th> 
                    <th>Status</th>
                    <th>Amount</th>
                    <th>Action</th>
                    <?php if($_SESSION['role'] == 'admin'){ ?>
                        <th>Cancel</th> 
                    <?php } ?>
                </tr>
            </thead>
            
            <tbody>
            <?php
            if (isset($_GET['filter'])) {
                $filterby = $_GET['filter'];
                if ($filterby == 1 || $filterby == 2 || $filterby == 3) {
                    $fetch_orders = mysqli_query($con, "SELECT * FROM `orders` WHERE payment_id=$filterby");
                } elseif ($filterby == "To pay") {
                    $fetch_orders = mysqli_query($con, "SELECT * FROM `orders` WHERE status='$filterby'");
                } elseif ($filterby == "date") {
                    $fetch_orders = mysqli_query($con, "SELECT * FROM orders ORDER BY Order_date DESC");
                } elseif($filterby == "dateold"){
                    $fetch_orders = mysqli_query($con, "SELECT * FROM orders ORDER BY Order_date ASC");
                }
            } elseif(isset($_GET['search']) && $_GET['search'] !="" ){
                 $search = trim($_GET['search']);
                 $fetch_orders = mysqli_query($con,"SELECT * FROM `orders` WHERE Order_id ='$search' OR Customer='$search'");
                 if (mysqli_num_rows($fetch_orders) <= 0) {
                    echo "<script>alert('No Order Found'); location.assign('order.php');</script>";
                 }
            } else {
                $fetch_orders = mysqli_query($con, "SELECT * FROM `orders`");
            }
            
            while ($all_order = mysqli_fetch_array($fetch_orders)) { ?>
                <tr>
                    <td><?php echo $all_order[3]; ?></td>
                    <td><?php echo $all_order[4]; ?></td>
                    <td><?php echo $all_order[5]; ?></td>
                    <td><?php echo $all_order[7]; ?></td>
                    <td><?php echo $all_order[8]; ?></td>
                    <td style="white-space: nowrap;"><?php echo $all_order[11]; ?></td>
                    <td>
                        <?php 
                        if ($all_order[1] == 1) {
                            echo 'VPP';
                        } elseif ($all_order[1] == 2) {
                            echo 'COD';
                        } else {
                            echo 'Online Transfer';
                        } 
                        ?>
                    </td>
                    <td><?php echo $all_order[10]; ?></td>
                    <td><?php echo $all_order[9]; ?></td>
                    <td style="white-space: nowrap;">
                        <a href="orderdetail.php?orderid=<?php echo $all_order[3] ?>" class="btn btn-sm btn-outline-info d-block mb-1" style="font-size: 0.75rem;">Details</a>
                        <?php if($all_order[10] == "To Pay") { ?>
                            <a onclick="alert('Order Need To Be Paid first');" class="btn btn-sm btn-outline-success d-block" style="font-size: 0.75rem;">Status</a>
                            <?php }
                             elseif($all_order[10] == "Cancelled By Admin") { ?>
                            <a onclick="alert('Order Is Cancelled By Admin');" class="btn btn-sm btn-outline-success d-block" style="font-size: 0.75rem;">Status</a>
                        <?php } else { ?>
                            <a href="status.php?orderid=<?php echo $all_order[3] ?>" class="btn btn-sm btn-outline-success d-block" style="font-size: 0.75rem;">Status</a>
                        <?php } ?>
                    </td>
                    <?php if($_SESSION['role'] == 'admin' && $all_order[10] != "Cancelled By Admin"){ ?>
                        <td class="text-center align-middle">
                            <a href="?cancelid=<?php echo $all_order[0] ?>" style="text-decoration: none;">❌</a>
                        </td>
                    <?php } ?>
                </tr>
            <?php  } ?>
            </tbody> <!-- MOVED THIS OUTSIDE THE WHILE LOOP -->
        </table>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php
include('footer.php');

if(isset($_GET['cancelid'])){
    $id = ($_GET['cancelid']);
    $query = mysqli_query($con, "UPDATE `orders` SET `status`='Cancelled By Admin' WHERE id = $id");
    if($query){
        echo "<script>alert('Order cancelled'); location.assign('order.php');</script>";
    }
}
?>