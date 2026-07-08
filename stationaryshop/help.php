<?php
include('navbar.php');
include('../admin-pannel/connection.php');
?>
<div class="container">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Hero Text Section -->
    <div class="text-center mb-5">
        <h1 class="hero-title mt-5">Answers, no hold music.</h1>
        <p class="hero-subtitle">Need a hand with your shipment? We are here to help.</p>
    </div>

    <div class="row g-5 mb-5 mt-5">

        <!-- Left Side Column: Accordion FAQ Dropdowns -->
        <div class="col-lg-6">
            <h3 class="gold-title mb-4" style="color: #C9A35D;">Frequently Asked Questions</h3>

            <div class="accordion" id="faqAccordion">

                <!-- Question 1 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne">
                            Where is my order?
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            You can trace your orders in real-time by navigating to our 'Track Order' portal at the top
                            right. Simply enter your unique order numbers and get the information .
                        </div>
                    </div>
                </div>

                <!-- Question 2 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseTwo">
                            What's your return policy?
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            We offer a hassle-free 7-day return window on all items. Items must stay sealed in original
                            wrapping for full credit returns.
                        </div>
                    </div>
                </div>

                <!-- Question 3 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseThree">
                            How Can We Return parcel?
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            navigate to order button in the website go to delivered option and click return then you
                            need to fill return form and submit it
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseThree">
                            Can We cancel our order before receiving it?
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            you can cancel your order if your order has not been dispatched if it is dispatched then you
                            need to wait until you get the parcel and then you can return it
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseThree">
                            Does electric item you are selling have any warranty?
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            we have provided warranty for all the electronics which have warranty given by the company
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseThree">
                            What is your return procedure?
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            once the return request is submitted and the parcel reach warehouse it undergoes a
                            qualitycheck if the parcel is not damage and return request is correct then we return the
                            amount back else the parcel is delivered to you witin 7 working days
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseThree">
                            In how many days we can receive our parcel?
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            It depends on your location but mostly order is delivered within 7 days
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseThree">
                            Do you offer return parcel pickup option?
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            In your return form you have two option pickup and drop off if you have choosen pickup then
                            we surely offer a pickup service
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseThree">
                            If we bought multiple product how to return only one?
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            In the message boxs you can write how many products you want to return if you dont want to
                            return all of them
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseThree">
                            Where to drop off the parcel?
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            You can drop off the parcel on the nearest inkwell warehouse
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseThree">
                            Is return free?
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            yeah returning your parcel is also free
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseThree">
                            Is there a way that we can pay for our parcel on delivery by card ?
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Yes by choosing VVR payment option you can pay by card at the time of delivery
                        </div>
                    </div>
                </div>









            </div>
        </div>

        <!-- Right Side Column: Messaging Form and Location Cards -->
        <div class="col-lg-6">


            <!-- Send message Form Card -->
            <div class="custom-card mb-4">
                <h4 class="gold-title mb-4">Send us a Message</h4>
                <form method="POST">
                    <?php
                    if(isset($_SESSION['userid'])){
                        $userid=$_SESSION['userid'];
                    $autofillquery=mysqli_query($con,"SELECT * FROM `users` WHERE id =$userid");
                    $autofill=mysqli_fetch_assoc($autofillquery);
                    }?>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="mb-1">Full Name</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $autofill['username']; ?>" placeholder="Jane Doe" readonly>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="mb-1">Email Address</label>
                            <input type="email" name="email" class="form-control" value="<?php echo $autofill['email']; ?>" placeholder="jane@example.com"
                                readonly>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="mb-1">Message Body</label>
                        <textarea class="form-control" name="message" rows="4" placeholder="What can we help you solve?"
                            required></textarea>
                    </div>
                    <button name="submit" type="submit" class="btn btn-submit">Submit Inquiry</button>
                </form>
            </div>


            <?php
            if (isset($_POST['submit']) && $_SESSION['userid']) {
                $name = $_POST['name'];
                $email = $_POST["email"];
                $message = $_POST["message"];
                $query = "INSERT INTO faq (name,email,message)values('$name','$email','$message')";
                $result = mysqli_query($con, $query);
                if ($result) {

                    echo "<script>Swal.fire({icon: 'success',title: 'Success!',text: 'Your inquiry has been submitted successfully.'}).then(() => { window.location='help.php'; });</script>";
                } else { echo " <script>Swal.fire({icon: 'error',title: 'Error!', text: 'Something went wrong.'}); </script>";
                }
            }




            ?>

            <!-- Sub-cards layout (Contact details & Maps) -->


            <!-- Map Box Frame -->
            <div class="ratio ratio-21x9 border rounded overflow-hidden" style="border-color: #2d2137 !important;">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.142293465043!2d-73.98731968459364!3d40.75889497932681!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25855c6480293%3A0x511747070259ad43!2sTimes%20Square!5e0!3m2!1sen!2sus!4v1647447442345!5m2!1sen!2sus"
                    allowfullscreen></iframe>
            </div>
            <div class="row g-3 mb-3 mt-3">
                <div class="col-md-6">
                    <div class="small-card h-100 contact-icon-text">
                        <h5 class="gold-title small fw-bold mb-2" style="color: #C9A35D;"><i
                                class="fa-solid fa-location-dot me-2"></i> Store Location</h5>
                        <p class="small  mb-0" style="color: #FBF6EF;">101 plot , xyz road,korangi ,<br>Karachi,Pakistan
                        </p>
                    </div>
                </div>
                <div class="col-md-6 ">
                    <div class="small-card h-100 contact-icon-text">
                        <h6 class="gold-title small fw-bold mb-2" style="color: #C9A35D;"><i
                                class="fa-solid fa-phone me-2"></i>Quick Connect Contacts</h6>
                        <p class="small mb-0">
                            Email: <a href="mailto:hello@inkwell.com"
                                class="contact-link text-decoration-none text-reset">hello@inkwell.com</a><br>
                            Phone: <span class="contact-link">+1 (555) 010-2231</span>
                        </p>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
<?php include('footer.php'); ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>