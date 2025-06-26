<?php
require 'db.php';
session_start();

// Fetch all listings from the database
$stmt = $pdo->query("SELECT * FROM listings ORDER BY id DESC");
$houses = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Real Estate Listings</title>
    <link rel="stylesheet" href="assets/style.css">
    <style>
        body {
            background: #f3f4f6;
            margin: 0;
            font-family: 'Segoe UI', Arial, sans-serif;
        }
        .container {
            max-width: 1000px;
            margin: 30px auto;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 12px rgba(0,0,0,0.07);
            padding: 0 0 40px 0;
        }
        .navbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: #22334a;
            color: #fff;
            padding: 18px 40px;
            border-radius: 10px 10px 0 0;
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
        .marketing {
            padding: 30px 40px 10px 40px;
            text-align: center;
        }
        .marketing h1 {
            margin: 0 0 10px 0;
            font-size: 2em;
            color: #22334a;
        }
        .marketing p {
            color: #444;
            font-size: 1.1em;
        }
        .add-button {
            display: inline-block;
            margin: 20px 0;
            background: #219653;
            color: #fff;
            padding: 10px 18px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: 500;
            transition: background 0.2s;
        }
        .add-button:hover {
            background: #17643a;
        }
        .listings {
            display: flex;
            flex-direction: column;
            gap: 25px;
            padding: 0 40px;
        }
        .house {
            background: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 1px 6px rgba(0,0,0,0.06);
            padding: 18px 22px;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        .house img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 5px;
            margin-bottom: 10px;
        }
        .house h2 {
            margin: 0 0 5px 0;
            font-size: 1.3em;
        }
        .house p {
            margin: 0 0 4px 0;
        }
        .house a {
            color: #1976d2;
            text-decoration: none;
            font-weight: 500;
        }
        .house a:hover {
            text-decoration: underline;
        }
        @media (max-width: 700px) {
            .container {
                padding: 0 0 20px 0;
            }
            .navbar, .marketing, .listings {
                padding: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="navbar">
        <div class="logo">🏠 Real Estate</div>
        <nav>
            <a href="index.php" class="active">Home</a>
            <a href="contact.php">Contact Us</a>
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
        <div class="marketing">
            <h1>Welcome to Our Real Estate Site</h1>
            <p>Find your dream home or list your property with us!</p>
            <a class="add-button" href="add.php">+ Add New Listing</a>
        </div>
        <div class="listings">
            <?php foreach ($houses as $house): ?>
                <div class="house">
                    <?php if (!empty($house['image'])): ?>
                        <img src="uploads/<?= htmlspecialchars($house['image']) ?>" alt="<?= htmlspecialchars($house['title']) ?>">
                    <?php endif; ?>
                    <h2><?= htmlspecialchars($house['title']) ?></h2>
                    <p><strong>Price:</strong> $<?= number_format($house['price']) ?></p>
                    <p><strong>Location:</strong> <?= htmlspecialchars($house['location']) ?></p>
                    <a href="details.php?id=<?= $house['id'] ?>">🔎 View Details</a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>
