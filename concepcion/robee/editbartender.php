<?php
include 'core/models.php';

// Check if the bartender ID is set in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $bartender = getBartenderById($conn, $id);
}

// Check if the form is submitted
if (isset($_POST['update_bartender'])) {
    $id = $_POST['bartender_id'];
    $name = $_POST['name'];
    
    // Call the update function and redirect based on success or failure
    if (updateBartender($conn, $id, $name)) {
        header("Location: index.php?message=Bartender updated successfully");
    } else {
        header("Location: index.php?error=Failed to update bartender");
    }
    exit();
} else {
    // If no bartender data found, redirect to the index page with an error
    if (!$bartender) {
        header("Location: index.php?error=Bartender not found");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Bartender</title>
</head>
<body>
    <h1>Edit Bartender</h1>
    <form action="editbartender.php?id=<?= $id ?>" method="POST">
        <input type="hidden" name="bartender_id" value="<?= $bartender['bartender_id'] ?>">
        <label for="name">Name:</label>
        <input type="text" name="name" value="<?= htmlspecialchars($bartender['name']) ?>" required>
        <button type="submit" name="update_bartender">Update Bartender</button>
    </form>
    <a href="index.php">Cancel</a>
</body>
</html>
