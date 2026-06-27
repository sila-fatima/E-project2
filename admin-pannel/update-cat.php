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
            <label for="inputName" class="col-sm-1-12 col-form-label">Total products</label>
            <div class="col-sm-1-12">
                <input type="text" class="form-control" name="items" value="<?php echo $autofill[2]; ?>" id="inputName"
                    placeholder="" required>
            </div>
        </div>
        <div class="form-group">
            <label for="inputName" class="col-sm-1-12 col-form-label">Image</label>
            <div class="col-sm-1-12">
                <img src="img/<?php echo $autofill[3]; ?>" class="col-lg-2 col-md-4 col-sm-6 col-12"
                    style="height:150px;float:left;" alt="">
                <input type="file" class="form-control  col-lg-10 col-md-8 col-sm-6 col-12" name="c-img" id="inputName"
                    placeholder="">
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
    if (!empty($_FILES['c-img']['tmp_name'])) {
        $upd_ImageTN = $_FILES['c-img']['tmp_name'];
        $upd_ImageON = $_FILES['c-img']['name'];
        $path = './img/' . $upd_ImageON;
        $extension = pathinfo($upd_ImageON, PATHINFO_EXTENSION);
        if ($extension=='png'||$extension=='jpeg'||$extension=='jpg'||$extension=='webp'||$extension=='svg'||$extension=='avif') {
            $uploader = move_uploaded_file($upd_ImageTN, $path);
            if ($uploader) {
               mysqli_query($con, "UPDATE `categories` SET `name`='$upd_name',`items`='$upd_items',`image`='$upd_ImageON' WHERE Id =$upd_id");
                echo "<script>alert('Updated Sucessfully')
        location.assign('view-cat.php')
        </script>";
            } else {
                echo "<script>alert('Something Went Wrong')</script>";
            }
        } else {
            echo "<script>alert('Extension doesn`t match')</script>";
        }

    } else {
        mysqli_query($con, "UPDATE `categories` SET `name`='$upd_name',`items`='$upd_items' WHERE Id =$upd_id");
        echo "<script>alert('Updated Sucessfully')
        location.assign('view-cat.php')</script>";
    }
}
?>