

<?php

session_start();
include "../components/header.php";


require_once '../database/dbconnection.php'; // Include your database connection file

// Update item quantity if form submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
    $itemId = $_POST['item_id'];
    $quantity = $_POST['quantity'];

    $stmt = $pdo->prepare('UPDATE shopping_cart SET quantity = ? WHERE id = ?');
    $stmt->execute([$quantity, $itemId]);
}

// Delete item from cart if form submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete'])) {
    $itemId = $_POST['item_id'];

    $stmt = $pdo->prepare('DELETE FROM shopping_cart WHERE id = ?');
    $stmt->execute([$itemId]);
}

$stmt = $pdo->query('SELECT * FROM shopping_cart');
$cartItems = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>

    <title>Shopping Cart</title>
    <link rel="stylesheet" type="text/css" href="../css/cart.css"> 
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
        }
    </style>
</head>
<body>
    <div class="display">
        <div class="title">
    <h1>Your Shopping Cart</h1>
    </div>
    <div class="table">
    <?php if (empty($cartItems)): ?>
        <p>Your cart is empty.</p>
    <?php else: ?>
        <table>
            <tr>
                <th>Product</th>
                <th>Author</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Actions</th>
            </tr>
            <?php foreach ($cartItems as $item): ?>
                <tr>
                    <td><?php echo htmlspecialchars($item['book_title']); ?></td>
                    <td><?php echo htmlspecialchars($item['book_author']); ?></td>
                    <td><?php echo htmlspecialchars($item['book_price']); ?></td>
                    <td>
                        <form method="post" action="cart.php">
                            <input type="hidden" name="item_id" value="<?php echo $item['id']; ?>">
                            <input type="number" name="quantity" value="<?php echo $item['quantity']; ?>" min="1">
                            <input type="submit" name="update" value="Update">
                        </form>
                    </td>
                    <td><?php echo htmlspecialchars($item['book_price'] * $item['quantity']); ?></td>
                    <td>
                        <form method="post" action="cart.php">
                            <input type="hidden" name="item_id" value="<?php echo $item['id']; ?>">
                            <input type="submit" name="delete" value="Delete">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        <!-- <p><a href="checkout.php">Proceed to Checkout</a></p> -->
    <?php endif; ?>
    </div>
    </div>
<script>
    function myfunction() {
        var x = document.body;
        x.classList.toggle("darkMode");
    }
</script>
</body>
</html>