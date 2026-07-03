<?php
include('query.php');
include('../admin-pannel/connection.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inkwell - Premium Stationery Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,400;9..144,500;9..144,600&family=Space+Grotesk:wght@400;500;700&family=JetBrains+Mono:wght@400;500&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg">
        <div class="container-lg">
            <a class="navbar-brand" style="color: #F2E9DD;" href="#">✒️ Inkwell</a>
            <div class="d-flex align-items-center gap-2 gap-sm-3 ms-auto">
                <ul class="navbar-nav flex-row gap-3 me-2 me-sm-3 d-flex">
                    <li class="nav-item"><a class="nav-link" href="index.php">Shop</a></li>
                    <li class="nav-item"><a class="nav-link " href="trackorder.php">Orders</a></li>
                    <li class="nav-item"><a class="nav-link " href="help.php">Help</a></li>
                    <li class="nav-item"><a class="nav-link " href="Logout.php">Logout</a></li>
                </ul>
                <a href="login.php" class="btn btn-link text-decoration-none text-light px-1 px-sm-2">👤 Account</a>
                <button class="btn btn-link text-decoration-none text-light position-relative px-1 px-sm-2"
                    onclick="toggleCart()">
                    🛒 <span class="d-none d-sm-inline">Cart</span>
                </button>
            </div>
        </div>
    </nav>
    <!-- cart html -->
   <div class="drawer-overlay" id="cartOverlay" onclick="toggleCart()"></div>

<div class="drawer" id="cartDrawer">
    <div class="drawer-header">
        <h3 class="drawer-title mb-0">Your Cart</h3>
        <button style="background:none; border:none; font-size:20px;" onclick="toggleCart()">✕</button>
    </div>
    
    <div class="drawer-body">
        <?php
        $amount = 0;
        if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $cartitems) {
                $total = $cartitems['pprice'] * $cartitems['pqty'];
                $amount += $total;
                ?>
                <div class="cart-item">
                    <div class="cart-item-img"><img src="../admin-pannel/img/<?php echo $cartitems['pimg'] ?>" class="w-100 h-100" style="object-fit: cover;" alt=""></div>
                    <div>
                        <h6 class="mb-0" style="font-size:15px; font-weight:600;"><?php echo $cartitems['pname'] ?></h6>
                        <small class="text-muted"><?php echo $cartitems['pqty'] ?> x PKR <?php echo $cartitems['pprice'] ?></small>
                    </div>
                    <a href="?dlt=<?php echo $cartitems['pid']; ?>" class="delete-item">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="3 6 5 6 21 6"></polyline>
                            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                        </svg>
                    </a>
                </div>
            <?php } 
        } ?>
    </div>
    
    <div class="drawer-footer">
        <div class="d-flex justify-content-between mb-3 small">
            <span class="text-muted">Total</span>
            <span style="font-family: 'JetBrains Mono', monospace; font-weight:600;">PKR <?php echo $amount ?></span>
        </div>
        <?php if(isset($_SESSION['userid'])){ ?>

        <a class="btn btn-primary w-100" href="checkout.php" style="background-color: #2D1B2E;">Checkout</a>
        <?php } else{ ?>
          <a class="btn btn-primary w-100" href="login.php" style="background-color: #2D1B2E;">Checkout</a>
         <?php }  ?>
    </div>
</div>