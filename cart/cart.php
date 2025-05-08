<?php
require '../includes/config.php';
require '../includes/header.php';


if (!isset($_SESSION['user_id'])) {
    header('Location: ../auth/login.php');
    exit;
}


$stmt = $pdo->prepare("SELECT c.*, m.name, m.price, m.image FROM cart c JOIN menu_items m ON c.menu_item_id = m.id WHERE c.user_id = ?");
$stmt->execute([$_SESSION['user_id']]);
$cart_items = $stmt->fetchAll();


$total = 0;
?>


<div class="container my-5">
    <h2>Your Cart</h2>
    <?php if (empty($cart_items)): ?>
        <p>Your cart is empty.</p>
    <?php else: ?>
        <table class="table table-dark">
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cart_items as $item): ?>
                    <?php $item_total = $item['price'] * $item['quantity']; $total += $item_total; ?>
                    <tr>
                        <td><?php echo $item['name']; ?></td>
                        <td>$<?php echo number_format($item['price'], 2); ?></td>
                        <td><?php echo $item['quantity']; ?></td>
                        <td>$<?php echo number_format($item_total, 2); ?></td>
                        <td><a href="remove_from_cart.php?id=<?php echo $item['id']; ?>" class="btn btn-danger btn-sm">Remove</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <h3>Total: $<?php echo number_format($total, 2); ?></h3>
        <a href="checkout.php" class="btn btn-primary">Proceed to Checkout</a>
    <?php endif; ?>
</div>


<?php require '../includes/footer.php'; ?>