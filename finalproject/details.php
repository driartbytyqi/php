<?php
require 'db.php';

// Get the house ID from the URL query string safely
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id <= 0) {
    echo "Invalid listing ID.";
    exit;
}

// Prepare and execute the query to fetch house details
$stmt = $pdo->prepare("SELECT * FROM listings WHERE id = :id");
$stmt->execute(['id' => $id]);
$house = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$house) {
    echo "Listing not found.";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title><?= htmlspecialchars($house['title']) ?> - Details</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <div class="container">
        <h1><?= htmlspecialchars($house['title']) ?></h1>

        <?php if (!empty($house['image'])): ?>
            <img src="uploads/<?= htmlspecialchars($house['image']) ?>" alt="<?= htmlspecialchars($house['title']) ?>" style="max-width: 600px; width: 100%; height: auto; border-radius: 5px;">
        <?php endif; ?>

        <p><strong>Price:</strong> $<?= number_format($house['price']) ?></p>
        <p><strong>Location:</strong> <?= htmlspecialchars($house['location']) ?></p>
        <p><strong>Description:</strong></p>
        <p><?= nl2br(htmlspecialchars($house['description'])) ?></p>

        <a href="index.php">← Back to Listings</a>
    </div>
</body>
</html>
