<?php
include 'core/models.php';

// Check if the order ID is set in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $order = getOrderById($conn, $id);
}

// Check if the form is submitted
if (isset($_POST['update_order'])) {
    $id = $_POST['order_id'];
    $customer_id = $_POST['customer_id'];
    $order_details = $_POST['order_details'];
    
    // Call the update function and redirect based on success or failure
    if (updateOrder($conn, $id, $customer_id, $order_details)) {
        header("Location: index.php?message=Order updated successfully");
    } else {
        header("Location: index.php?error=Failed to update order");
    }
    exit();
} else {
    // If no order data found, redirect to the index page with an error
    if (!$order) {
        header("Location: index.php?error=Order not found");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Order</title>
</head>
<body>
    <h1>Edit Order</h1>
    <form action="editorder.php?id=<?= $id ?>" method="POST">
        <input type="hidden" name="order_id" value="<?= $order['order_id'] ?>">
        <label for="customer_id">Customer ID:</label>
        <input type="number" name="customer_id" value="<?= $order['customer_id'] ?>" required>
        <label for="order_details">Order Details:</label>
        <input type="text" name="order_details" value="<?= htmlspecialchars($order['order_details']) ?>" required>
        <button type="submit" name="update_order">Update Order</button>
    </form>
    <a href="index.php">Cancel</a>
</body>
</html>
