<?php
$file = 'data/houses.json';
$houses = json_decode(file_get_contents($file), true);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $uploadDir = 'uploads/';
    $imagePath = '';

    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $tmpName = $_FILES['photo']['tmp_name'];
        $filename = basename($_FILES['photo']['name']);
        $targetFile = $uploadDir . time() . "_" . $filename;

        if (move_uploaded_file($tmpName, $targetFile)) {
            $imagePath = $targetFile;
        }
    }

    $new = [
        'title' => $_POST['title'],
        'price' => $_POST['price'],
        'location' => $_POST['location'],
        'description' => $_POST['description'],
        'image' => $imagePath
    ];
    $houses[] = $new;
    file_put_contents($file, json_encode($houses, JSON_PRETTY_PRINT));
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add House</title>
</head>
<body>
    <h1>Add New House</h1>
    <form method="POST" enctype="multipart/form-data">
        <label>Title: <input type="text" name="title" required></label><br><br>
        <label>Price: <input type="number" name="price" required></label><br><br>
        <label>Location: <input type="text" name="location" required></label><br><br>
        <label>Description:<br><textarea name="description" rows="4" cols="40"></textarea></label><br><br>
        <label>Photo: <input type="file" name="photo" accept="image/*"></label><br><br>
        <button type="submit">Add House</button>
    </form>
    <p><a href="index.php">← Back to listings</a></p>
</body>
</html>
