<?php
include("header.php");
include("connection.php");
?>
<!-- End of Topbar -->
                <!-- Begin Page Content -->
                 <?php
                 if (isset($_GET['upd_id'])) {
                    $upd_id=$_GET['upd_id'];
                    $autofill_query=mysqli_query($con,"SELECT * FROM `employees` where id =$upd_id");
                    $autofill=mysqli_fetch_array($autofill_query);
                 }?>
              <div class="container-fluid">
<form method='post' enctype="multipart/form-data">
            <div class="form-group">
                <label for="inputName" class="col-sm-1-12 col-form-label">Employee Name</label>
                <div class="col-sm-1-12" >
                    <input type="text" class="form-control" name="e-name" id="inputName" value="<?php echo $autofill[1];?>" placeholder="" required>
                </div>
            </div>
            <div class="form-group">
                <label for="inputName" class="col-sm-1-12 col-form-label">Designation</label>
                <div class="col-sm-1-12" >
                    <input type="text" class="form-control"value="<?php echo $autofill[2];?>" name="designation" id="inputName" placeholder="" required>
                </div>
            </div>
            <div class="form-group">
                <label for="inputName" class="col-sm-1-12 col-form-label">DOB</label>
                <div class="col-sm-1-12" >
                    <input type="text" value="<?php echo $autofill[3];?>" class="form-control" name="e-dob" id="inputName" placeholder="0000-00-00" required>
                </div>
            </div>
            <div class="form-group">
                <label for="inputName" class="col-sm-1-12 col-form-label">Joining-Date</label>
                <div class="col-sm-1-12" >
                    <input type="text" value="<?php echo $autofill[4];?>" class="form-control" name="date" id="inputName" placeholder="0000-00-00" required>
                </div>
            </div>
            <div class="form-group">
                <label for="inputName" class="col-sm-1-12 col-form-label">Salary</label>
                <div class="col-sm-1-12" >
                    <input type="text" value="<?php echo $autofill[5];?>" class="form-control" name="salary" id="inputName" placeholder="" required>
                </div>
            </div>
            <div class="form-group">
                <label for="inputName" class="col-sm-1-12 col-form-label">Email</label>
                <div class="col-sm-1-12" >
                    <input type="text" value="<?php echo $autofill[6];?>" class="form-control" name="email" id="inputName" placeholder="" required>
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
            include("footer.php")
            ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

 
<?php
if(isset($_POST['update'])){
    $upd_name=$_POST['e-name'];
    $upd_designation=$_POST['designation'];
    $upd_dob=$_POST['e-dob'];
    $upd_date=$_POST['date'];
    $upd_salary=$_POST['salary'];
    $upd_email=$_POST['email'];
    $update_query=mysqli_query($con,"UPDATE `employees` SET `name`='$upd_name',`designation`='$upd_designation',`DOB`='$upd_dob',`Joining_date`='$upd_date',`salary`='$upd_salary',`email`='$upd_email' WHERE ID=$upd_id");
    if($update_query){
        echo "<script>alert('Record Updated Sucessfully')
        location.assign('emp_view.php')</script>";
    }
    else{echo "<script>alert('Something Went wrong')</script>";}
    }

?>