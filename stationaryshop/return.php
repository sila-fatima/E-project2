
<?php
    include('navbar.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="refund.css">
    <title>Arts</title>
</head>
<body>
<!-- Refund Section Start -->
    <div class="container-fluid py-5">
        <div class="container">

            <!-- Page Heading -->
 <div class="text-center mb-5">
                <h1 class="display-4 fw-bold">Refund Request</h1>
                <p>
                    Fill out the form below to request a refund for your order.
                    Our support team will review your request and contact you shortly.
                </p>
            </div>

            <div class="row">

                <!-- ===========================
                    LEFT SIDE FORM
            ============================ -->


                <div class="col-lg-7 mb-4">
                    <form method="POST">

                        <div class="refund-card">
                            <?php
                            if (isset($_GET['Returnid'])) {
                                $returnid = $_GET['Returnid'];
                                $autofill_query = mysqli_query($con, "SELECT * FROM `orders` WHERE Order_id =$returnid");
                                $autofill = mysqli_fetch_assoc($autofill_query);
                            } ?>

                            <form action="" method="POST">
                                <input type="hidden" name="id" value="<?php echo $autofill['userID']?>">

                                <!-- Customer Name -->
                                <div class="mb-4">
                                    <label class="form-label">
                                        Customer Name
                                    </label>

                                    <input
                                        type="text"
                                        class="form-control"
                                        name="name"
                                        readonly
                                        value="<?php echo $autofill['Customer']; ?>"
                                        placeholder="Enter your full name">
                                </div>

                                <!-- Order ID -->
                                <div class="mb-4">
                                    <label class="form-label">
                                        Order ID
                                    </label>

                                    <input
                                        type="text"
                                        class="form-control"
                                        name="order_id"
                                        readonly
                                        value="<?php echo $autofill['Order_id']; ?>"
                                        placeholder="Enter your Order ID">
                                </div>

                                <!-- Return Reason -->
                                <div class="mb-4">

                                    <label class="form-label">
                                        Return Reason
                                    </label>

                                    <textarea
                                        class="form-control"
                                        rows="5"
                                        name="return_reason"
                                        placeholder="Describe the reason for returning your order"></textarea>

                                </div>

                                <!-- Refund Type -->
                                <div class="mb-4">
                                    <label class="form-label">Refund Type</label>
                                    <select class="form-select" name="return_type" id="refundTypeSelect" required>
                                        <option selected disabled>Select Refund Type</option>
                                        <option value="Replace">Replace</option>
                                        <option value="Refund">Refund</option>
                                    </select>
                                </div>

                                <div class="mb-4" id="accountNumberBlock" style="display: none;">
                                    <label class="form-label fw-bold" style="color: #0d6efd;">Account / Card Number for Refund</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        name="account_no"
                                        id="refundAccountInput"
                                        placeholder="Enter your Bank Account or Card Number">
                                </div>

                                <hr>
                                <h4 class="mb-3">
                                    Return Method
                                </h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="return-option">
                                            <input
                                                type="radio"
                                                name="return_method"
                                                value="DropOff"
                                                required>
                                            <strong>Drop Off</strong>
                                            <p>
                                                I will deliver my parcel
                                                to the courier office.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="return-option">
                                            <input
                                                type="radio"
                                                name="return_method"
                                                value="Pickup"
                                                required>
                                            <strong>Pickup</strong>
                                            <p>
                                                Courier will collect
                                                the parcel from Your address.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-5">
                                    <button class="btn btn-primary" type="submit" name="Returnbtn">
                                        Submit Refund Request
                                    </button>
                                </div>
                            </form>
                        </div>
                </div>
                <div class="col-lg-5">
                    <div class="refund-info">
                        <img src="refund.png" class="img-fluid mb-4" alt="Refund">
                        <h2>
                            We're Here To Help
                        </h2>
                        <p>
                            Not satisfied with your order?
                            No worries!
                            Submit your refund request
                            and our team will review it
                            as quickly as possible.
                        </p>
                        <hr>
                        <div class="refund-features">
                            <div class="mb-3">
                                <h5>Easy & Hassle-Free</h5>
                                <p>
                                    Quick and simple refund process.
                                </p>
                            </div>
                            <div class="mb-3">
                                <h5>Fast Response</h5>
                                <p>
                                    Most refund requests are reviewed
                                    within 24–48 hours.
                                </p>
                            </div>
                            <div class="mb-3">
                                <h5>Safe & Secure</h5>
                                <p>
                                    Your personal information
                                    remains protected.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Refund Section End -->

    <script src="refund.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const refundTypeSelect = document.getElementById("refundTypeSelect");
            const accountNumberBlock = document.getElementById("accountNumberBlock");
            const refundAccountInput = document.getElementById("refundAccountInput");

            if (refundTypeSelect && accountNumberBlock) {
                refundTypeSelect.addEventListener("change", function() {
                    if (this.value === "Refund") {
                        // Show the field smooth or instant
                        accountNumberBlock.style.display = "block";
                        // Make it required so they can't submit empty fields
                        refundAccountInput.setAttribute("required", "required");
                    } else {
                        // Hide it if they switch back to Replace/Repair
                        accountNumberBlock.style.display = "none";
                        refundAccountInput.removeAttribute("required");
                        refundAccountInput.value = ""; // Clear out input data
                    }
                });
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php
    include('footer.php');
    ?>
</body>

</html>
<?php 
if (isset($_POST['Returnbtn'])) {
$name=$_POST['name'];
$userid=$_POST['id'];
$OrderID=$_POST['order_id'];
$return_reason=$_POST['return_reason'];
$return_type=$_POST['return_type'];
$return_method=$_POST['return_method'];
$accounNO=$_POST['account_no'];
if($return_type=='Replace'){
    $insert_query=mysqli_query($con,"INSERT INTO `return`(`name`, `Order_id`, `Return_methode`, `Return_type`, `Return_reason`,`status,`userID`) VALUES ('$name','$OrderID','$return_method','$return_type','$return_reason','$userid')");

}else{  $insert_query=mysqli_query($con,"INSERT INTO `return`(`name`, `Order_id`, `Return_methode`, `Return_type`, `Return_reason`, `AccountNO`, `status`,`userID`) VALUES ('$name','$OrderID','$return_method','$return_type','$return_reason','$accounNO','Return Application Received','$userid')");}
if($insert_query){
    mysqli_query($con,"UPDATE `orders` SET `status`='Return' WHERE Order_id =$OrderID");
    echo "<script>Swal.fire({icon: 'success',title: 'Success!',text: 'Your return Application has been submitted successfully.'}).then(() => { window.location='index.php'; });</script>";
    
}
} ?>