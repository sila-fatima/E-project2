<?php
include("header.php");
include("connection.php");

?>
<!-- End of Topbar -->
<!-- Begin Page Content -->
<div class="container-fluid">
    <?php if ($_SESSION['role'] == 'admin') { ?>
        <table class="table">
            <thead>
                <tr>
                    <th>Category-Id</th>
                    <th>Category-Name</th>
                    <th>Category-Description</th>
                    <th>Total Products</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // search query
                if (isset($_GET['search']) && $_GET['search'] != "") {
                    $search = $_GET['search'];
                    $search_query = mysqli_query($con, "SELECT * FROM categories WHERE Id='$search' OR name='$search'");
                    
                    if (mysqli_num_rows($search_query) <= 0) {
                        echo "<script>alert('No Category Found'); location.assign('view-cat.php');</script>";
                    } else {
                        $result = mysqli_fetch_array($search_query);
                        $count_all_products_id=$result[0];
                        $count_pro_querry=mysqli_query($con,"SELECT COUNT(*) AS total FROM products WHERE category_id = '$count_all_products_id'");
                        $count_each_pro=mysqli_fetch_assoc($count_pro_querry);
                        $totalproduct=$count_each_pro['total'];
                        ?>
                        <tr>
                            <td><?php echo $result[0] ?></td>
                            <td><?php echo $result[1] ?></td>
                            <td><?php echo $result[3] ?>"</td>
                            <td><?php echo $totalproduct ?></td>
                            <td>
                                <a href="update-cat.php?upd_id=<?php echo $result[0] ?>" class="btn btn-warning">UPDATE</a>&nbsp;
                                <a href="?dlt-id=<?php echo $result[0] ?>" class="btn btn-danger">DELETE</a>
                            </td>
                        </tr>
                        <?php
                    }
                } else {
                    // Fetch all data
                    $select_cat = mysqli_query($con, "SELECT * FROM `categories`");
                    foreach ($select_cat as $eachcat) {
                        $count_all_products_id=$eachcat['Id'];
                        $count_pro_querry=mysqli_query($con,"SELECT COUNT(*) AS total FROM products WHERE category_id = '$count_all_products_id'");
                        $count_each_pro=mysqli_fetch_assoc($count_pro_querry);
                        $totalproduct=$count_each_pro['total'];
                        ?>
                        <tr>
                            <td><?php echo $eachcat['Id'] ?></td>
                            <td><?php echo $eachcat['name'] ?></td>
                             <td><?php echo $eachcat['Description'] ?></td>
                              <td><?php echo $totalproduct?></td>
                           
                            <td>
                                <a href="update-cat.php?upd_id=<?php echo $eachcat['Id'] ?>" class="btn btn-warning">UPDATE</a>&nbsp;
                                <a href="?dlt-id=<?php echo $eachcat['Id'] ?>" class="btn btn-danger">DELETE</a>
                            </td>
                        </tr>
                        <?php
                    }
                }
                ?>
            </tbody>
        </table>
        <a href="add-cat.php" class="btn btn-info" style="margin-bottom:30px;">Add</a>

    <?php } else { ?>
        
        <table class="table">
            <thead>
                <tr>
                    <th>Category-Id</th>
                    <th>Category-Name</th>
                    <th>Category-Description</th>
                    <th>Total Products</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($_GET['search']) && $_GET['search'] != "") {
                    $search = $_GET['search'];
                    $search_query = mysqli_query($con, "SELECT * FROM categories WHERE Id='$search' OR name='$search'");
                    
                    if (mysqli_num_rows($search_query) <= 0) {
                        echo "<script>alert('No Category Found'); location.assign('view-cat.php');</script>";
                    } else {
                        $result = mysqli_fetch_array($search_query);
                        $count_all_products_id=$result[0];
                        $count_pro_querry=mysqli_query($con,"SELECT COUNT(*) AS total FROM products WHERE category_id = '$count_all_products_id'");
                        $count_each_pro=mysqli_fetch_assoc($count_pro_querry);
                        $totalproduct=$count_each_pro['total'];
                        ?>
                        <tr>
                            <td><?php echo $result[0] ?></td>
                            <td><?php echo $result[1] ?></td>
                            <td><?php echo $result[3] ?></td>
                            <td><?php echo $totalproduct ?></td>
                        </tr>
                        <?php
                    }
                } else {
                    // Fetch all data
                    $select_cat = mysqli_query($con, "SELECT * FROM `categories`");
                    foreach ($select_cat as $eachcat) {
                        $count_all_products_id=$eachcat['Id'];
                        $count_pro_querry=mysqli_query($con,"SELECT COUNT(*) AS total FROM products WHERE category_id = '$count_all_products_id'");
                        $count_each_pro=mysqli_fetch_assoc($count_pro_querry);
                        $totalproduct=$count_each_pro['total'];
                        ?>
                        <tr>
                            <td><?php echo $eachcat['Id'] ?></td>
                            <td><?php echo $eachcat['name'] ?></td>
                            <td><?php echo $eachcat['Description'] ?></td>
                            <td><?php echo $totalproduct ?></td>
                        </tr>
                        <?php
                    }
                }
                ?>
            </tbody>
        </table>
    <?php } ?>

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
// delete query
if (isset($_GET['dlt-id'])) {
    $dltID = $_GET['dlt-id'];
    $dlt_querry = mysqli_query($con, "DELETE FROM `categories` WHERE Id = $dltID");
    if ($dlt_querry) {
        echo "<script>alert('Category Deleted Successfully'); location.assign('view-cat.php');</script>";
    } else {
        echo "<script>alert('Something Went Wrong');</script>";
    }
}
?>