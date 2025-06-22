<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database configuration
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "hotel";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Input validation
    if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['checkin']) || empty($_POST['checkout']) || empty($_POST['guests']) || empty($_POST['event_packages'])) {
        echo "All fields are required!";
        exit();
    }

    // Sanitize inputs
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $checkin = $conn->real_escape_string($_POST['checkin']);
    $checkout = $conn->real_escape_string($_POST['checkout']);
    $guests = (int)$_POST['guests'];
    $event_packages = $conn->real_escape_string($_POST['event_packages']);
    $requests = isset($_POST['requests']) ? $conn->real_escape_string($_POST['requests']) : '';

    // Prepare SQL query with status (default: 'pending')
    $stmt = $conn->prepare("INSERT INTO bookings (name, email, checkin, checkout, guests, event_packages, requests, status) VALUES (?, ?, ?, ?, ?, ?, ?, 'pending')");
    $stmt->bind_param("ssssiis", $name, $email, $checkin, $checkout, $guests, $event_packages, $requests);

    // Execute
    if ($stmt->execute()) {
        echo "Booking submitted! Waiting for admin approval.";
    } else {
        echo "Error: " . $stmt->error;
    }


    $stmt->close();
    $conn->close();
}
?>
