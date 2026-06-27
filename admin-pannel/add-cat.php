<?php
include("header.php");
include("connection.php");
?>
<!-- End of Topbar -->
<!-- Begin Page Content -->
<div class="container-fluid">
    <form method='post' enctype="multipart/form-data">
        <div class="form-group">
            <label for="inputName" class="col-sm-1-12 col-form-label">Category Name</label>
            <div class="col-sm-1-12">
                <input type="text" class="form-control" name="c-name" id="inputName" placeholder="" required>
            </div>
        </div>
        <div class="form-group">
            <label for="inputName" class="col-sm-1-12 col-form-label">Image</label>
            <div class="col-sm-1-12">
                <input type="file" class="form-control" name="c-img" id="inputName" placeholder="" required>
            </div>
        </div>

        <div class="form-group">
            <div>
                <button type="submit" name="add" class="btn btn-primary">Add</button>
                <a href="view-cat.php" class="btn btn-dark">ViewAll</a>
            </div>
        </div>
    </form>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Footer -->
<?php
include("footer.php")
?>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<?php
if (isset($_POST['add'])) {
    $name = $_POST['c-name'];
    $totalproduct = 0;
    $imageON = $_FILES['c-img']['name'];
    $imageTN = $_FILES['c-img']['tmp_name'];
    $path = './img/' . $imageON;
    $extension = PATHINFO($imageON, PATHINFO_EXTENSION);
    if ($extension == 'png' || $extension == 'jpeg' || $extension == 'jpg' || $extension == 'webp' || $extension == 'svg' || $extension == 'avif') {
        $uploader = move_uploaded_file($imageTN, $path);
        if ($uploader) {
            $insert_cat = mysqli_query($con, "INSERT INTO `categories`(`name`, `items`, `Image`) VALUES ('$name','$totalproduct','$imageON')");
            echo "<script>alert('Category Added Sucessfully')</script>";
        } else {
            echo "<script>alert('Something Went Wrong')</script>";
        }
    } else {
        echo "<script>alert('Extension doesn`t match')</script>";
    }
}
?>