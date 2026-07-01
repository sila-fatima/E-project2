<?php
session_start();
include('../admin-pannel/connection.php');
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
        <div class="login-card px-5" style="padding: 0;">
            <div class="text-center mb-4">
                <span style="font-size: 28px;">✒️</span>
                <h3 class="mt-2" style="font-family: 'Fraunces', serif; font-weight: 600;">Register </h3>
                <p class="text-muted small">Tools for your craft, treasures for your heart.</p>
            </div>
            <form method="post">
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name='name' class="form-control" placeholder="name@example.com" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email Address</label>
                    <input type="email" name='email' class="form-control" placeholder="name@example.com" required>
                    <div class="mb-3">
                        <label class="form-label">Phone-Number</label>
                        <input type="number" name='phone' class="form-control" placeholder="name@example.com" required>
                    </div>
                    <div class="mb-4">
                        <div class="d-flex justify-content-between">
                            <label class="form-label">Password</label>
                        </div>
                        <input type="text" name="pass" id="password" class="form-control" maxlength="11" placeholder="••••••••" required>
                    </div>
                    <button type="submit" name="register" class="btn btn-primary mb-3">Register</button>
            </form>
        </div>
    </div>
    <Script>
    </Script>

</body>

</html>
<?php
if (isset($_POST['register'])) {
    $email = $_POST['email'];
    $password = $_POST['pass'];
    $phone = $_POST['phone'];
    $name = $_POST['name'];
    $reg_query = mysqli_query($con, "INSERT INTO `users`( `username`, `email`, `phone`, `password`) VALUES ('$name','$email','$phone','$password')");

    if ($reg_query) {
        echo "<script>alert('Register Successfully')
location.assign('login.php')</script>";
    } else {
        echo "<script>alert('Somethging Went Wrong Try Again')
location.assign('register.php')</script>";
    }
}


?>