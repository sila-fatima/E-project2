<?php
session_start();
include('../admin-pannel/connection.php');
if(isset($_SESSION['userid'])){
  echo "<script> 
        location.assign('index.php');
    </script>";
}else{
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Sign In - Inkwell</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,400;9..144,500;9..144,600&family=Space+Grotesk:wght@400;500;700&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="login-wrapper">
        <div class="login-card">
            <div class="text-center mb-4">
                <span style="font-size: 28px;">✒️</span>
                <h3 class="mt-2" style="font-family: 'Fraunces', serif; font-weight: 600;">Welcome back</h3>
                <p class="text-muted small">Access your order history and tracking profile</p>
                <form method="post">
                    <div class="mb-3 ">
                        <div class="d-flex justify-content-between">
                            <label class="form-label">Email Address</label>
                        </div>
                        <input type="email" name='email' class="form-control" placeholder="name@example.com" required>
                    </div>
                    <div class="mb-4">
                        <div class="d-flex justify-content-between">
                            <label class="form-label">Password</label>
                        </div>
                        <input type="password" name="pass" id="password" class="form-control" maxlength="11" placeholder="••••••••" required>
                        <div class="form-check mt-2 d-flex justify-content-flexstart gap-1">
                            <input class="form-check-input" type="checkbox" id="showPassword">
                            <label class="form-check-label small text-muted" for="showPassword">
                                Show password
                            </label>
                        </div>
                    </div>

                    <button type="submit" name="signin" class="btn btn-primary mb-3">Sign In</button>

                    <div class="text-center mt-3">
                        <p class="small text-muted mb-0">Don't have an account? <a href="register.php" style="color: var(--coral);" class="text-decoration-none">Create one</a></p>
                        <a href="index.php" class="d-block small text-muted text-decoration-none mt-4">← Back to Storefront</a>
                    </div>
            </div>
        </div>
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
if (isset($_POST['signin'])) {
    $email = $_POST['email'];
    $password = $_POST['pass'];
    $login_query = mysqli_query($con, "SELECT * FROM `users` WHERE email='$email' AND password='$password'");
    $checker = mysqli_num_rows($login_query);
    if ($checker) {
        $userinfo = mysqli_fetch_array($login_query);
        $_SESSION['userid'] = $userinfo[0];
        echo "<script>alert('login Successfully')
location.assign('index.php')</script>";
    } else {
        echo "<script>alert('Login failed')
location.assign('login.php')</script>";
    }
}}

?>