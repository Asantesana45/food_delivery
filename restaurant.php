<?php
require 'includes/config.php';
require 'includes/header.php';


if (!isset($_GET['id'])) {
    header('Location: index.php');
    exit;
}


$restaurant_id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM restaurants WHERE id = ?");
$stmt->execute([$restaurant_id]);
$restaurant = $stmt->fetch();


if (!$restaurant) {
    header('Location: index.php');
    exit;
}


$stmt = $pdo->prepare("SELECT * FROM menu_items WHERE restaurant_id = ?");
$stmt->execute([$restaurant_id]);
$menu_items = $stmt->fetchAll();
?>


<div class="container my-5">
    <h1><?php echo $restaurant['name']; ?></h1>
    <p><?php echo $restaurant['description']; ?></p>
    <h2 class="mt-4">Menu</h2>
    <div class="row">
        <?php foreach ($menu_items as $item): ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="assets/images/<?php echo $item['image'] ?: 'placeholder.jpg'; ?>" class="card-img-top" alt="<?php echo $item['name']; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $item['name']; ?></h5>
                        <p class="card-text"><?php echo $item['description']; ?></p>
                        <p class="card-text"><strong>$<?php echo number_format($item['price'], 2); ?></strong></p>
                        <a href="cart/add_to_cart.php?item_id=<?php echo $item['id']; ?>" class="btn btn-primary add-to-cart">Add to Cart</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>


<?php require 'includes/footer.php'; ?>