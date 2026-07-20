<?php
include('connection.php');
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Arts Admin-pannel - Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <?php if(isset($_SESSION['emp_id'])){
                                        $id=$_SESSION['emp_id'];
                                        $autofillQuery=mysqli_query($con,"SELECT * FROM `employees` WHERE Id =$id");
                                        $autofil=mysqli_fetch_array($autofillQuery);
                                        }
                                        ?>
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Update Profile</h1>
                                    </div>
                                    <form class="user" method="POST">
                                        <div class="form-group">
                                            <input type="text" required name="u-name" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp" readonly value="<?php echo $autofil[7];?>"
                                                placeholder="Enter Username...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" required  name="pass" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password">
                                        </div>
                                        
                                    <hr><div class="form-group">
                                            <input type="text"  name="new_u-name" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter New Username ...">
                                        </div>
                                    
                                    <div class="form-group">
                                            <input type="password" name="newpass"  class="form-control form-control-user"
                                                id="exampleInputPassword" maxlength="12" placeholder="Enter New Password">
                                        </div> 
                                    <button type="submit" name="save" class="btn btn-primary btn-user btn-block">Update
    </button>
                                        </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
<?php
if (isset($_POST['save'])){
$u_name=$_POST['u-name'];
$password=$_POST['pass'];
$newU_name=$_POST['new_u-name'];
$newpass=$_POST['newpass'];
    if($newU_name==""){
        $updatequery=mysqli_query($con,"UPDATE `employees` SET `password`='$newpass' WHERE user_name='$u_name' AND password='$password' ");
    }
    elseif($newpass ==""){
        $updatequery=mysqli_query($con,"UPDATE `employees` SET `user_name`='$newU_name' WHERE user_name='$u_name' AND password='$password' ");
    }
    elseif($newpass!="" && $newU_name != ""){
        $updatequery=mysqli_query($con,"UPDATE `employees` SET `password`='$newpass',`user_name`='$newU_name' WHERE user_name='$u_name' AND password='$password' ");
    }
    else{echo "<script>alert('Something Went Wrrong')
    location.assign('changepassword.php')</script>";}

if ($updatequery) {
    if (!empty($newU_name)) {
            $_SESSION['emp_uname'] = $newU_name;
        }
        echo "<script>alert('Update Profile Successfully')
    location.assign('login.php')</script>";
    } 
}
?>
