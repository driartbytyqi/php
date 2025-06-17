<?php
$houses = json_decode(file_get_contents('data/houses.json'), true);
$id = $_GET['id'] ?? 0;

if (!isset($houses[$id])) {
    echo "House not found.";
    exit;
}
$house = $houses[$id];
?>
<!DOCTYPE html>
<html>
<head>
    <title><?= htmlspecialchars($house['title']) ?> - Details</title>
</head>
<body>
    <h1><?= htmlspecialchars($house['title']) ?></h1>
    <?php if (!empty($house['image'])): ?>
        <img src="<?= htmlspecialchars($house['image']) ?>" style="width:500px; max-width:100%; border-radius:10px;" alt="House Image">
    <?php endif; ?>
    <p><strong>Price:</strong> $<?= number_format($house['price']) ?></p>
    <p><strong>Location:</strong> <?= htmlspecialchars($house['location']) ?></p>
    <p><?= nl2br(htmlspecialchars($house['description'])) ?></p>
    <p><a href="index.php">← Back to listings</a></p>
</body>
</html>
<?php if (!empty($house['image'])): ?>
    <img src="<?= htmlspecialchars($house['image']) ?>" alt="<?= htmlspecialchars($house['title']) ?>" style="width:100%; max-width:600px; height:auto; border-radius:10px; margin-bottom: 20px;">
<?php endif; ?>
