<?php
require '../includes/config.php';


if (!isset($_SESSION['user_id'])) {
    header('Location: ../auth/login.php');
    exit;
}


if (isset($_GET['item_id'])) {
    $item_id = $_GET['item_id'];
    $user_id = $_SESSION['user_id'];


    // Check if item already in cart
    $stmt = $pdo->prepare("SELECT * FROM cart WHERE user_id = ? AND menu_item_id = ?");
    $stmt->execute([$user_id, $item_id]);
    $cart_item = $stmt->fetch();


    if ($cart_item) {
        $stmt = $pdo->prepare("UPDATE cart SET quantity = quantity + 1 WHERE id = ?");
        $stmt->execute([$cart_item['id']]);
    } else {
        $stmt = $pdo->prepare("INSERT INTO cart (user_id, menu_item_id, quantity) VALUES (?, ?, 1)");
        $stmt->execute([$user_id, $item_id]);
    }


    header('Location: ../cart/cart.php');
    exit;
}
?>