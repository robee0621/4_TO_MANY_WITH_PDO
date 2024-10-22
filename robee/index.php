<?php
// Include the necessary files for database interaction and model functions
include 'core/dbconfig.php'; // Database configuration
include 'core/models.php'; // Model functions

// Fetch all bartenders, customers, and orders from the database
$bartenders = getBartenders($conn);
$customers = getCustomers($conn);
$orders = getOrders($conn);

// Handle messages
$message = isset($_GET['message']) ? htmlspecialchars($_GET['message']) : '';
$error = isset($_GET['error']) ? htmlspecialchars($_GET['error']) : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Bar Management System</title>
</head>
<body>

<header>
    <h1>Bar Management System</h1>
</header>

<!-- Display messages -->
<div class="notifications">
    <?php if ($message): ?>
        <div class="notification success"><?= $message ?></div>
    <?php endif; ?>
    <?php if ($error): ?>
        <div class="notification error"><?= $error ?></div>
    <?php endif; ?>
</div>

<main>
    <div class="grid-container">

        <!-- Section: Bartenders -->
        <section class="card">
            <h2>Bartenders</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($bartenders as $bartender): ?>
                    <tr>
                        <td><?= $bartender['bartender_id'] ?></td>
                        <td><?= htmlspecialchars($bartender['name']) ?></td>
                        <td>
                            <a class="button edit" href="editbartender.php?id=<?= $bartender['bartender_id'] ?>">Edit</a>
                            <form action="core/handleForms.php" method="POST" style="display:inline;">
                                <input type="hidden" name="bartender_id" value="<?= $bartender['bartender_id'] ?>">
                                <button type="submit" name="deleteBartenderBtn" class="button delete">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <h3>Add New Bartender</h3>
            <form action="core/handleForms.php" method="POST" class="add-form">
                <label for="name">Name:</label>
                <input type="text" name="name" required>
                <button type="submit" name="add_bartender" class="button add">Add Bartender</button>
            </form>
        </section>

        <!-- Section: Customers -->
        <section class="card">
            <h2>Customers</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($customers as $customer): ?>
                    <tr>
                        <td><?= $customer['customer_id'] ?></td>
                        <td><?= htmlspecialchars($customer['name']) ?></td>
                        <td>
                            <a class="button edit" href="editcustomer.php?id=<?= $customer['customer_id'] ?>">Edit</a>
                            <form action="core/handleForms.php" method="POST" style="display:inline;">
                                <input type="hidden" name="customer_id" value="<?= $customer['customer_id'] ?>">
                                <button type="submit" name="deleteCustomerBtn" class="button delete">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <h3>Add New Customer</h3>
            <form action="core/handleForms.php" method="POST" class="add-form">
                <label for="name">Name:</label>
                <input type="text" name="name" required>
                <button type="submit" name="add_customer" class="button add">Add Customer</button>
            </form>
        </section>

        <!-- Section: Orders -->
        <section class="card">
            <h2>Orders</h2>
            <table>
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Customer ID</th>
                        <th>Order Details</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($orders as $order): ?>
                    <tr>
                        <td><?= $order['order_id'] ?></td>
                        <td><?= $order['customer_id'] ?></td>
                        <td><?= htmlspecialchars($order['order_details']) ?></td>
                        <td>
                            <a class="button edit" href="editorder.php?id=<?= $order['order_id'] ?>">Edit</a>
                            <form action="core/handleForms.php" method="POST" style="display:inline;">
                                <input type="hidden" name="order_id" value="<?= $order['order_id'] ?>">
                                <button type="submit" name="deleteOrderBtn" class="button delete">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <h3>Add New Order</h3>
            <form action="core/handleForms.php" method="POST" class="add-form">
                <label for="customer_id">Customer ID:</label>
                <input type="number" name="customer_id" required>
                <label for="order_details">Order Details:</label>
                <input type="text" name="order_details" required>
                <button type="submit" name="add_order" class="button add">Add Order</button>
            </form>
        </section>

    </div>
</main>

</body>
</html>
