<?php
include("header.php");
include("connection.php");
?>
<!-- End of Topbar -->
<!-- Begin Page Content -->
<!-- autofill query -->
<?php
if (isset($_GET['upd_id'])) {
    $upd_id = $_GET['upd_id'];
    $autofillquery = mysqli_query($con, "Select * FROM `categories` WHERE Id = $upd_id");
    $autofill = mysqli_fetch_array($autofillquery);
}
?>
<div class="container-fluid">
    <form method='post' enctype="multipart/form-data">
        <div class="form-group">
            <label for="inputName" class="col-sm-1-12 col-form-label">Category Name</label>
            <div class="col-sm-1-12">
                <input type="text" class="form-control" name="c-name" value='<?php echo "$autofill[1]"; ?>'
                    id="inputName" placeholder="" required>
            </div>
        </div>
         <div class="form-group">
            <label for="inputName" class="col-sm-1-12 col-form-label">Category Description</label>
            <div class="col-sm-1-12">
                <input type="text" class="form-control" name="desc" value="<?php echo $autofill[3]; ?>" id="inputName"
                    placeholder="" required>
            </div>
        </div>
        <div class="form-group">
            <label for="inputName" class="col-sm-1-12 col-form-label">Total products</label>
            <div class="col-sm-1-12">
                <input type="text" class="form-control" name="items" value="<?php echo $autofill[2]; ?>" id="inputName"
                    placeholder="" required>
            </div>
        </div>
       


        <div class="form-group">
            <div>
                <button type="submit" name="update" class="btn btn-primary">Update</button>
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
    $upd_name = $_POST['c-name'];
    $upd_items = $_POST['items'];
    $upd_desc = $_POST['desc'];
    $update_query = mysqli_query($con, "UPDATE `categories` SET `name`='$upd_name',`items`='$upd_items',`Description`='$upd_desc' WHERE Id =$upd_id");
    if ($update_query) {
        echo "<script>alert('Updated Sucessfully')
        location.assign('view-cat.php')
        </script>";
    } else {
        echo "<script>alert('Something Went Wrong')</script>";
    }
}
?>