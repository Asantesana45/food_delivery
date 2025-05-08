<?php
require '../includes/config.php';
require '../includes/header.php';


if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header('Location: ../auth/login.php');
    exit;
}


$stmt = $pdo->query("SELECT * FROM restaurants");
$restaurants = $stmt->fetchAll();


$stmt = $pdo->query("SELECT * FROM orders");
$orders = $stmt->fetchAll();
?>


<div class="container my-5">
    <h2>Admin Dashboard</h2>
    <a href="add_restaurant.php" class="btn btn-primary mb-3">Add Restaurant</a>
    <a href="add_menu.php" class="btn btn-primary mb-3">Add Menu Item</a>
    <h3>Restaurants</h3>
    <table class="table table-dark">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($restaurants as $restaurant): ?>
                <tr>
                    <td><?php echo $restaurant['name']; ?></td>
                    <td><?php echo $restaurant['description']; ?></td>
                    <td><a href="delete_restaurant.php?id=<?php echo $restaurant['id']; ?>" class="btn btn-danger btn-sm">Delete</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <h3>Orders</h3>
    <table class="table table-dark">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>User ID</th>
                <th>Total</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orders as $order): ?>
                <tr>
                    <td><?php echo $order['id']; ?></td>
                    <td><?php echo $order['user_id']; ?></td>
                    <td>$<?php echo number_format($order['total'], 2); ?></td>
                    <td><?php echo $order['status']; ?></td>
                    <td><a href="update_order.php?id=<?php echo $order['id']; ?>&status=completed" class="btn btn-success btn-sm">Complete</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>


<?php require '../includes/footer.php'; ?>