<?php
include("header.php");
include("connection.php");
?>
<!-- End of Topbar -->
                <!-- Begin Page Content -->
              <div class="container-fluid">
<form method='post' enctype="multipart/form-data">
            <div class="form-group">
                <label for="inputName" class="col-sm-1-12 col-form-label">Employee Name</label>
                <div class="col-sm-1-12" >
                    <input type="text" class="form-control" name="e-name" id="inputName" placeholder="" required>
                </div>
            </div>
            <div class="form-group">
                <label for="inputName" class="col-sm-1-12 col-form-label">Designation</label>
                <div class="col-sm-1-12" >
                    <input type="text" class="form-control" name="designation" id="inputName" placeholder="" required>
                </div>
            </div>
            <div class="form-group">
                <label for="inputName" class="col-sm-1-12 col-form-label">DOB</label>
                <div class="col-sm-1-12" >
                    <input type="text" class="form-control" name="e-dob" id="inputName" placeholder="0000-00-00" required>
                </div>
            </div>
            <div class="form-group">
                <label for="inputName" class="col-sm-1-12 col-form-label">Joining-Date</label>
                <div class="col-sm-1-12" >
                    <input type="text" class="form-control" name="date" id="inputName" placeholder="0000-00-00" required>
                </div>
            </div>
            <div class="form-group">
                <label for="inputName" class="col-sm-1-12 col-form-label">Salary</label>
                <div class="col-sm-1-12" >
                    <input type="text" class="form-control" name="salary" id="inputName" placeholder="" required>
                </div>
            </div>
            <div class="form-group">
                <label for="inputName" class="col-sm-1-12 col-form-label">Email</label>
                <div class="col-sm-1-12" >
                    <input type="text" class="form-control" name="email" id="inputName" placeholder="" required>
                </div>
            </div>
            <div class="form-group">
                <label for="inputName" class="col-sm-1-12 col-form-label">Password</label>
                <div class="col-sm-1-12" >
                    <input type="text" class="form-control" name="password" id="inputName" placeholder="" required>
                </div>
            </div>
            
            <div class="form-group">
                <div>
                    <button type="submit" name="add" class="btn btn-primary">Add</button>
                    <a href="emp_view.php" class="btn btn-dark">ViewAll</a>
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
if(isset($_POST['add'])){
    $name=$_POST['e-name'];
    $designation=$_POST['designation'];
    $dob=$_POST['e-dob'];
    $date=$_POST['date'];
    $salary=$_POST['salary'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $insert_query=mysqli_query($con,"INSERT INTO `employees`(`name`, `designation`, `DOB`, `Joining_date`, `salary`, `email`, `password`) VALUES ('$name','$designation','$dob','$date','$salary','$email','$password')");
    if($insert_query){
        echo "<script>alert('Record Added Sucessfully')</script>";
    }
    else{echo "<script>alert('Something Went wrong')</script>";}
    }

?>