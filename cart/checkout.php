<?php
require '../includes/config.php';


if (!isset($_SESSION['user_id'])) {
    header('Location: ../auth/login.php');
    exit;
}


$stmt = $pdo->prepare("SELECT c.*, m.price FROM cart c JOIN menu_items m ON c.menu_item_id = m.id WHERE c.user_id = ?");
$stmt->execute([$_SESSION['user_id']]);
$cart_items = $stmt->fetchAll();


if (empty($cart_items)) {
    header('Location: cart.php');
    exit;
}


$total = 0;
foreach ($cart_items as $item) {
    $total += $item['price'] * $item['quantity'];
}


// Create order
$pdo->beginTransaction();
try {
    $stmt = $pdo->prepare("INSERT INTO orders (user_id, total) VALUES (?, ?)");
    $stmt->execute([$_SESSION['user_id'], $total]);
    $order_id = $pdo->lastInsertId();


    foreach ($cart_items as $item) {
        $stmt = $pdo->prepare("INSERT INTO order_items (order_id, menu_item_id, quantity, price) VALUES (?, ?, ?, ?)");
        $stmt->execute([$order_id, $item['menu_item_id'], $item['quantity'], $item['price']]);
    }


    // Clear cart
    $stmt = $pdo->prepare("DELETE FROM cart WHERE user_id = ?");
    $stmt->execute([$_SESSION['user_id']]);


    $pdo->commit();
    $message = "Order placed successfully!";
} catch (Exception $e) {
    $pdo->rollBack();
    $message = "Order failed: " . $e->getMessage();
}


require '../includes/header.php';
?>


<div class="container my-5">
    <h2>Checkout</h2>
    <div class="alert alert-<?php echo strpos($message, 'success') !== false ? 'success' : 'danger'; ?>">
        <?php echo $message; ?>
    </div>
    <a href="../index.php" class="btn btn-primary">Back to Home</a>
</div>


<?php require '../includes/footer.php'; ?>