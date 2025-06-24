<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect and sanitize form data
    $title = $_POST['title'];
    $price = $_POST['price'];
    $location = $_POST['location'];
    $description = $_POST['description'];

    // Handle image upload
    $imageName = '';
    if (!empty($_FILES['image']['name'])) {
        $imageName = time() . '_' . basename($_FILES['image']['name']);
        $targetPath = 'uploads/' . $imageName;

        if (!move_uploaded_file($_FILES['image']['tmp_name'], $targetPath)) {
            $imageName = ''; // fallback to no image if upload fails
        }
    }

    // Insert into database
    $stmt = $pdo->prepare("INSERT INTO listings (title, price, location, description, image) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$title, $price, $location, $description, $imageName]);

    header('Location: index.php'); // redirect after submit
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add New Listing</title>
    <link rel="stylesheet" href="assets/style.css"> <!-- optional if you have styling -->
</head>
<body>
    <div class="container">
        <h1>➕ Add New Property Listing</h1>
        <form method="POST" enctype="multipart/form-data">
            <label>Title:</label><br>
            <input type="text" name="title" required><br><br>

            <label>Price:</label><br>
            <input type="number" name="price" required><br><br>

            <label>Location:</label><br>
            <input type="text" name="location" required><br><br>

            <label>Description:</label><br>
            <textarea name="description" required></textarea><br><br>

            <label>Image (optional):</label><br>
            <input type="file" name="image"><br><br>

            <input type="submit" value="Add Listing">
        </form>
        <br>
        <a href="index.php">⬅ Back to Listings</a>
    </div>
</body>
</html>


<?php
session_start();
if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] !== true) {
    header('Location: admin_login.php');
    exit;
}
?>
