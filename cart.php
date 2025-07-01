<?php
session_start();

$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
$total = 0;

// Show update message if set
if (isset($_SESSION['cart_message'])) {
    echo '<p style="color:green; font-weight:bold; margin-bottom:20px;">' . htmlspecialchars($_SESSION['cart_message']) . '</p>';
    unset($_SESSION['cart_message']);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Your Cart</title>
    <style>
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: #f8f9fa;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 40px auto;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            padding: 32px 40px 24px 40px;
        }
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 32px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            background: #fafbfc;
            margin-bottom: 24px;
        }
        th, td {
            border: 1px solid #e0e0e0;
            padding: 12px 10px;
            text-align: center;
        }
        th {
            background: #f1f3f6;
            color: #444;
            font-weight: 600;
        }
        tr:nth-child(even) {
            background: #f9f9f9;
        }
        input[type="number"] {
            width: 60px;
            padding: 4px;
            border-radius: 4px;
            border: 1px solid #ccc;
            text-align: center;
        }
        button {
            background: #007bff;
            color: #fff;
            border: none;
            padding: 10px 22px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            margin-right: 10px;
            transition: background 0.2s;
        }
        button:hover {
            background: #0056b3;
        }
        .continue-shopping {
            display: inline-block;
            margin-top: 18px;
            color: #007bff;
            text-decoration: none;
            font-weight: 500;
        }
        .continue-shopping:hover {
            text-decoration: underline;
        }
        .empty-cart {
            text-align: center;
            color: #888;
            font-size: 20px;
            margin: 40px 0;
        }
        @media (max-width: 600px) {
            .container { padding: 10px; }
            table, th, td { font-size: 13px; }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Your Shopping Cart</h1>
        <?php if (empty($cart)): ?>
            <div class="empty-cart">Your cart is empty.</div>
        <?php else: ?>
            <form method="post" action="update_cart.php">
                <table>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>Subtotal</th>
                        <th>Remove</th>
                    </tr>
                    <?php foreach ($cart as $index => $item): 
                        $subtotal = $item['price'] * $item['qty'];
                        $total += $subtotal;
                    ?>
                    <tr>
                        <td><?= htmlspecialchars($item['name']) ?></td>
                        <td>$<?= number_format($item['price'], 2) ?></td>
                        <td>
                            <input type="number" name="qty[<?= $index ?>]" value="<?= $item['qty'] ?>" min="1">
                        </td>
                        <td>$<?= number_format($subtotal, 2) ?></td>
                        <td>
                            <input type="checkbox" name="remove[]" value="<?= $index ?>">
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td colspan="3" align="right"><strong>Total:</strong></td>
                        <td colspan="2"><strong>$<?= number_format($total, 2) ?></strong></td>
                    </tr>
                </table>
                <button type="submit">Update Cart</button>
            </form>
            <form method="post" action="checkout.php" style="display:inline;">
                <button type="submit">Proceed to Checkout</button>
            </form>
        <?php endif; ?>
        <a class="continue-shopping" href="index.php">← Continue Shopping</a>
    </div>
</body>
</html>