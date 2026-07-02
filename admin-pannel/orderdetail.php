 <?php
include("header.php");
include("connection.php");

?>
<!-- End of Topbar -->
<!-- Begin Page Content -->
<div class="container-fluid">
      <table class="table">
            <thead>
                <tr>
                    <th>OrderID</th>
                    <th>Customer</th>
                    <th>Products</th>
                    <th>ProductsID</th>
                    <th>Quantity</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($_GET['orderid'])) {
                    $orderID = $_GET['orderid'];
                    $fetch_data = mysqli_query($con, "SELECT * FROM `order_items` WHERE order_id=$orderID ");
                    while ($all_data = mysqli_fetch_array($fetch_data)) {

                ?>
                        <tr>
                            <td><?php echo $all_data[1] ?></td>
                            <td><?php echo $all_data[2] ?></td>
                            <td><?php echo $all_data[4] ?></td>
                            <td><?php echo $all_data[3] ?></td>
                            <td><?php echo $all_data[5] ?></td>
                    <?php }
                } ?>
            </tbody>
        </table>
    

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Footer -->
<?php
include("footer.php");
?>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

