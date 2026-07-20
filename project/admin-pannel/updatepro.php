<?php
include("header.php");
include("connection.php");
?>
<!-- End of Topbar -->
<!-- Begin Page Content -->
<?php
if (isset($_GET['upd_id'])) {
    $upd_id = $_GET['upd_id'];
    $autofillquery= mysqli_query($con, "Select * FROM `products` WHERE id = $upd_id");
    $autofill = mysqli_fetch_array($autofillquery);
}
?>
<div class="container-fluid">
    <form method='post' enctype="multipart/form-data">
        <div class="form-group">
            <label for="inputName" class="col-sm-1-12 col-form-label">Product Name</label>
            <div class="col-sm-1-12">
                <input type="text" class="form-control" name="p-name" value='<?php echo "$autofill[4]"; ?>'
                    id="inputName" placeholder="" required>
            </div>
        </div>
        <div class="form-group">
            <label for="inputName" class="col-sm-1-12 col-form-label">Description</label>
            <div class="col-sm-1-12">
                <input type="text" class="form-control" name="desc" value="<?php echo $autofill[5]; ?>" id="inputName"
                    placeholder="" required>
            </div>
        </div>
        <div class="form-group">
            <label for="inputName" class="col-sm-1-12 col-form-label">Stock</label>
            <div class="col-sm-1-12">
                <input type="text" class="form-control" name="qty" value="<?php echo $autofill[6]; ?>" id="inputName"
                    placeholder="" required>
            </div>
        </div>
        <div class="form-group">
            <label for="inputName" class="col-sm-1-12 col-form-label">PRICE</label>
            <div class="col-sm-1-12">
                <input type="text" class="form-control" name="price" value="<?php echo $autofill[7]; ?>" id="inputName"
                    placeholder="" required>
            </div>
        </div>
        <div class="form-group">
            <label for="inputName" class="col-sm-1-12 col-form-label">Image</label>
            <div class="col-sm-1-12">
                <img src="img/<?php echo $autofill[9]; ?>" class="col-lg-2 col-md-4 col-sm-6 col-12"
                    style="height:150px;float:left;" alt="">
                <input type="file" class="form-control  col-lg-10 col-md-8 col-sm-6 col-12" name="p-img" id="inputName"
                    placeholder="">
            </div>
        </div>
             <select name='cat_id' id=''>
                        <option value=""  Selected>Chose Category</option>
                        <?php
                        $dropdown_query = mysqli_query($con, 'SELECT * FROM `categories`');
                        while ($dropdown_fetch = mysqli_fetch_array($dropdown_query)) {
                        ?>
                            <option value='<?php echo $dropdown_fetch[0] ?>'><?php echo $dropdown_fetch[1] ?></option>
                        <?php
                        } ?>
                    </select>

        <div class="form-group">
            <div>
                <button type="submit" name="update" class="btn btn-primary mt-3">Update</button>
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

<?php
if (isset($_POST['update'])) {
    $upd_name = $_POST['p-name'];
    $upd_desc = $_POST['desc'];
    $upd_qty = $_POST['qty'];
    $upd_price = $_POST['price'];
    $upd_catId = $_POST['cat_id'];
    // category not selected
    // variable(condition)?"if is true":"else is true"
    $catupd=($upd_catId=="")?"":",`category_Id`='$upd_catId'";
    if (!empty($_FILES['p-img']['tmp_name'])) {
        $upd_ImageTN = $_FILES['p-img']['tmp_name'];
        $upd_ImageON = $_FILES['p-img']['name'];
        $path = './img/' . $upd_ImageON;
        $extension = pathinfo($upd_ImageON, PATHINFO_EXTENSION);
        if ($extension=='png'||$extension=='jpeg'||$extension=='jpg'||$extension=='webp'||$extension=='svg'||$extension=='avif') {
            $uploader = move_uploaded_file($upd_ImageTN, $path);
            if ($uploader) {
                mysqli_query($con, "UPDATE `products` SET `Product_name`='$upd_name',`Description`='$upd_desc',`quantity`='$upd_qty',`Price`='$upd_price'$catupd,`Image`='$upd_ImageON' WHERE id =$upd_id");
                echo "<script>alert('Updated Sucessfully')
        location.assign('view-pro.php')
        </script>";
            } else {
                echo "<script>alert('Something Went Wrong')</script>";
            }
        } else {
            echo "<script>alert('Extension doesn`t match')</script>";
        }

    }
    
    
    else {
        mysqli_query($con, "UPDATE `products` SET `Product_name`='$upd_name',`Description`='$upd_desc',`quantity`='$upd_qty',`Price`='$upd_price'$catupd WHERE id =$upd_id");
        echo "<script>alert('Updated Sucessfully')
        location.assign('view-pro.php')</script>";
    }
}
?>