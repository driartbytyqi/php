<?php
require 'db.php';

$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';
    if ($username && $password) {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        try {
            $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
            $stmt->execute([$username, $hash]);
            $message = "Account created! <a href='login.php'>Login here</a>.";
        } catch (PDOException $e) {
            if ($e->getCode() == 23000) {
                $message = "Username already exists. Please choose another.";
            } else {
                $message = "An error occurred. Please try again.";
            }
        }
    } else {
        $message = "Please fill all fields.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
    <style>
        body { background: #f3f4f6; font-family: Arial, sans-serif; }
        .form-container { max-width: 400px; margin: 60px auto; background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 2px 12px rgba(0,0,0,0.07);}
        input { width: 100%; padding: 10px; margin: 10px 0; border-radius: 4px; border: 1px solid #ccc;}
        button { background: #1976d2; color: #fff; border: none; padding: 10px 20px; border-radius: 4px; cursor: pointer;}
        button:hover { background: #145a9e; }
        .msg { color: #1976d2; margin-bottom: 10px;}
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Sign Up</h2>
        <?php if ($message): ?><div class="msg"><?= $message ?></div><?php endif; ?>
        <form method="post">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Sign Up</button>
        </form>
        <p>Already have an account? <a href="login.php">Login here</a>.</p>
    </div>
</body>
</html>