<?php
include("header.php");
include("connection.php");
?>
<!-- End of Topbar -->
<!-- Begin Page Content -->
<!-- autofill query -->
<?php
if (isset($_GET['return_id'])) {
    $ReturnID = $_GET['return_id'];
    $autofillquery = mysqli_query($con, "Select * FROM `return` WHERE id = $ReturnID");
    $autofill = mysqli_fetch_array($autofillquery);
}
?>
<div class="container-fluid">
    <form method='post' enctype="multipart/form-data">
        <div class="form-group">
            <label for="inputName" class="col-sm-1-12 col-form-label">Order NO</label>
            <div class="col-sm-1-12">
                <input type="text" class="form-control" name="c-name" value='<?php echo "$autofill[2]"; ?>'
                    id="inputName" placeholder="" readonly>
            </div>
        </div>
         <div class="form-group">
            <label for="inputName" class="col-sm-1-12 col-form-label">Customer Name</label>
            <div class="col-sm-1-12">
                <input type="text" class="form-control" name="desc" value="<?php echo $autofill[1]; ?>" id="inputName"
                    placeholder="" readonly>
            </div>
        </div>
        <label for="">Status</label>
         <select name='status' id=''>
                        <option value="Return Item Received">Return Item Received</option>
                        <option value="Quality Checkup In process">Quality Checkup In process</option>
                        <option value="Return issued">Return issued</option>
                        <option value="Return Rejected">Return Rejected</option>
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
    $update_query = mysqli_query($con, "UPDATE `return` SET `status`='$upd_status' WHERE id=$ReturnID");
    if ($update_query) {
        echo "<script>alert('status changed sucessfully'); location.assign('refund.php');
        </script>";
    } else {
        echo "<script>alert('Status Didnt update');</script>";
    }
}
?>