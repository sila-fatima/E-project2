<?php
include('connection.php');
session_start();
if(isset($_SESSION['emp_name'])){
    echo "<script> location.assign('index.php')</script>";
}
else {

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
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form class="user" method="POST">
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="pass" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <div class="form-check mt-2 d-flex justify-content-flexstart gap-1">
                            <input class="form-check-input" type="checkbox" id="showPassword">
                            <label class="form-check-label small text-muted" for="showPassword">
                                Show password
                            </label>
                        </div>
                                        </div>
                                        <button type="submit" name="login" class="btn btn-primary btn-user btn-block">
        Login
    </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="changepassword.php">Change Password?</a>
                                    </div>
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
            <Script>
            let checkbox = document.getElementById('showPassword');
            let passwordbox = document.getElementById('password');
            checkbox.addEventListener('change', function() {
                if (checkbox.checked) {
                    passwordbox.type = 'text';
                } else {
                    passwordbox.type = 'password'
                }
            })
        </Script>

</body>

</html>
<?php
if (isset($_POST['login'])){
$email=$_POST['email'];
$password=$_POST['pass'];
$login_query=mysqli_query($con,"SELECT * FROM `employees` WHERE email='$email' AND password='$password' ");
$array=mysqli_fetch_array($login_query);
$_SESSION['emp_name']=$array[1];
$_SESSION['role']=$array[8];
$checker=mysqli_num_rows($login_query);
if ($checker) {
        echo "<script>alert('login Successfully')
    location.assign('index.php')</script>";
    } else {
        echo "<script>alert('Login failed')
    location.assign('login.php')</script>";
    }
}
}
?>