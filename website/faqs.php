

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ - Giftory</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f8f8;
            color: #333;
        }

        /* Header */
        .header-top {
            background-color: #fff;
            padding: 10px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 13px;
            border-bottom: 1px solid #eee;
        }

        .header-top-left {
            display: flex;
            gap: 20px;
        }

        .header-top-right {
            display: flex;
            gap: 20px;
        }

        .header-top a {
            color: #333;
            text-decoration: none;
        }

        /* Main Header */
        .main-header {
            background-color: #fff;
            padding: 20px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #eee;
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
            color: #c4896b;
        }

        .search-bar {
            flex: 1;
            max-width: 400px;
            margin: 0 40px;
        }

        .search-bar input {
            width: 100%;
            padding: 10px 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
        }

        .header-icons {
            display: flex;
            gap: 20px;
            align-items: center;
        }

        .heart-icon, .cart-icon {
            cursor: pointer;
            position: relative;
        }

        .heart-icon::after, .cart-icon::after {
            content: '0';
            position: absolute;
            top: -8px;
            right: -8px;
            background-color: #d47b8f;
            color: white;
            border-radius: 50%;
            width: 18px;
            height: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
        }

        /* Navigation */
        .nav {
            background-color: #fff;
            padding: 0 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #eee;
        }

        .nav-links {
            display: flex;
            gap: 30px;
            flex: 1;
        }

        .nav-links a {
            padding: 15px 0;
            color: #333;
            text-decoration: none;
            font-size: 14px;
            border-bottom: 2px solid transparent;
        }

        .nav-links a.active {
            color: #d47b8f;
            border-bottom-color: #d47b8f;
        }

        .auth-links {
            display: flex;
            gap: 20px;
            font-size: 14px;
        }

        .auth-links a {
            color: #333;
            text-decoration: none;
        }

        /* Main Container */
        .container {
            display: flex;
            max-width: 1400px;
            margin: 0 auto;
            gap: 20px;
            padding: 30px 40px;
        }

        /* Sidebar */
        .sidebar {
            width: 250px;
        }

        .categories-section {
            background-color: #dda9a9;
            border-radius: 5px;
            overflow: hidden;
        }

        .categories-header {
            padding: 15px;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .categories-list {
            background-color: #fff;
            padding: 10px;
        }

        .categories-list a {
            display: block;
            padding: 10px 15px;
            color: #333;
            text-decoration: none;
            font-size: 14px;
        }

        .categories-list a:hover {
            background-color: #f5f5f5;
        }

        .help-widget {
            background-color: #f5f5f5;
            padding: 20px;
            border-radius: 5px;
            margin-top: 20px;
            text-align: center;
        }

        .help-widget-icon {
            font-size: 24px;
            color: #d47b8f;
            margin-bottom: 10px;
        }

        .help-widget h3 {
            color: #d47b8f;
            font-size: 16px;
            margin-bottom: 10px;
        }

        .help-widget p {
            font-size: 13px;
            color: #666;
            margin-bottom: 15px;
        }

        .contact-btn {
            background-color: #dda9a9;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            width: 100%;
        }

        .help-features {
            margin-top: 15px;
            font-size: 13px;
            color: #666;
        }

        .help-features div {
            padding: 8px 0;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        /* Main Content */
        .main-content {
            flex: 1;
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

        /* Footer */
        .footer {
            background-color: #fff;
            padding: 40px;
            margin-top: 40px;
            border-top: 1px solid #eee;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 30px;
            max-width: 1400px;
            margin: 0 auto;
        }

        .footer-item {
            display: flex;
            align-items: center;
            gap: 15px;
            text-align: center;
        }

        .footer-icon {
            background-color: #d47b8f;
            color: white;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 30px;
            flex-shrink: 0;
        }

        .footer-item h3 {
            font-size: 16px;
            margin-bottom: 5px;
        }

        .footer-item p {
            font-size: 13px;
            color: #666;
        }

        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }

            .sidebar {
                width: 100%;
            }

            .footer-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .help-banner {
                flex-direction: column;
                text-align: center;
            }

            .nav-links {
                flex-wrap: wrap;
            }
        }
    </style>
</head>
<body>


    <!-- <div class="header-top">
        <div class="header-top-left">
            <a href="#faq">FAQs</a>
            <a href="#help">Help</a>
            <a href="#support">Support</a>
        </div>
        <div class="header-top-right">
            <a href="#facebook">f</a>
            <a href="#twitter">𝕏</a>
            <a href="#linkedin">in</a>
            <a href="#instagram">📷</a>
            <a href="#youtube">▶</a>
        </div>
    </div>


    <div class="main-header">
        <div class="logo">🎁 Giftory</div>
        <div class="search-bar">
            <input type="text" placeholder="Search for products">
        </div>
        <div class="header-icons">
            <div class="heart-icon">❤️</div>
            <div class="cart-icon">🛒</div>
        </div>
    </div>

    
    <div class="nav">
        <div class="nav-links">
            <a href="#home">Home</a>
            <a href="#shop">Shop</a>
            <a href="#orders">Orders</a>
            <a href="#pages">Pages</a>
            <a href="#contact">Contact</a>
        </div>
        <div class="auth-links">
            <a href="#login">Login</a>
            <a href="#register">Register</a>
        </div>
    </div>

    
    <div class="container">
       
        <div class="sidebar">
            <div class="categories-section">
                <div class="categories-header">
                    Categories <span>▼</span>
                </div>
                <div class="categories-list">
                    <a href="#dresses">Dresses</a>
                    <a href="#shirts">Shirts</a>
                    <a href="#jeans">Jeans</a>
                    <a href="#swimwear">Swimwear</a>
                    <a href="#sleepwear">Sleepwear</a>
                    <a href="#sportswear">Sportswear</a>
                    <a href="#jumpsuits">Jumpsuits</a>
                    <a href="#blazers">Blazers</a>
                    <a href="#jackets">Jackets</a>
                    <a href="#shoes">Shoes</a>
                </div>
            </div> -->

            <div class="help-widget">
                <div class="help-widget-icon">🎧</div>
                <h3>Still Need Help?</h3>
                <p>Can't find the answer you're looking for? Our support team is here for you.</p>
                <button class="contact-btn">📞 Contact Support</button>
                <div class="help-features">
                    <div>⚡ Fast Response</div>
                    <div>😊 Friendly Support</div>
                    <div>🤝 We're Here to Help</div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
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
                            Once your order is shipped, you'll receive a tracking number via email. You can use this number to monitor your package's delivery status on our website or the courier's platform.
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
                            We offer a 30-day return policy. Items can be returned in original condition with original packaging. Refunds are processed within 5-7 business days of receiving the returned item.
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
                            You can reach our customer support team via email at support@giftory.com, phone at 1-800-GIFTORY, or through our live chat feature available on our website 24/7.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <div class="footer-grid">
            <div class="footer-item">
                <div class="footer-icon">🚚</div>
                <div>
                    <h3>Free Shipping</h3>
                    <p>On all orders over $50</p>
                </div>
            </div>
            <div class="footer-item">
                <div class="footer-icon">🎁</div>
                <div>
                    <h3>Quality Gifts</h3>
                    <p>Curated with love & care</p>
                </div>
            </div>
            <div class="footer-item">
                <div class="footer-icon">🔒</div>
                <div>
                    <h3>Secure Payments</h3>
                    <p>100% safe & secure checkout</p>
                </div>
            </div>
            <div class="footer-item">
                <div class="footer-icon">🎧</div>
                <div>
                    <h3>24/7 Support</h3>
                    <p>We're always here to help</p>
                </div>
            </div>
        </div>
    </div>
    

    <script>
        function toggleFAQ(element) {
            const faqItem = element.parentElement;
            const answer = faqItem.querySelector('.faq-answer');
            
            // Close all other FAQs
            document.querySelectorAll('.faq-item').forEach(item => {
                if (item !== faqItem) {
                    item.classList.remove('active');
                    item.querySelector('.faq-answer').classList.remove('active');
                }
            });
            
            // Toggle current FAQ
            faqItem.classList.toggle('active');
            answer.classList.toggle('active');
        }
    </script>

    <?php 
    include("footer.php");
    ?>
</body>
</html>