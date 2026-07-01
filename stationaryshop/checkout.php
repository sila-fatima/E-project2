<?php
session_start();
include('../admin-pannel/connection.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure Checkout - Inkwell</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,400;9..144,500;9..144,600&family=Space+Grotesk:wght@400;500;700&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">

</head>

<body>

    <div class="container-lg py-5">
        <div class="mb-5">
            <a href="index.php" class="text-light text-decoration-none">← Back to shop</a>
            <h2 class="mt-2" style="font-size: 34px;">Checkout</h2>
        </div>

        <div class="row g-4">
            <div class="col-lg-8">
                <form method="post">
                    <!-- fetch user info -->
                    <?php
                    if (isset($_SESSION['userid'])) {
                        $userID = $_SESSION['userid'];
                        $info_query = mysqli_query($con, "SELECT * FROM `users` WHERE Id=$userID");
                        $allinfo = mysqli_fetch_array($info_query);

                    ?>
                        <p class="section-label">Shipping Details</p>
                        <div class="row mb-3">
                            <div class="col-md-6"><label class="form-label">Full Name</label><input type="text" class="form-control" name="name" value="<?php echo $allinfo[1] ?>" required></div>
                            <div class="col-md-6"><label class="form-label">EMAIL</label><input type="tel" name="email" value="<?php echo $allinfo[2] ?>" class="form-control" required></div>
                        </div>
                        <div class="mb-3"><label class="form-label">Street Address</label><input type="text" name="address" class="form-control" required></div>
                        <div class="mb-3"><label class="form-label">PHONE Number</label><input type="text" name="phone" value="<?php echo $allinfo[2] ?>" class="form-control" required></div>
                    <?php } ?>


                    <p class="section-label">Payment Method</p>
                    <div class="mb-4">
                        <div class="payment-option-card"><input class="form-check-input" type="radio" value="2" name="payment" id="cod"  onclick="togglePaymentFields()"> <label for="cod">Cash on Delivery (COD)</label></div>
                        <div class="payment-option-card"><input class="form-check-input" type="radio" value="1" name="payment" id="vvr" onclick="togglePaymentFields()"> <label for="vvr">VVR</label></div>
                        <div class="payment-option-card"><input class="form-check-input" type="radio" value="3" name="payment" id="bank"  onclick="togglePaymentFields()"> <label for="bank">Online Bank Transfer</label></div>

                        <div id="payment-details" class="d-none mb-4">
                            <p class="section-label">Enter Bank Details</p>
                            <div class="mb-3">
                                <label class="form-label">Card Number</label>
                                <input type="text" name="cardno" class="form-control" placeholder="4242 4242 4242 4242">
                            </div>
                            <div class="row">
                                <div class="col-md-6"><label class="form-label">Expiry Date</label><input type="text" class="form-control" placeholder="MM/YY"></div>
                                <div class="col-md-6"><label class="form-label">CVC</label><input type="text" class="form-control" placeholder="123"></div>
                            </div>
                        </div>
                    </div>
            </div>

            <div class="col-lg-4" style="margin-top: 60px;">
                <div class="summary-box">
                    <h4 style="font-size: 20px;" class="mb-4">Order Summary</h4>
                    <?php
                    $amount = 0;
                    if (isset($_SESSION['cart'])) {
                        foreach ($_SESSION['cart'] as $cartitems) {
                            $total = $cartitems['pprice'] * $cartitems['pqty'];
                            $amount += $total;
                    ?>
                            <div class="d-flex justify-content-between mb-2 pb-2 border-bottom border-secondary small">
                                <span style="font-size: 20px;"><?php echo $cartitems['pname'] ?> x<?php echo $cartitems['pqty'] ?></span>
                                <span style="font-family: 'JetBrains Mono';font-size: 20px;"> PKR <?php echo $cartitems['pprice'] ?></span>
                            </div>
                    <?php }
                    } ?>
                    <div class="d-flex justify-content-between mb-2 pb-2 border-bottom border-secondary small">
                        <span style="font-size: 20px;">Total</span>
                        <span style="font-family: 'JetBrains Mono';font-size: 20px;"> PKR <?php echo $amount ?></span>
                    </div>

                </div>
                <button type="submit" name="order" class="btn btn-primary w-100 mt-3" style="background-color: #E8634A;">
                    Confirm Order
                </button>
            </form>

            </div>
        </div>
    </div>

    <script>
        function togglePaymentFields() {
            const bankSelected = document.getElementById('bank').checked;
            const paymentDetails = document.getElementById('payment-details')
            if (bankSelected) {
                paymentDetails.classList.remove('d-none');
            } else {
                paymentDetails.classList.add('d-none');
            }
        }
    </script>

</body>

</html>
<?php
if (isset($_SESSION['cart']) && isset($_POST['order'])) {
    $paymentId = $_POST['payment'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $cardNo = $_POST['cardno'];
    $productid = $_SESSION['cart'][0]['pid7'];
    if ($paymentId == 1 || $paymentId == 2) {
        $status = 'Received';
    } elseif ($paymentId == 3 && $cardNo == "") {
        $status = 'To Pay';
    } else {
        $status = "received";
    }
    $total = 0;
    foreach ($_SESSION['cart'] as $cartitems) {
        $total += $cartitems['pprice'] * $cartitems['pqty'];
    }
    $insert_query = mysqli_query($con, "INSERT INTO `orders`(`payment_id`, `product_id`, `Customer`, `email`, `Card_no`, `Address`, `phone_number`, `Total amount`, `status`) VALUES ('$paymentId','$productid','$name','$email','$cardNo','$address','$phone','$total','$status')");
    $insertID = mysqli_insert_id($con);
    $orderIdfetch_query = mysqli_query($con, "SELECT * FROM `orders` WHERE id=$insertID");
    $row = mysqli_fetch_array($orderIdfetch_query);
    $orderid = $row[3];
    foreach ($_SESSION['cart'] as $cartitems) {
        $proId = $cartitems['pid7'];
        $proname = $cartitems['pname'];
        $proqty = $cartitems['pqty'];
        $orderitem_insert = mysqli_query($con, "INSERT INTO `order_items`(`order_id`,`Customer`, `product_id`, `Product_name`, `quantity`) VALUES ('$orderid','$name','$proId','$proname','$proqty')");
    }
    if ($insert_query && $orderitem_insert) {
        echo "<script> alert('Order Placed Sucessfully');
  location.assign('index.php');
 </script>";
        unset($_SESSION['cart']);
    }
}
?>