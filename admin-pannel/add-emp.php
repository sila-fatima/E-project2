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
                <label for="inputName" class="col-sm-1-12 col-form-label">User_name</label>
                <div class="col-sm-1-12" >
                    <input type="text" class="form-control" name="u-name" id="inputName" placeholder="" required>
                </div>
            </div>
            <div class="form-group">
                <label for="inputName" class="col-sm-1-12 col-form-label">Password</label>
                <div class="col-sm-1-12" >
                    <input type="text" class="form-control" name="password" maxlength="12" id="inputName" placeholder="" required>
                </div>
            </div>
            
            <div class="form-group">
                <div>
                    <button type="submit" name="add" class="btn btn-primary">Register</button>
                    <?Php if (isset($_POST['add'])){
                        $email=$_POST['email'];?>
                    <a href="https://mail.google.com/mail/?view=cm&to=<?php echo $email?>"  class="btn btn-dark">Confirmation Mail</a>
                     <?php } else{ 
                        ?>
                     <a onclick="alert('Register First')"  class="btn btn-dark">Confirmation Mail</a>
                     <?php
                     }?>
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
    $username=$_POST['u-name'];
    $password=$_POST['password'];
    $insert_query=mysqli_query($con,"INSERT INTO `employees`(`name`, `designation`, `DOB`, `Joining_date`, `salary`, `email`,`user_name`, `password`) VALUES ('$name','$designation','$dob','$date','$salary','$email','$username','$password')");
    if($insert_query){
        echo "<script>alert('Record Added Sucessfully')</script>";
    }
    else{echo "<script>alert('Something Went wrong')</script>";}
    }

?>