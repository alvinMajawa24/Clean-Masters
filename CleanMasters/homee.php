<!-- homee.html -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | The Clean Masters</title>
    <style>
        /* General Styles */
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap');

        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
            color: #333;
            background-image: url('https://images.unsplash.com/photo-1627905646269-7f034dcc5738?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Header Styles */
        header {
    background-color: #008080;
    color: #fff;
    padding: 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    justify-content: center; 
}


        header .logo {
            font-size: 24px;
            font-weight: 700;
        }

        header nav a {
            color: #fff;
            text-decoration: none;
            margin-left: 20px;
            transition: color 0.3s ease;
        }

        header nav a:hover {
            color: #ffd700;
        }

        /* Section Styles */
        section {
            background-color: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 40px;
            transition: transform 0.3s ease;
        }

        section:hover {
            transform: translateY(-5px);
        }

        section h2 {
            color: #008080;
        }

        /* Button Styles */
        .btn {
            display: inline-block;
            background-color: #008080;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #006666;
        }

        #logout {
         margin-left: auto; /* Pushes the logout div to the right */
        }

        #logout a {
            color: #fff;
            text-decoration: none;
            margin-left: 20px;
            transition: color 0.3s ease;
        }

        #logout a:hover {
            color: #ffd700;
        }

        /* Footer Styles */
        footer {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <?php include 'session.php'; ?>
    <header>
        <div class="logo">The Clean Masters</div>
            <?php if (isset($_SESSION['user_name'])) { ?>
            <div id = "welcome" style="margin: 0 auto;">
                <span>Welcome, <?php echo $_SESSION['user_name']; ?></span>
            </div>
               <div  id = "logout">
                 <a href="logout.php">Logout</a>
            </div>
            <?php } else { ?>
                <a href="login.html">Login</a>
                <a href="signup.html">Sign Up</a>
            <?php } ?>
            <nav>
            <a href="abouttus.html">About Us</a>
                <a href="services.html">Services</a>
                <a href="gallery.html">Gallery</a>
                <a href="contact.html">Contact Us</a>
                <a href="faqs.html">FAQs</a>
        </nav>
    </header>

    <div class="container">
        <section>
            <h2>Welcome to Our Cleaning Services:</h2>
            <p>We are a leading cleaning services company dedicated to providing top-notch cleaning solutions to both residential and commercial clients. Our mission is to create clean and healthy environments for our customers, while upholding values of professionalism, reliability, and eco-friendliness.</p>
            <p>Additionally: <br>
                ✔ We Provide Highly trained, full-time employees (not sub-contractors) <br>
                ✔ We bring all our own supplies & equipment to each job <br>
                ✔ Transparent pricing, with no hidden fees
            </p>
        </section>

        <section>
            <h2>Clean Masters:</h2>
            <p>Top-tier, hassle-free cleaning to reclaim your time</p>
            <p>Booking a service allows you to schedule a one-time cleaning session at your preferred date and time. Whether it's residential, commercial, deep cleaning, move-in/move-out, or post-construction cleaning, we've got you covered.</p>
            <a href="bboking.html" class="btn">Book Now</a>
            
            <p>Subscribe to our cleaning services for regular, hassle-free cleaning tailored to your needs. Enjoy weekly, bi-weekly, monthly, or quarterly subscriptions and benefit from consistent quality and discounted rates compared to one-time bookings.</p>
            <a href="subscription.html" class="btn">Subscribe Now</a>
        </section>
        
        <section>
            <h2>More Information:</h2>
            <p>Are you ready to experience our exceptional cleaning services? <a href="contact.html">Contact us</a> now to request a quotation, schedule a cleaning, or explore our range of services.</p>
        </section>
    </div>

    <footer>
        <p>&copy; 2024 Cleaning Services. All rights reserved.</p>
    </footer>
    <script>
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(event) {
                event.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                smoothScroll(target);
            });
        });

        function smoothScroll(target) {
            const targetPosition = target.offsetTop;
            const startPosition = window.pageYOffset;
            const distance = targetPosition - startPosition;
            const duration = 500;
            let start = null;

            window.requestAnimationFrame(step);

            function step(timestamp) {
                if (!start) start = timestamp;
                const progress = timestamp - start;
                window.scrollTo(0, easeInOutCubic(progress, startPosition, distance, duration));
                if (progress < duration) window.requestAnimationFrame(step);
            }
        }

        function easeInOutCubic(t, b, c, d) {
            t /= d / 2;
            if (t < 1) return c / 2 * t * t * t + b;
            t -= 2;
            return c / 2 * (t * t * t + 2) + b;
        }
    </script>
</body>
</html>