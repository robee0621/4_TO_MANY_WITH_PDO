<?php
include 'core/models.php';

// Check if the order ID is set in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Call the delete function and redirect based on success or failure
    if (deleteOrder($conn, $id)) {
        header("Location: index.php?message=Order deleted successfully");
    } else {
        header("Location: index.php?error=Failed to delete order");
    }
    exit();
} else {
    header("Location: index.php?error=Invalid order ID");
    exit();
}
?>
