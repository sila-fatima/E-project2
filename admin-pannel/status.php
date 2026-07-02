<?php
include("header.php");
include("connection.php");
?>
<!-- End of Topbar -->
<!-- Begin Page Content -->
<!-- autofill query -->
<?php
if (isset($_GET['orderid'])) {
    $orderID = $_GET['orderid'];
    $autofillquery = mysqli_query($con, "Select * FROM `orders` WHERE Order_id = $orderID");
    $autofill = mysqli_fetch_array($autofillquery);
}
?>
<div class="container-fluid">
    <form method='post' enctype="multipart/form-data">
        <div class="form-group">
            <label for="inputName" class="col-sm-1-12 col-form-label">Order NO</label>
            <div class="col-sm-1-12">
                <input type="text" class="form-control" name="c-name" value='<?php echo "$autofill[3]"; ?>'
                    id="inputName" placeholder="" readonly>
            </div>
        </div>
         <div class="form-group">
            <label for="inputName" class="col-sm-1-12 col-form-label">Customer Name</label>
            <div class="col-sm-1-12">
                <input type="text" class="form-control" name="desc" value="<?php echo $autofill[4]; ?>" id="inputName"
                    placeholder="" readonly>
            </div>
        </div>
        <label for="">Status</label>
         <select name='status' id=''>
                        <option value="Dispatched">Dispached</option>
                        <option value="Shipped">Shipped</option>
                        <option value="Delivered">Delivered</option>
                        <option value="Return">Returned</option>
                    </select>
       
       


        <div class="form-group">
            <div>
                <button type="submit" name="update" class="mt-5 btn btn-primary">Update</button>
            </div>
        </div>
    </form>



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

<!-- update query -->
<?php
if (isset($_POST['update'])) {
    $upd_status = $_POST['status'];
    $update_query = mysqli_query($con, "UPDATE `orders` SET `status`='$upd_status' WHERE Order_id =$orderID");
    if ($update_query) {
        echo "<script> location.assign('order.php')
        </script>";
    } else {
        echo "<script>alert('Status Didnt update')</script>";
    }
}
?>