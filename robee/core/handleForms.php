<?php
require_once 'dbconfig.php';
require_once 'models.php';

// Handling form submission for adding a bartender
if (isset($_POST['add_bartender'])) {
    $name = $_POST['name'];
    if (addBartender($conn, $name)) {
        header("Location: ../index.php?message=Bartender added successfully");
    } else {
        header("Location: ../index.php?error=Failed to add bartender");
    }
    exit();
}

// Handling form submission for updating a bartender
if (isset($_POST['update_bartender'])) {
    $id = $_POST['bartender_id'];
    $name = $_POST['name'];
    if (updateBartender($conn, $id, $name)) {
        header("Location: ../index.php?message=Bartender updated successfully");
    } else {
        header("Location: ../index.php?error=Failed to update bartender");
    }
    exit();
}

// Handling form submission for deleting a bartender
if (isset($_POST['deleteBartenderBtn'])) {
    $bartender_id = $_POST['bartender_id'];
    if (deleteBartender($conn, $bartender_id)) {
        header("Location: ../index.php?message=Bartender deleted successfully");
    } else {
        header("Location: ../index.php?error=Failed to delete bartender");
    }
    exit();
}

// Handling form submission for adding a customer
if (isset($_POST['add_customer'])) {
    $name = $_POST['name'];
    $contact_info = $_POST['contact_info'];
    if (addCustomer($conn, $name, $contact_info)) {
        header("Location: ../index.php?message=Customer added successfully");
    } else {
        header("Location: ../index.php?error=Failed to add customer");
    }
    exit();
}

// Handling form submission for updating a customer
if (isset($_POST['update_customer'])) {
    $id = $_POST['customer_id'];
    $name = $_POST['name'];
    $contact_info = $_POST['contact_info'];
    if (updateCustomer($conn, $id, $name, $contact_info)) {
        header("Location: ../index.php?message=Customer updated successfully");
    } else {
        header("Location: ../index.php?error=Failed to update customer");
    }
    exit();
}

// Handling form submission for deleting a customer
if (isset($_POST['deleteCustomerBtn'])) {
    $customer_id = $_POST['customer_id'];
    if (deleteCustomer($conn, $customer_id)) {
        header("Location: ../index.php?message=Customer deleted successfully");
    } else {
        header("Location: ../index.php?error=Failed to delete customer");
    }
    exit();
}

// Handling form submission for adding an order
if (isset($_POST['add_order'])) {
    $customer_id = $_POST['customer_id'];
    $order_details = $_POST['order_details']; // Assuming you now collect order details
    if (addOrder($conn, $customer_id, $order_details)) {
        header("Location: ../index.php?message=Order added successfully");
    } else {
        header("Location: ../index.php?error=Failed to add order");
    }
    exit();
}

// Handling form submission for updating an order
if (isset($_POST['update_order'])) {
    $id = $_POST['order_id'];
    $customer_id = $_POST['customer_id'];
    $order_details = $_POST['order_details'];
    if (updateOrder($conn, $id, $customer_id, $order_details)) {
        header("Location: ../index.php?message=Order updated successfully");
    } else {
        header("Location: ../index.php?error=Failed to update order");
    }
    exit();
}

// Handling form submission for deleting an order
if (isset($_POST['deleteOrderBtn'])) {
    $order_id = $_POST['order_id'];
    if (deleteOrder($conn, $order_id)) {
        header("Location: ../index.php?message=Order deleted successfully");
    } else {
        header("Location: ../index.php?error=Failed to delete order");
    }
    exit();
}
?>
