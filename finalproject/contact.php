<?php
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

$pageTitle = "Contact Us - Real Estate Site";
$activePage = "contact";

ob_start(); // Start output buffering
?>

<h1>Contact Us</h1>

<?php if ($error): ?>
    <p style="color:red; font-weight:bold;"><?= htmlspecialchars($error) ?></p>
<?php endif; ?>
<?php if ($success): ?>
    <p style="color:green; font-weight:bold;"><?= htmlspecialchars($success) ?></p>
<?php endif; ?>

<form method="POST" style="max-width:400px;">
    <label for="name">Name</label><br />
    <input type="text" id="name" name="name" required value="<?= htmlspecialchars($_POST['name'] ?? '') ?>" style="width:100%; padding:8px; margin-bottom:15px;" />

    <label for="email">Email</label><br />
    <input type="email" id="email" name="email" required value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" style="width:100%; padding:8px; margin-bottom:15px;" />

    <label for="message">Message</label><br />
    <textarea id="message" name="message" required rows="6" style="width:100%; padding:8px; margin-bottom:15px;"><?= htmlspecialchars($_POST['message'] ?? '') ?></textarea>

    <button type="submit" style="padding:10px 20px; background:#007bff; color:white; border:none; border-radius:4px; cursor:pointer;">Send Message</button>
</form>

<?php
$content = ob_get_clean();

require 'layout.php';
