<?php
include 'core/models.php';

// Check if the customer ID is set in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Call the delete function and redirect based on success or failure
    if (deleteCustomer($conn, $id)) {
        header("Location: index.php?message=Customer deleted successfully");
    } else {
        header("Location: index.php?error=Failed to delete customer");
    }
    exit();
} else {
    header("Location: index.php?error=Invalid customer ID");
    exit();
}
?>
