<?php
include("header.php");
include("connection.php");
?>
<div class="container-fluid">
    <?php if($_SESSION['role']=='admin'){ ?>
    <table class="table">
        <thead>
            <tr>
                <th>Product_code</th>
                <th>Product_number</th>
                <th>Product_ID </th>
                <th>Product_name</th>
                <th>Description</th>
                <th>Stock</th>
                <th>Price</th>
                <th>Image</th>
                <th>CategoryID</th>
                <th>Actions</th>
            </tr>
        </thead>

        <?php
        // fetch search item
        if(isset($_GET['search'])){
            $search=trim($_GET['search']);
            $search_query=mysqli_query($con,"SELECT * FROM products WHERE Product_ID='$search' OR Product_name='$search'");
            if (mysqli_num_rows($search_query)<=0) {
                echo "<script>alert('No Product Found'); location.assign('view-pro.php');</script>";

            } else {
                $result = mysqli_fetch_array($search_query);
                ?>
                <tbody>
                <tr>
                    <td><?php echo $result[1] ?></td>
                    <td><?php echo $result[2] ?></td>
                    <td><?php echo $result[3] ?></td>
                    <td ><?php echo $result[4] ?></td>
                    <td style="max-width: 100px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;"><?php echo $result[5] ?></td>
                    <td><?php echo $result[6]?></td>
                    <td><?php echo $result[7]?></td>
                    <td><img style="width:150px; height:100px; object-fit:cover;" src="./img/<?php echo $result[9] ?>" alt=""></td>
                    <td><?php echo $result[8] ?></td>
                    <td><a href="updatepro.php?upd_id=<?php echo $result[0] ?>" class="btn btn-warning mb-3">UPDATE</a>
                    <a href="?dlt-id=<?php echo $result[0] ?>" class="btn btn-danger">DELETE</a></td>
                </tr>
            </tbody>
            <?php
            }
            
        }else{
        // fetch all data  query
        $selectpro = mysqli_query($con, "SELECT * FROM `products`");
        foreach ($selectpro as $allpro) {
        ?>
            <tbody>
                <tr>
                    <td><?php echo $allpro['Product_code'] ?></td>
                    <td><?php echo $allpro['Product_number'] ?></td>
                    <td><?php echo $allpro['Product_ID'] ?></td>
                    <td><?php echo $allpro['Product_name'] ?></td>
                    <td style="max-width: 100px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;"><?php echo $allpro['Description'] ?></td>
                    <td><?php echo $allpro['quantity']?></td>
                    <td><?php echo $allpro['Price'] ?></td>
                    <td><img style="width:150px; height:100px; object-fit:cover;" src="./img/<?php echo $allpro['Image'] ?>" alt=""></td>
                    <td><?php echo $allpro['category_Id'] ?></td>
                    <td><a href="updatepro.php?upd_id=<?php echo $allpro['id'] ?>" class="btn btn-warning mb-3">UPDATE</a>
                    <a href="?dlt-id=<?php echo $allpro['id'] ?>" class="btn btn-danger">DELETE</a></td>
                </tr>
            </tbody>

        <?php
        }}
        ?>
    </table>
    
    
    <a href="add-pro.php" class="btn btn-info pe-5 ps-5" style="margin-bottom:30px;">Add</a>
    <?php }else{?>
    <table class="table">
        <thead>
            <tr>
                <th>Product_code</th>
                <th>Product_number</th>
                <th>Product_ID </th>
                <th>Product_name</th>
                <th>Description</th>
                <th>stock</th>
                <th>Price</th>
                <th>Image</th>
                <th>CategoryID</th>
            </tr>
        </thead>
        <?php
        // fetch search item
        if(isset($_GET['search'])){
            $search=$_GET['search'];
            $search_query=mysqli_query($con,"SELECT * FROM products WHERE Product_ID='$search' OR Product_name='$search'");
            if (mysqli_num_rows($search_query)<=0) {
                echo "<script>alert('No Product Found'); location.assign('view-pro.php');</script>";

            } else {
                $result = mysqli_fetch_array($search_query);
                ?>
                <tbody>
                <tr>
                    <td><?php echo $result[1] ?></td>
                    <td><?php echo $result[2] ?></td>
                    <td><?php echo $result[3] ?></td>
                    <td><?php echo $result[4] ?></td>
                    <td style="max-width: 100px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;"><?php echo $result[5] ?></td>
                    <td><?php echo $result[6]?></td>
                    <td><?php echo $result[7]?></td>
                    <td><img style="width:150px; height:100px; object-fit:cover;" src="./img/<?php echo $result[9] ?>" alt=""></td>
                    <td><?php echo $result[8] ?></td>
                </tr>
            </tbody>
            <?php
            }
            
        }else{
        // fetch query
        $selectpro = mysqli_query($con, "SELECT * FROM `products`");
        foreach ($selectpro as $allpro) {
        ?>
            <tbody>
                <tr>
                    <td><?php echo $allpro['Product_code'] ?></td>
                    <td><?php echo $allpro['Product_number'] ?></td>
                    <td><?php echo $allpro['Product_ID'] ?></td>
                    <td><?php echo $allpro['Product_name'] ?></td>
                    <td style="max-width: 100px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;"><?php echo $allpro['Description'] ?></td>
                    <td><?php echo $allpro['quantity']?></td>
                    <td><?php echo $allpro['Price'] ?></td>
                    <td><img style="width:150px; height:100px; object-fit:cover;" src="./img/<?php echo $allpro['Image'] ?>" alt=""></td>
                    <td><?php echo $allpro['category_Id'] ?></td>
                </tr>
            </tbody>

        <?php
        } }
        ?>
    </table>
    <?php
    }?>


</div>
</div>
<?php
include("footer.php");
?>
</div>
</div>
<?php
if (isset($_GET['dlt-id'])) {
    $dltID = $_GET['dlt-id'];

    $dlt_querry = mysqli_query($con, "DELETE FROM `products` WHERE Id = $dltID");
    if ($dlt_querry) {
        echo "<script>alert('product Deleted Successfully')
    location.assign('view-product.php')
    </script>";
    } else {
        echo "<script>alert('Something Went Wrong')</script>";
    }
}
?>