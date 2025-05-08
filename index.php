<?php
require 'includes/config.php';
require 'includes/header.php';


$stmt = $pdo->query("SELECT * FROM restaurants");
$restaurants = $stmt->fetchAll();
?>


<div class="container my-5">
    <h1 class="text-center mb-4">Explore Restaurants</h1>
    <div class="restaurant-grid">
        <?php foreach ($restaurants as $restaurant): ?>
            <div class="card">
                <img src="assets/images/<?php echo $restaurant['image'] ?: 'placeholder.jpg'; ?>" class="card-img-top" alt="<?php echo $restaurant['name']; ?>">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $restaurant['name']; ?></h5>
                    <p class="card-text"><?php echo $restaurant['description']; ?></p>
                    <a href="restaurant.php?id=<?php echo $restaurant['id']; ?>" class="btn btn-primary">View Menu</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>


<?php require 'includes/footer.php'; ?>