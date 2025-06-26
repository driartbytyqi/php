<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>About Us - Real Estate</title>
    <style>
        body { 
            background: #f3f4f6; 
            font-family: 'Segoe UI', Arial, sans-serif; 
            margin: 0;
        }
        .navbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: #22334a;
            color: #fff;
            padding: 18px 40px;
            border-radius: 10px 10px 0 0;
            max-width: 1000px;
            margin: 30px auto 0 auto;
        }
        .navbar .logo {
            font-size: 1.5em;
            font-weight: bold;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .navbar nav {
            display: flex;
            gap: 25px;
        }
        .navbar nav a {
            color: #fff;
            text-decoration: none;
            font-weight: 500;
            padding: 6px 14px;
            border-radius: 4px;
            transition: background 0.2s;
        }
        .navbar nav a.active,
        .navbar nav a:hover {
            background: #1976d2;
        }
        .container { 
            max-width: 700px; 
            margin: 0 auto 60px auto; 
            background: #fff; 
            padding: 40px 40px 30px 40px; 
            border-radius: 0 0 12px 12px; 
            box-shadow: 0 2px 16px rgba(0,0,0,0.09);
            position: relative;
        }
        .about-header {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 18px;
        }
        .about-header img {
            width: 48px;
            height: 48px;
        }
        h2 {
            color: #22334a;
            font-size: 2em;
            margin: 0;
        }
        .about-content {
            color: #444;
            font-size: 1.15em;
            line-height: 1.7;
            margin-bottom: 25px;
        }
        .about-features {
            display: flex;
            gap: 30px;
            flex-wrap: wrap;
            margin-bottom: 20px;
        }
        .feature {
            flex: 1 1 200px;
            background: #f3f4f6;
            border-radius: 8px;
            padding: 18px 16px;
            box-shadow: 0 1px 4px rgba(0,0,0,0.04);
            text-align: center;
        }
        .feature-icon {
            font-size: 2em;
            margin-bottom: 8px;
            color: #1976d2;
        }
        .feature-title {
            font-weight: bold;
            color: #22334a;
            margin-bottom: 6px;
        }
        .team-section {
            margin-top: 30px;
            padding-top: 18px;
            border-top: 1px solid #e0e0e0;
        }
        .team-title {
            color: #1976d2;
            font-size: 1.1em;
            margin-bottom: 10px;
        }
        .team-list {
            display: flex;
            gap: 18px;
            flex-wrap: wrap;
        }
        .team-member {
            background: #f9f9f9;
            border-radius: 6px;
            padding: 10px 16px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.03);
            font-size: 1em;
        }
        @media (max-width: 1000px) {
            .navbar { max-width: 100%; margin: 0; border-radius: 0; padding: 10px; }
        }
        @media (max-width: 700px) {
            .container { max-width: 100%; padding: 18px 5px; border-radius: 0; }
            .about-features { flex-direction: column; gap: 15px; }
            .team-list { flex-direction: column; gap: 10px; }
        }
    </style>
</head>
<body>
    <div class="navbar">
        <div class="logo">🏠 Real Estate</div>
        <nav>
            <a href="index.php">Home</a>
            <a href="contact.php">Contact Us</a>
            <a href="about.php" class="active">About</a>
            <?php if (isset($_SESSION['user_id'])): ?>
                <span style="color:#fff;">Hello, <?= htmlspecialchars($_SESSION['username']) ?></span>
                <a href="logout.php">Logout</a>
            <?php else: ?>
                <a href="login.php">Login</a>
                <a href="signup.php">Sign Up</a>
            <?php endif; ?>
        </nav>
    </div>
    <div class="container">
        <div class="about-header">
            <img src="https://img.icons8.com/color/96/000000/real-estate.png" alt="About Icon">
            <h2>About Us</h2>
        </div>
        <div class="about-content">
            Welcome to our Real Estate platform!<br>
            We help you find your dream home or list your property for sale.<br>
            Our mission is to connect buyers and sellers in a safe, easy, and modern way.
        </div>
        <div class="about-features">
            <div class="feature">
                <div class="feature-icon">🏡</div>
                <div class="feature-title">Wide Selection</div>
                Homes, apartments, and villas for every taste and budget.
            </div>
            <div class="feature">
                <div class="feature-icon">🔒</div>
                <div class="feature-title">Secure Platform</div>
                Your data and transactions are protected with us.
            </div>
            <div class="feature">
                <div class="feature-icon">🤝</div>
                <div class="feature-title">Trusted Support</div>
                Our team is here to help you every step of the way.
            </div>
        </div>
        <div class="team-section">
            <div class="team-title">Meet Our Team</div>
            <div class="team-list">
                <div class="team-member">Arta - Founder & CEO</div>
                <div class="team-member">Blerim - Lead Developer</div>
                <div class="team-member">Elira - Customer Support</div>
            </div>
        </div>
    </div>
</body>
</html>