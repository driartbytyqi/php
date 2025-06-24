<?php
require 'db.php'; // Your PDO connection

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $rating = (int)($_POST['rating'] ?? 0);
    $comment = trim($_POST['comment'] ?? '');

    if (!$name || !$rating || !$comment) {
        $error = 'Please fill in all fields.';
    } elseif ($rating < 1 || $rating > 5) {
        $error = 'Rating must be between 1 and 5.';
    } else {
        $stmt = $pdo->prepare("INSERT INTO reviews (name, rating, comment) VALUES (:name, :rating, :comment)");
        $stmt->execute(['name' => $name, 'rating' => $rating, 'comment' => $comment]);
        $success = 'Thank you for your review!';
    }
}

$pageTitle = "Submit a Review - Real Estate Site";
$activePage = "review";

ob_start();
?>

<h1>Submit a Review</h1>

<?php if ($error): ?>
    <p style="color:red; font-weight:bold;"><?= htmlspecialchars($error) ?></p>
<?php endif; ?>
<?php if ($success): ?>
    <p style="color:green; font-weight:bold;"><?= htmlspecialchars($success) ?></p>
<?php endif; ?>

<form method="POST" style="max-width:400px;">
    <label for="name">Your Name</label><br />
    <input type="text" id="name" name="name" required value="<?= htmlspecialchars($_POST['name'] ?? '') ?>" style="width:100%; padding:8px; margin-bottom:15px;" />

    <label for="rating">Rating</label><br />
    <select id="rating" name="rating" required style="width:100%; padding:8px; margin-bottom:15px;">
        <option value="">Select rating</option>
        <?php for ($i=1; $i<=5; $i++): ?>
            <option value="<?= $i ?>" <?= (isset($_POST['rating']) && $_POST['rating'] == $i) ? 'selected' : '' ?>><?= $i ?></option>
        <?php endfor; ?>
    </select>

    <label for="comment">Comment</label><br />
    <textarea id="comment" name="comment" rows="6" required style="width:100%; padding:8px; margin-bottom:15px;"><?= htmlspecialchars($_POST['comment'] ?? '') ?></textarea>

    <button type="submit" style="padding:10px 20px; background:#007bff; color:white; border:none; border-radius:4px; cursor:pointer;">Submit Review</button>
</form>

<?php
$content = ob_get_clean();

require 'layout.php';
