<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>EShopper - Bootstrap Shop Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>
<style> .main-content {
            flex: 1;
            padding-top: 90px;
            padding-bottom: 60px;
          
        }

        .help-banner {
            background: linear-gradient(135deg, #fcc9d4 0%, #fde1ed 100%);
            padding: 40px;
            border-radius: 10px;
            margin-bottom: 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .help-banner-content h2 {
            font-size: 42px;
            margin-bottom: 10px;
        }

        .help-banner-content .subtitle {
            color: #666;
            font-size: 16px;
        }

        .help-banner-content .label {
            color: #d47b8f;
            font-size: 12px;
            font-weight: 600;
            margin-bottom: 10px;
            letter-spacing: 1px;
        }

        .help-banner-icon {
            font-size: 120px;
            text-align: right;
        }

        .faq-section {
            margin-bottom: 20px;
        }

        .faq-item {
            background-color: #fff;
            margin-bottom: 15px;
            border-radius: 5px;
            overflow: hidden;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }

        .faq-question {
            padding: 20px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 15px;
            background-color: #fff;
        }

        .faq-question:hover {
            background-color: #f9f9f9;
        }

        .faq-number {
            background-color: #dda9a9;
            color: white;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            flex-shrink: 0;
        }

        .faq-text {
            flex: 1;
            font-weight: 500;
            color: #333;
        }

        .faq-toggle {
            color: #dda9a9;
            font-size: 20px;
            transition: transform 0.3s;
        }

        .faq-answer {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease;
            background-color: #fafafa;
        }

        .faq-answer.active {
            max-height: 300px;
        }

        .faq-answer-content {
            padding: 20px;
            color: #666;
            font-size: 14px;
            line-height: 1.6;
        }

        .faq-item.active .faq-toggle {
            transform: rotate(180deg);
        }
</style>
<body >
    <!-- Topbar Start -->
   
    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
           <div class="main-content">
            <!-- Help Banner -->
            <div class="help-banner">
                <div class="help-banner-content">
                    <div class="label">HELP CENTER</div>
                    <h2>Frequently Asked <span style="color: #d47b8f;">Questions</span></h2>
                    <p class="subtitle">Find quick answers to the most common questions about shopping with Giftory.</p>
                </div>
                <div class="help-banner-icon">❓💬</div>
            </div>

            <!-- FAQ Items -->
            <div class="faq-section">
                <div class="faq-item active">
                    <div class="faq-question" onclick="toggleFAQ(this)">
                        <div class="faq-number">1</div>
                        <div class="faq-text">How can I place an order on Giftory?</div>
                        <div class="faq-toggle">▼</div>
                    </div>
                    <div class="faq-answer active">
                        <div class="faq-answer-content">
                            Simply browse our collection, add your favorite gifts to the cart, and proceed to checkout. Fill in your details, choose a payment method, and your order will be confirmed.
                        </div>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFAQ(this)">
                        <div class="faq-number">2</div>
                        <div class="faq-text">What payment methods do you accept?</div>
                        <div class="faq-toggle">▼</div>
                    </div>
                    <div class="faq-answer">
                        <div class="faq-answer-content">
                            We accept all major credit cards, debit cards, digital wallets, and bank transfers. All transactions are processed securely through our encrypted payment gateway.
                        </div>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFAQ(this)">
                        <div class="faq-number">3</div>
                        <div class="faq-text">How can I track my order?</div>
                        <div class="faq-toggle">▼</div>
                    </div>
                    <div class="faq-answer">
                        <div class="faq-answer-content">
                            You can track Your orders on our order page
                        </div>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFAQ(this)">
                        <div class="faq-number">4</div>
                        <div class="faq-text">Do you offer gift wrapping?</div>
                        <div class="faq-toggle">▼</div>
                    </div>
                    <div class="faq-answer">
                        <div class="faq-answer-content">
                            Yes! We offer complimentary gift wrapping on all orders. You can select your preferred wrapping style during checkout and add a personalized message card if desired.
                        </div>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFAQ(this)">
                        <div class="faq-number">5</div>
                        <div class="faq-text">What is your return & refund policy?</div>
                        <div class="faq-toggle">▼</div>
                    </div>
                    <div class="faq-answer">
                        <div class="faq-answer-content">
                            We offer a 7-day return policy. Items can be returned in original condition with original packaging. Refunds are processed within 5-7 business days of receiving the returned item.
                        </div>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFAQ(this)">
                        <div class="faq-number">6</div>
                        <div class="faq-text">How can I contact customer support?</div>
                        <div class="faq-toggle">▼</div>
                    </div>
                    <div class="faq-answer">
                        <div class="faq-answer-content">
                            You can reach our customer support team via email at support@giftory.com, phone at 1-800-GIFTORY, or You can just leave a message on our help page .
                        </div>
                    </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 15px">

        </div>
    </div>
    <!-- Page Header End -->


    <!-- Contact Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Contact For Any Queries</span></h2>
        </div>
        <div class="row px-xl-5">
            <div class="col-lg-7 mb-5">
                <div class="contact-form">
                    <div id="success"></div>
                    <form name="sentMessage" id="contactForm" novalidate="novalidate">
                        <div class="control-group">
                            <input type="text" class="form-control" id="name" placeholder="Your Name"
                                required="required" data-validation-required-message="Please enter your name" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="email" class="form-control" id="email" placeholder="Your Email"
                                required="required" data-validation-required-message="Please enter your email" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="text" class="form-control" id="subject" placeholder="Subject"
                                required="required" data-validation-required-message="Please enter a subject" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <textarea class="form-control" rows="6" id="message" placeholder="Message"
                                required="required"
                                data-validation-required-message="Please enter your message"></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                        <div>
                            <button class="btn btn-primary py-2 px-4" type="submit" id="sendMessageButton">Send
                                Message</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-5 mb-5">
                <h5 class="font-weight-semi-bold mb-3">Get In Touch</h5>
                <p>Justo sed diam ut sed amet duo amet lorem amet stet sea ipsum, sed duo amet et. Est elitr dolor elitr erat sit sit. Dolor diam et erat clita ipsum justo sed.</p>
                <div class="d-flex flex-column mb-3">
                    <h5 class="font-weight-semi-bold mb-3">Store 1</h5>
                    <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>123 Street, New York, USA</p>
                    <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>info@example.com</p>
                    <p class="mb-2"><i class="fa fa-phone-alt text-primary mr-3"></i>+012 345 67890</p>
                </div>
                <div class="d-flex flex-column">
                    <h5 class="font-weight-semi-bold mb-3">Store 2</h5>
                    <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>123 Street, New York, USA</p>
                    <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>info@example.com</p>
                    <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+012 345 67890</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->


    <!-- Footer Start -->
    
    <?php include('footer.php'); ?>

    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <script>
    function toggleFAQ(element) {
        // Get the parent .faq-item of the clicked question header
        const faqItem = element.parentElement;
        // Find the internal .faq-answer container
        const faqAnswer = faqItem.querySelector('.faq-answer');
        
        // Check if this item is already active
        const isActive = faqItem.classList.contains('active');
        
        // OPTIONAL: Close any other open FAQ items first (Accordion behavior)
        document.querySelectorAll('.faq-item').forEach(item => {
            item.classList.remove('active');
            item.querySelector('.faq-answer').classList.remove('active');
        });
        
        // If the clicked item wasn't active, open it
        if (!isActive) {
            faqItem.classList.add('active');
            faqAnswer.classList.add('active');
        }
    }
    </script>
</body>

</html>