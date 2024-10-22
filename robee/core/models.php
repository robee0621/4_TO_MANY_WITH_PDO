<?php
include 'dbconfig.php';

// Bartender Functions

// Function to get all bartenders
function getBartenders($conn) {
    $sql = "SELECT * FROM bartenders";
    $result = $conn->query($sql);
    return $result ? $result->fetch_all(MYSQLI_ASSOC) : []; // Return an empty array if the query fails
}

// Function to get a bartender by ID
function getBartenderById($conn, $id) {
    $stmt = $conn->prepare("SELECT * FROM bartenders WHERE bartender_id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}

// Function to add a bartender
function addBartender($conn, $name) {
    $stmt = $conn->prepare("INSERT INTO bartenders (name) VALUES (?)");
    $stmt->bind_param("s", $name);
    $success = $stmt->execute();
    $stmt->close();
    return $success;
}

// Function to update a bartender
function updateBartender($conn, $id, $name) {
    $stmt = $conn->prepare("UPDATE bartenders SET name = ? WHERE bartender_id = ?");
    $stmt->bind_param("si", $name, $id);
    $success = $stmt->execute();
    $stmt->close();
    return $success;
}

// Function to delete a bartender
function deleteBartender($conn, $id) {
    $stmt = $conn->prepare("DELETE FROM bartenders WHERE bartender_id = ?");
    $stmt->bind_param("i", $id);
    $success = $stmt->execute();
    $stmt->close();
    return $success;
}

// Customer Functions

// Function to get all customers
function getCustomers($conn) {
    $sql = "SELECT * FROM customers";
    $result = $conn->query($sql);
    return $result ? $result->fetch_all(MYSQLI_ASSOC) : []; // Return an empty array if the query fails
}

// Function to get a customer by ID
function getCustomerById($conn, $id) {
    $stmt = $conn->prepare("SELECT * FROM customers WHERE customer_id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}

// Function to add a customer
function addCustomer($conn, $name) {
    $stmt = $conn->prepare("INSERT INTO customers (name) VALUES (?)");
    $stmt->bind_param("s", $name);
    $success = $stmt->execute();
    $stmt->close();
    return $success;
}

// Function to update a customer
function updateCustomer($conn, $id, $name) {
    $stmt = $conn->prepare("UPDATE customers SET name = ? WHERE customer_id = ?");
    $stmt->bind_param("si", $name, $id);
    $success = $stmt->execute();
    $stmt->close();
    return $success;
}

// Function to delete a customer
function deleteCustomer($conn, $id) {
    $stmt = $conn->prepare("DELETE FROM customers WHERE customer_id = ?");
    $stmt->bind_param("i", $id);
    $success = $stmt->execute();
    $stmt->close();
    return $success;
}

// Order Functions

// Function to get all orders
function getOrders($conn) {
    $sql = "SELECT * FROM orders";
    $result = $conn->query($sql);
    return $result ? $result->fetch_all(MYSQLI_ASSOC) : []; // Return an empty array if the query fails
}

// Function to get an order by ID
function getOrderById($conn, $id) {
    $stmt = $conn->prepare("SELECT * FROM orders WHERE order_id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}

// Function to add an order
function addOrder($conn, $customer_id, $order_details) {
    $stmt = $conn->prepare("INSERT INTO orders (customer_id, order_details) VALUES (?, ?)");
    $stmt->bind_param("is", $customer_id, $order_details);
    $success = $stmt->execute();
    $stmt->close();
    return $success;
}

// Function to update an order
function updateOrder($conn, $id, $customer_id, $order_details) {
    $stmt = $conn->prepare("UPDATE orders SET customer_id = ?, order_details = ? WHERE order_id = ?");
    $stmt->bind_param("isi", $customer_id, $order_details, $id);
    $success = $stmt->execute();
    $stmt->close();
    return $success;
}

// Function to delete an order
function deleteOrder($conn, $id) {
    $stmt = $conn->prepare("DELETE FROM orders WHERE order_id = ?");
    $stmt->bind_param("i", $id);
    $success = $stmt->execute();
    $stmt->close();
    return $success;
}
?>
