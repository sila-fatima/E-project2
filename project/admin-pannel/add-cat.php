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
            <label for="inputName" class="col-sm-1-12 col-form-label">Description</label>
            <div class="col-sm-1-12">
                <input type="text" class="form-control" name="c-desc" id="inputName" placeholder="" required>
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
    $desc = $_POST['c-desc'];
    $totalproduct = 0;
    $insert_cat = mysqli_query($con, "INSERT INTO `categories`(`name`, `items`, `Description`) VALUES ('$name','$totalproduct','$desc')");
    if($insert_cat){
            echo "<script>alert('Category Added Sucessfully')</script>";
        } else {
            echo "<script>alert('Something Went Wrong')</script>";
        }
    } 

?>