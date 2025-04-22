<?php
// PHP code to handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = $_POST['name'];
    $company = $_POST['company'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    // Simple validation (you can extend it)
    if (!empty($name) && !empty($company) && !empty($email) && !empty($phone) && !empty($message)) {
        // Here you can write the data to the database or send an email, for now, we just display a success message
        echo "<script>alert('Your demo request has been submitted. We will contact you shortly!');</script>";
    } else {
        echo "<script>alert('Please fill in all fields!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NextGen Food Processing Systems</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <!-- Updated Header -->
    <header>
        <div class="container">
            <nav>
                <div class="logo">
                    <i class="fas fa-seedling"></i> NextGen Food Processing
                </div>
                <ul class="nav-links">
                    <li><a href="#about">About</a></li>
                    <li><a href="#features">Features</a></li>
                    <li><a href="#process">Process</a></li>
                    <li><a href="#dashboard">Dashboard</a></li>
                </ul>
                <div class="auth-buttons">
                    <a href="login.php" class="btn btn-outline">Login</a>
                    <a href="signup.php" class="btn btn-primary">Sign Up</a>
                    <a href="contact.php" class="btn btn-outline">Contact Us</a>
                </div>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <h1>Revolutionizing Food Processing</h1>
            <p>Our innovative system improves quality, shelf life, and nutritional value while ensuring better storage, packaging, and distribution.</p>
            <a href="#about" class="btn">Learn More</a>
        </div>
    </section>

    <!-- Contact Modal for Demo Request -->
    <div class="modal" id="contactModal">
        <div class="modal-content">
            <span class="close-modal">&times;</span>
            <h2>Request a Demo</h2>
            <p>Fill out the form below and one of our experts will contact you to schedule a demo of our innovative food processing system.</p>
            <form id="contactForm" action="demo.php" method="POST">
                <div style="margin-bottom: 1rem;">
                    <label for="name" style="display: block; margin-bottom: 0.5rem;">Full Name</label>
                    <input type="text" id="name" name="name" style="width: 100%; padding: 0.8rem; border: 1px solid #ddd; border-radius: 4px;" required>
                </div>
                <div style="margin-bottom: 1rem;">
                    <label for="company" style="display: block; margin-bottom: 0.5rem;">Company</label>
                    <input type="text" id="company" name="company" style="width: 100%; padding: 0.8rem; border: 1px solid #ddd; border-radius: 4px;" required>
                </div>
                <div style="margin-bottom: 1rem;">
                    <label for="email" style="display: block; margin-bottom: 0.5rem;">Email</label>
                    <input type="email" id="email" name="email" style="width: 100%; padding: 0.8rem; border: 1px solid #ddd; border-radius: 4px;" required>
                </div>
                <div style="margin-bottom: 1rem;">
                    <label for="phone" style="display: block; margin-bottom: 0.5rem;">Phone</label>
                    <input type="tel" id="phone" name="phone" style="width: 100%; padding: 0.8rem; border: 1px solid #ddd; border-radius: 4px;" required>
                </div>
                <div style="margin-bottom: 1.5rem;">
                    <label for="message" style="display: block; margin-bottom: 0.5rem;">Message</label>
                    <textarea id="message" name="message" style="width: 100%; padding: 0.8rem; border: 1px solid #ddd; border-radius: 4px; height: 120px;" required></textarea>
                </div>
                <button type="submit" class="btn" style="width: 100%;">Submit Request</button>
            </form>
        </div>
    </div>

    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-column">
                    <h3>NextGen Food Processing</h3>
                    <p>Revolutionizing the food industry through innovative processing technologies that preserve quality and nutrition.</p>
                    <div class="social-icons">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                <div class="footer-column">
                    <h3>Quick Links</h3>
                    <ul class="footer-links">
                        <li><a href="#about">About Us</a></li>
                        <li><a href="#features">Features</a></li>
                        <li><a href="#process">Our Process</a></li>
                        <li><a href="#dashboard">Dashboard</a></li>
                        <li><a href="#">Case Studies</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h3>Contact Us</h3>
                    <ul class="footer-links">
                        <li><i class="fas fa-map-marker-alt"></i> 123 Innovation Way, FoodTech Park</li>
                        <li><i class="fas fa-phone"></i> +91 1234567890</li>
                        <li><i class="fas fa-envelope"></i> info@nextgenfood.tech</li>
                    </ul>
                </div>
            </div>
            <div class="copyright">
                <p>&copy; 2025 NextGen Food Processing. All Rights Reserved.</p>
            </div>
        </div>
    </footer>

    <script src="script.js"></script>
</body>
</html>
