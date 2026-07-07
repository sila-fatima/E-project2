<?php
include('navbar.php');
?>

<div class="container-lg py-5">
    <!-- search bar -->

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <p class="section-label">Order tracking</p>
            <h2 class="mb-4" style="font-size: 36px;">Where is my package?</h2>

            <div class="mb-5">
                <form method="GET" class="input-group mb-3">
                    <input type="text"
                        name="search"
                        class="form-control"
                        id="orderIdInput"
                        placeholder="Write Your Order Id">
                    <button class="btn btn-warning text-white" type="submit" id="button-addon2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                        </svg>
                        Search
                    </button>
                </form>
<!-- cards -->
                <div class="d-flex gap-2 flex-wrap">
                    <a href="trackorder.php" class="btn btn-outline-warning ">All Orders</a>
                    <a href="?status=To Pay" class="btn btn-outline-warning ">ToPay</a>
                    <a href="?status=Received" class="btn btn-outline-warning ">Received</a>
                    <a href="?status=Dispached" class="btn btn-outline-warning ">Dispached</a>
                    <a href="?status=Delivered" class="btn btn-outline-warning ">Delivered</a>
                    <a href="?status=Reviewed" class="btn btn-outline-warning ">Reviewed</a>
                    <a href="?Rstatus=Return" class="btn btn-outline-warning ">Return</a>
                </div>
            </div>
            
            <?php
            $showReturnCards = false;
            if (isset($_SESSION['userid'])) {
                $userid = $_SESSION['userid'];
                if(isset($_GET['status'])){
                    $status = $_GET['status'];
                    if ($status == 'Dispached' || $status == 'Received'|| $status =="To Pay" || $status =="Reviewed" || $status=="Delivered") {
                        $orderfetch = mysqli_query($con, "SELECT * FROM `orders` WHERE status ='$status' AND userID =$userid");
                    } 
                }elseif(isset($_GET['search'])){
                    $search=$_GET['search'];
                    $orderfetch=mysqli_query($con,"SELECT * FROM `orders` WHERE Order_id ='$search' AND userID =$userid");
                    if(mysqli_num_rows($orderfetch)<=0){
                       echo" <script>alert('Order Not Found')
                       location.assign('trackorder.php')</script>";
                    }
                }
                elseif(isset($_GET['Rstatus'])){
                     $showReturnCards = true;
                    $returnfetch=mysqli_query($con, "SELECT * FROM `return` WHERE  userID =$userid");
                    while($returnorders=mysqli_fetch_assoc($returnfetch)){
                        $state=$returnorders['status'];
                        $application_active = "";
                    $transit_active = "";
                    $quality_active="";
                    $Return_active = "";
                     if ($state == "Return Application Received") {
                        $application_active = "active";
                    } elseif ($state == "Return Item Received") {
                        $application_active = "active";
                        $transit_active = "active";
                    }elseif($state == "Quality Checkup In process"){
                         $application_active = "active";
                        $transit_active = "active";
                        $quality_active="active";
                    } 
                    elseif ($state == "Return issued" || $state =="Return Rejected") {
                        $application_active = "active";
                        $transit_active = "active";
                        $quality_active="active";
                        $Return_active="active";   
                    }?>
                     <div class="order-card mt-4" id="trackingResultBox">
                        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 border-bottom pb-3 mb-4" style="border-color: var(--line) !important;">
                            <div>
                                <h5 class="mb-1"><a href="orderdetail.php?orderid=<?php echo $returnorders['Order_id'];?>" class="text-decoration-none text-reset">OrderID <?php echo $returnorders['Order_id']; ?></a></h5>
                                <p class="small mb-0">Placed on: <?php echo $returnorders['Return_time'] ?></p>
                            </div>
                            <span class="badge" style="background-color: var(--gold); color: var(--plum);"><?php echo $returnorders['status'] ?></span>
                        </div>

                        <div class="status-timeline">
                            <div class="timeline-step <?php echo $application_active; ?>">
                                <div class="step-circle">✓</div>
                                <div class="step-label">Application Received</div>
                            </div>
                            <div class="timeline-step <?php echo $transit_active; ?>">
                                <div class="step-circle">🚚</div>
                                <div class="step-label">Parcel Received</div>
                            </div>
                             <div class="timeline-step <?php echo $quality_active; ?>">
                                <div class="step-circle">✓</div>
                                <div class="step-label">Quality Check Done</div>
                            </div>
                            <div class="timeline-step <?php echo $Return_active; ?>">
                                <div class="step-circle">📦</div>
                                <div class="step-label">
                                    Return Processing Done
                                </div>
                            </div>
                        </div>

                    </div>

                    <?php }}
                
                else {
                    $orderfetch = mysqli_query($con, "SELECT * FROM `orders` WHERE userID =$userid");
                }
                  if (!$showReturnCards && isset($orderfetch)) {

                while ($allorders = mysqli_fetch_assoc($orderfetch)) {
                    $card_status = $allorders['status'];
                    $packed_active = "";
                    $transit_active = "";
                    $delivered_active = "";

                    if ($card_status == "Received") {
                        $packed_active = "active";
                    } elseif ($card_status == "Dispached") {
                        $packed_active = "active";
                        $transit_active = "active";
                    } elseif ($card_status == "Delivered" || $card_status =="Reviewed") {
                        $packed_active = "active";
                        $transit_active = "active";
                        $delivered_active = "active";
                    }
            ?>
                    <div class="order-card mt-4" id="trackingResultBox">
                        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 border-bottom pb-3 mb-4" style="border-color: var(--line) !important;">
                            <div>
                                <h5 class="mb-1"><a href="orderdetail.php?orderid=<?php echo $allorders['Order_id'];?>" class="text-decoration-none text-reset">OrderID <?php echo $allorders['Order_id']; ?></a></h5>
                                <p class="small mb-0">Placed on: <?php echo $allorders['Order_date'] ?></p>
                            </div>
                            <span class="badge" style="background-color: var(--gold); color: var(--plum);"><?php echo $allorders['status'] ?></span>
                        </div>

                        <div class="status-timeline">
                            <div class="timeline-step <?php echo $packed_active; ?>">
                                <div class="step-circle">✓</div>
                                <div class="step-label">Packed</div>
                            </div>
                            <div class="timeline-step <?php echo $transit_active; ?>">
                                <div class="step-circle">🚚</div>
                                <div class="step-label">Dispached</div>
                            </div>
                            <div class="timeline-step <?php echo $delivered_active; ?>">
                                <div class="step-circle">📦</div>
                                <div class="step-label">Delivered</div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end mt-4">
                            <?php if ($card_status == 'To Pay') { ?>
                                <a href="?cancelid=<?php echo $allorders['Order_id']; ?>" class="btn btn-outline-light" style=" background-color:#E8634A;">
                                    Cancel
                                </a>
                                <button type="button" 
                                        class="ms-3 btn btn-outline-light" 
                                        style="background-color:#E8634A;"
                                        data-bs-toggle="modal" 
                                        data-bs-target="#payModal_<?php echo $allorders['Order_id']; ?>">
                                    Pay
                                </button>
                            <?php } elseif ($card_status == 'Delivered') { 
                                            $deliveryDate = strtotime($allorders['Order_date']);
                                            $currentDate = strtotime(date('Y-m-d'));
                                            $daysPassed = ($currentDate - $deliveryDate) / (60 * 60 * 24);
                                            if ($daysPassed <= 7) {
                                ?>
                                <a href="return.php?Returnid=<?php echo $allorders['Order_id']; ?>" class="btn btn-outline-light" style=" background-color:#E8634A;">
                                    Return
                                </a>
                                <?php }?>
                                <button type="button" 
                                        class="ms-3 btn btn-outline-light" 
                                        style="background-color:#E8634A;" 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#reviewModal_<?php echo $allorders['Order_id']; ?>">
                                    Review
                                </button>
                            <?php } ?>
                        </div>
                    </div>
<!-- payment model -->
                    <div class="modal fade" id="payModal_<?php echo $allorders['Order_id']; ?>" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Complete Payment for Order #<?php echo $allorders['Order_id']; ?></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="" method="POST">
                                    <div class="modal-body text-start">
                                        <div class="mb-3">
                                            <label class="form-label">Order ID</label>
                                            <input type="text" name="order_id" class="form-control" value="<?php echo $allorders['Order_id']; ?>" readonly required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Card Number</label>
                                            <input type="text" name="card_no" class="form-control" placeholder="1234 5678 9101 1121" maxlength="19" required>
                                        </div>
                                        <div class="row">
                                            <div class="col-6 mb-3">
                                                <label class="form-label">Expiry Date</label>
                                                <input type="text" name="expiry_date" class="form-control" placeholder="MM/YY" maxlength="5" required>
                                            </div>
                                            <div class="col-6 mb-3">
                                                <label class="form-label">CVC</label>
                                                <input type="password" name="cvc" class="form-control" placeholder="123" maxlength="3" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" name="submit_payment" class="btn text-white" style="background-color:#E8634A;">Process Payment</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- paying query -->
                     <?php 
                     if(isset($_POST['submit_payment'])){
                        $order_id=$_POST['order_id'];
                        $cardNO=$_POST['card_no'];
                        $status='Received';
                        $Payment_query=mysqli_query($con,"UPDATE `orders` SET `Card_no`='$cardNO',`status`='$status' WHERE Order_id='$order_id'");
                        if($Payment_query){
                            echo "<script>
                            alert('You have Succesfully Paid For The Order')
                            location.assign('trackorder.php')</script>";
                        }
                        else{  echo "<script>alert('Something went wrong')</script>";}
                     } ?>
                    <!-- review Model -->

                    <div class="modal fade" id="reviewModal_<?php echo $allorders['Order_id']; ?>" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Submit Review for your Order</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="" method="POST">
                                    <div class="modal-body text-start">
                                        <div class="mb-3">
                                            <label class="form-label">Order ID</label>
                                            <input type="text" name="order_id" class="form-control" value="<?php echo $allorders['Order_id']; ?>" readonly required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Name</label>
                                            <input type="text" value="<?php echo $allorders['Customer']?>" name="name" class="form-control" placeholder="Your Name" readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Email address</label>
                                            <input type="email" value="<?php echo $allorders['email']?>" name="email" class="form-control" placeholder="name@example.com" readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Review Message</label>
                                            <textarea name="review_message" class="form-control" rows="4" placeholder="Write your review here..." required></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" name="review_btn" class="btn text-white" style="background-color:#E8634A;">Submit Review</button>
                                    </div>
                                </form>
                            </div>
                            <!-- review query -->
                             <?php
                             if(isset($_POST['review_btn'])){
                                $name=$_POST['name'];
                                $order_id=$_POST['order_id'];
                                $email=$_POST['email'];
                                $review=$_POST['review_message'];
                                $review_query=mysqli_query($con,"INSERT INTO `review`(`name`, `email`, `order_id`, `Review_message`) VALUES ('$name','$email','$order_id','$review')");
                                if($review_query){
                                    mysqli_query($con,"UPDATE `orders` SET `status`='Reviewed' WHERE Order_id='$order_id'");
                                      echo "<script>alert('Review Submitted Sucessfully')
                                      location.assign('trackorder.php')</script>";


                                }
                                else{  echo "<script>alert('Something went Wrong')</script>";}

                             }
                             ?>
                        </div>
                    </div>

            <?php 
                } // End while loop
            }}
            ?>

        </div>
    </div>
</div>

<?php include('footer.php'); ?>
</body>
<!-- canclation work -->
<?php
if(isset($_GET['cancelid'])){
    $cancelid=$_GET['cancelid'];
    $delete_query=mysqli_query($con,"DELETE FROM `orders` WHERE Order_id =$cancelid");
    if($delete_query){
        echo "<script>alert('Order Is cancelled')
        location.assign('trackorder.php')</script>";
    }
}
?>

 
</html>