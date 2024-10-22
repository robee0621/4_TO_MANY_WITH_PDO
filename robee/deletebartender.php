<?php
include 'core/models.php';

// Check if the bartender ID is set in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Call the delete function and redirect based on success or failure
    if (deleteBartender($conn, $id)) {
        header("Location: index.php?message=Bartender deleted successfully");
    } else {
        header("Location: index.php?error=Failed to delete bartender");
    }
    exit();
} else {
    header("Location: index.php?error=Invalid bartender ID");
    exit();
}
?>
