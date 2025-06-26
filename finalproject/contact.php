<?php
session_start();
$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $message = trim($_POST['message'] ?? '');

    if (!$name || !$email || !$message) {
        $error = 'Please fill in all fields.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Invalid email address.';
    } else {
        // For demo, just show success
        $success = 'Thank you for contacting us. We will get back to you soon.';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Contact Us - Real Estate Site</title>
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
            max-width: 1000px;
            margin: 0 auto 60px auto;
            background: #fff;
            padding: 40px 40px 30px 40px;
            border-radius: 0 0 12px 12px;
            box-shadow: 0 2px 16px rgba(0,0,0,0.09);
            position: relative;
        }
        h1 {
            color: #22334a;
            font-size: 2em;
            margin-bottom: 18px;
            text-align: center;
        }
        .msg-error {
            color: #d32f2f;
            font-weight: bold;
            margin-bottom: 10px;
            text-align: center;
        }
        .msg-success {
            color: #219653;
            font-weight: bold;
            margin-bottom: 10px;
            text-align: center;
        }
        form label {
            font-weight: 500;
            color: #22334a;
        }
        form input, form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 18px;
            border-radius: 4px;
            border: 1px solid #ccc;
            font-size: 1em;
            background: #f3f4f6;
        }
        form button {
            padding: 10px 20px;
            background: #1976d2;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: 500;
            font-size: 1em;
            transition: background 0.2s;
        }
        form button:hover {
            background: #145a9e;
        }
        @media (max-width: 1000px) {
            .navbar, .container { max-width: 100%; margin: 0; border-radius: 0; padding: 10px; }
        }
    </style>
</head>
<body>
    <div class="navbar">
        <div class="logo">🏠 Real Estate</div>
        <nav>
            <a href="index.php">Home</a>
            <a href="contact.php" class="active">Contact Us</a>
            <a href="about.php">About</a>
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
        <h1>Contact Us</h1>
        <?php if ($error): ?>
            <div class="msg-error"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>
        <?php if ($success): ?>
            <div class="msg-success"><?= htmlspecialchars($success) ?></div>
        <?php endif; ?>
        <form method="POST" autocomplete="off">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" required value="<?= htmlspecialchars($_POST['name'] ?? '') ?>" />

            <label for="email">Email</label>
            <input type="email" id="email" name="email" required value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" />

            <label for="message">Message</label>
            <textarea id="message" name="message" required rows="6"><?= htmlspecialchars($_POST['message'] ?? '') ?></textarea>

            <button type="submit">Send Message</button>
        </form>
        <div style="margin-top:20px; text-align:center; color:#444;">
            Or email us at <a href="mailto:info@realestate.com" style="color:#1976d2;">info@realestate.com</a>
        </div>
    </div>
</body>
</html>
