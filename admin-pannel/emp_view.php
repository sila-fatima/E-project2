<?php
include('header.php');
include('connection.php');
?>
                <div class="container-fluid">

                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-2 text-gray-800">
                            Employees 
                            <?php 
                             if ($_SESSION['role']=='admin') {
                             ?>
                            <a href="add-emp.php" class="text-gray-800 ml-2" title="Add New Employee" style="text-decoration: none;">
                                <i class="fas fa-plus" style="font-size: 1.2rem; vertical-align: middle;"></i>
                            </a>
                              <?php } ?>
                        </h1>
                    </div>
                    <?php 
                    if ($_SESSION['role']=='admin') {
                       ?>

                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Designation</th>
                                    <th>DOB</th>
                                    <th>Start date</th>
                                    <th>Salary</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Designation</th>
                                    <th>DOB</th>
                                    <th>Start date</th>
                                    <th>Salary</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                            <!-- delete query -->
                            <?php if(isset($_GET['search'])){
                                $search=trim($_GET['search']);
                                $search_query=mysqli_query($con,"SELECT * FROM employees WHERE Id='$search' OR name='$search'");
                                if(mysqli_num_rows($search_query)<=0){
                                    echo "<script>alert('No Record Found'); location.assign('emp_view.php');</script>";
                                }
                                else{ 
                                    $result=mysqli_fetch_array($search_query);
                                    ?>
                                    <tbody>
                                <tr>
                                    <td><?php echo $result[0]?></td>
                                    <td><?php echo $result[1]?></td>
                                    <td><?php echo $result[6]?></td>
                                    <td><?php echo $result[2]?></td>
                                    <td><?php echo $result[3]?></td>
                                    <td><?php echo $result[4]?></td>
                                    <td><?php echo $result[5]?></td>
                                    <td>
                                        <a href="update_emp.php?upd_id=<?php echo $result[0] ?>" class="btn btn-warning ">UPDATE</a>
                                        <a href="?dlt-id=<?php echo $result[0] ?>" class="btn btn-danger">DELETE</a>
                                    </td>
                                </tr>
                            </tbody>
                               <?php }
                            }else{
                            // all dATA query
                            $fetch_query=mysqli_query($con,"SELECT * FROM `employees`");
                            while( $all_info=mysqli_fetch_array($fetch_query)){
                            ?>
                            <tbody>
                                <tr>
                                    <td><?php echo $all_info[0]?></td>
                                    <td><?php echo $all_info[1]?></td>
                                    <td><?php echo $all_info[6]?></td>
                                    <td><?php echo $all_info[2]?></td>
                                    <td><?php echo $all_info[3]?></td>
                                    <td><?php echo $all_info[4]?></td>
                                    <td><?php echo $all_info[5]?></td>
                                    <td>
                                        <a href="update_emp.php?upd_id=<?php echo $all_info[0] ?>" class="btn btn-warning ">UPDATE</a>
                                        <a href="?dlt-id=<?php echo $all_info[0] ?>" class="btn btn-danger">DELETE</a>
                                    </td>
                                </tr>
                            </tbody>
                            <?php }} ?>
                        </table>
                    </div>
                    <?php } else{?>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Designation</th>
                                    <th>DOB</th>
                                    <th>Start date</th>
                                    <th>Salary</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Designation</th>
                                    <th>DOB</th>
                                    <th>Start date</th>
                                    <th>Salary</th>
                                </tr>
                            </tfoot>
                                                        <!-- delete query -->
                            <?php if(isset($_GET['search'])){
                                $search=$_GET['search'];
                                $search_query=mysqli_query($con,"SELECT * FROM employees WHERE Id='$search' OR name='$search'");
                                if(mysqli_num_rows($search_query)<=0){
                                    echo "<script>alert('No Record Found'); location.assign('emp_view.php');</script>";
                                }
                                else{ 
                                    $result=mysqli_fetch_array($search_query);
                                    ?>
                                    <tbody>
                                <tr>
                                    <td><?php echo $result[0]?></td>
                                    <td><?php echo $result[1]?></td>
                                    <td><?php echo $result[6]?></td>
                                    <td><?php echo $result[2]?></td>
                                    <td><?php echo $result[3]?></td>
                                    <td><?php echo $result[4]?></td>
                                    <td><?php echo $result[5]?></td>
                                    <td>
                                        <a href="update_emp.php?upd_id=<?php echo $result[0] ?>" class="btn btn-warning ">UPDATE</a>
                                        <a href="?dlt-id=<?php echo $result[0] ?>" class="btn btn-danger">DELETE</a>
                                    </td>
                                </tr>
                            </tbody>
                               <?php }
                            }else{
                            // all data query
                            $fetch_query=mysqli_query($con,"SELECT * FROM `employees`");
                            while( $all_info=mysqli_fetch_array($fetch_query)){
                            ?>
                            <tbody>
                                <tr>
                                    <td><?php echo $all_info[0]?></td>
                                    <td><?php echo $all_info[1]?></td>
                                    <td><?php echo $all_info[6]?></td>
                                    <td><?php echo $all_info[2]?></td>
                                    <td><?php echo $all_info[3]?></td>
                                    <td><?php echo $all_info[4]?></td>
                                    <td><?php echo $all_info[5]?></td>
                                </tr>
                            </tbody>
                            <?php }} ?>
                        </table>
                    </div>
                    <?php
                    }?>
                      

                </div>
                </div>
            <?php
include('footer.php');

if (isset($_GET['dlt-id'])) {
    $dltID = $_GET['dlt-id'];

    $dlt_querry = mysqli_query($con, "DELETE FROM `employees` WHERE Id =$dltID");
    if ($dlt_querry) {
        echo "<script>alert('Record Deleted Successfully')
    location.assign('emp_view.php')
    </script>";
    } else {
        echo "<script>alert('Something Went Wrong')</script>";
    }
}
?>