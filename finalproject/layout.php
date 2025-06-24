<?php
// layout.php
// Accepts $pageTitle and $activePage variables
// And $content for the main content HTML

// Default values if not set
$pageTitle = $pageTitle ?? "Real Estate Site";
$activePage = $activePage ?? "home";
$content = $content ?? "<p>Welcome to the site!</p>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title><?= htmlspecialchars($pageTitle) ?></title>
<style>
    * { box-sizing: border-box; margin: 0; padding: 0; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;}
    body, html { height: 100%; background: #f0f2f5; }
    .container { display: flex; min-height: 100vh; }
    .sidebar {
        background-color: #2c3e50;
        width: 250px;
        padding: 30px 20px;
        color: white;
        display: flex;
        flex-direction: column;
    }
    .sidebar h2 { margin-bottom: 30px; font-weight: 700; font-size: 24px; letter-spacing: 1px; }
    .sidebar a {
        color: #bdc3c7;
        text-decoration: none;
        padding: 12px 15px;
        margin-bottom: 10px;
        border-radius: 6px;
        font-weight: 600;
        transition: background-color 0.3s ease, color 0.3s ease;
    }
    .sidebar a:hover, .sidebar a.active {
        background-color: #34495e;
        color: #ecf0f1;
    }
    .main-content {
        flex: 1;
        background: white;
        padding: 40px 50px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
        border-radius: 0 10px 10px 0;
    }
    h1 { color: #34495e; margin-bottom: 25px; font-weight: 700; font-size: 32px; }
    p { color: #555; font-size: 18px; line-height: 1.6; }
    @media (max-width: 700px) {
        .container { flex-direction: column; }
        .sidebar { width: 100%; flex-direction: row; overflow-x: auto; padding: 10px 0; }
        .sidebar a { margin: 0 10px; padding: 10px 12px; white-space: nowrap; }
        .main-content { border-radius: 0; padding: 20px; }
    }
</style>
</head>
<body>
<div class="container">
    <nav class="sidebar">
        <h2>Real Estate</h2>
        <a href="index.php" class="<?= $activePage === 'home' ? 'active' : '' ?>">Home</a>
        <a href="contact.php" class="<?= $activePage === 'contact' ? 'active' : '' ?>">Contact Us</a>
        <a href="review.php" class="<?= $activePage === 'review' ? 'active' : '' ?>">Submit a Review</a>
        <a href="listings.php" class="<?= $activePage === 'listings' ? 'active' : '' ?>">Listings</a>
    </nav>

    <main class="main-content">
        <?= $content ?>
    </main>
</div>
</body>
</html>
