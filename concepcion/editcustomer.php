<?php
include 'core/models.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $customer = getCustomerById($conn, $id);
}

if (isset($_POST['updateCustomerBtn'])) {
    $id = $_POST['customer_id'];
    $name = $_POST['name'];
    updateCustomer($conn, $id, $name);
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Customer</title>
</head>
<body>
    <h1>Edit Customer</h1>
    <form action="editcustomer.php?id=<?= $id ?>" method="POST">
        <input type="hidden" name="customer_id" value="<?= $customer['customer_id'] ?>">
        <label for="name">Name:</label>
        <input type="text" name="name" value="<?= $customer['name'] ?>" required>
        <button type="submit" name="updateCustomerBtn">Update Customer</button>
    </form>
</body>
</html>
