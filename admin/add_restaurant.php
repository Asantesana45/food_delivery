<?php
require '../includes/config.php';
require '../includes/header.php';


if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header('Location: ../auth/login.php');
    exit;
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $image = $_FILES['image']['name'];


    if ($image) {
        move_uploaded_file($_FILES['image']['tmp_name'], '../assets/images/' . $image);
    }


    $stmt = $pdo->prepare("INSERT INTO restaurants (name, description, image) VALUES (?, ?, ?)");
    $stmt->execute([$name, $description, $image]);
    header('Location: index.php');
    exit;
}
?>


<div class="container my-5">
    <h2>Add Restaurant</h2>
    <form method="POST" enctype="multipart/form-data" class="mx-auto" style="max-width: 400px;">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" required></textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>
        <button type="submit" class="btn btn-primary">Add Restaurant</button>
    </form>
</div>


<?php require '../includes/footer.php'; ?>