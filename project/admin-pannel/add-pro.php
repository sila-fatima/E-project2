    <?php
    include('header.php');
    include('connection.php');
    ?>
    <!-- End of Topbar -->
    <!-- Begin Page Content -->
    <div class='container-fluid'>
        <form method='post' enctype='multipart/form-data'>
            <div class='form-group'>
                <label for='inputName' class='col-sm-1-12 col-form-label'>Product Name</label>
                <div class='col-sm-1-12'>
                    <input type='text' class='form-control' name='p-name' id='inputName' placeholder='' required>
                </div>
            </div>
            <div class='form-group'>
                <label for='inputName' class='col-sm-1-12 col-form-label'>Description</label>
                <div class='col-sm-1-12'>
                    <input type='text' class='form-control' name='desc' id='inputName' placeholder='' required>
                </div>
            </div>
            <div class='form-group'>
                <label for='inputName' class='col-sm-1-12 col-form-label'>Stock</label>
                <div class='col-sm-1-12'>
                    <input type='text' class='form-control' name='qty' id='inputName' placeholder='' required>
                </div>
            </div>
            <div class='form-group'>
                <label for='inputName' class='col-sm-1-12 col-form-label'>Price</label>
                <div class='col-sm-1-12'>
                    <input type='text' class='form-control' name='price' id='inputName' placeholder='' required>
                </div>
            </div>
            <div class='form-group'>
                <label for='inputName' class='col-sm-1-12 col-form-label'>Category</label>
                <div class='col-sm-1-12'>
                    <select name='cat' id=''>
                        <option value='' Selected>Chose Category</option>
                        <!-- fetch Category Dynamically -->
                        <?php
                        $dropdown_query = mysqli_query($con, 'SELECT * FROM `categories`');
                        while ($dropdown_fetch = mysqli_fetch_array($dropdown_query)) {
                        ?>
                            <option value='<?php echo $dropdown_fetch[0] ?>'><?php echo $dropdown_fetch[1] ?></option>
                        <?php
                        } ?>
                    </select>
                </div>
            </div>
            <div class='form-group'>
                <label for='inputName' class='col-sm-1-12 col-form-label'>Image</label>
                <div class='col-sm-1-12'>
                    <input type='file' class='form-control' name='p-img' id='inputName' placeholder='' required>
                </div>
            </div>

            <div class='form-group'>
                <div>
                    <button type='submit' name='add' class='btn btn-primary'>Add</button>
                    <a href='view-pro.php' class='btn btn-dark'>ViewAll</a>
                </div>
            </div>
        </form>

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <!-- Footer -->
    <?php
    include('footer.php')
    ?>
    <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <?php
    if (isset($_POST['add'])) {
        $name = $_POST['p-name'];
        $desc = $_POST['desc'];
        $qty = $_POST['qty'];
        $price = $_POST['price'];
        $cat_id = $_POST['cat'];
        $imageON = $_FILES['p-img']['name'];
        $imageTN = $_FILES['p-img']['tmp_name'];
        $path = './img/' . $imageON;
        $extension = PATHINFO($imageON, PATHINFO_EXTENSION);
        if ($extension=='png'||$extension=='jpeg'||$extension=='jpg'||$extension=='webp'||$extension=='avif'||$extension=='svg') {
            $uploader = move_uploaded_file($imageTN, $path);
            if ($uploader) {
                mysqli_query($con, "INSERT INTO `products`(`Product_name`, `Description`,`quantity`,`Price`, `category_Id`, `Image`) VALUES ('$name','$desc','$qty','$price','$cat_id','$imageON')");
                echo "<script>alert('Product Added Sucessfully')</script>";
            } else {
                echo "<script>alert('Something Went Wrong')</script>";
            }
        } else {
            echo "<script>alert('Extension doesn`t match')</script>";
        }
    }
    ?>