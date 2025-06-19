<?php
require 'db.php';

// Fetch all listings from the database
$stmt = $pdo->query("SELECT * FROM listings ORDER BY id DESC");
$houses = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Real Estate Listings</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <div class="container">
        <h1>🏠 Houses for Sale</h1>
        <a class="add-button" href="add.php">+ Add New Listing</a>
        <div class="listings">
            <?php foreach ($houses as $house): ?>
                <div class="house">
                    <?php if (!empty($house['image'])): ?>
                        <img src="uploads/<?= htmlspecialchars($house['image']) ?>" alt="<?= htmlspecialchars($house['title']) ?>" style="width:100%; height:auto; border-radius:5px; object-fit: cover; max-height: 180px;">
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
