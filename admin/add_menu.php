<?php
require '../includes/config.php';
require '../includes/header.php';


if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header('Location: ../auth/login.php');
    exit;
}


$stmt = $pdo->query("SELECT * FROM restaurants");
$restaurants = $stmt->fetchAll();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $restaurant_id = $_POST['restaurant_id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image = $_FILES['image']['name'];


    if ($image) {
        move_uploaded_file($_FILES['image']['tmp_name'], '../assets/images/' . $image);
    }


    $stmt = $pdo->prepare("INSERT INTO menu_items (restaurant_id, name, description, price, image) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$restaurant_id, $name, $description, $price, $image]);
    header('Location: index.php');
    exit;
}
?>


<div class="container my-5">
    <h2>Add Menu Item</h2>
    <form method="POST" enctype="multipart/form-data" class="mx-auto" style="max-width: 400px;">
        <div class="mb-3">
            <label for="restaurant_id" class="form-label">Restaurant</label>
            <select class="form-control" id="restaurant_id" name="restaurant_id" required>
                <?php foreach ($restaurants as $restaurant): ?>
                    <option value="<?php echo $restaurant['id']; ?>"><?php echo $restaurant['name']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" required></textarea>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" step="0.01" class="form-control" id="price" name="price" required>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>
        <button type="submit" class="btn btn-primary">Add Menu Item</button>
    </form>
</div>


<?php require '../includes/footer.php'; ?>