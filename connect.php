<?php

// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test2";

// Data to be inserted (usually this comes from a form submission)
$name = $_POST['name'];
$email = $_POST['email'];
$date = $_POST['date'];
$time = $_POST['time'];
$location = $_POST['location'];
$contact = $_POST['contact'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO reg (name, email, date, time, location, contact) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssi", $name, $email, $date, $time, $location, $contact);

// Execute the statement
if ($stmt->execute()) {
    echo "Registration successfully completed.";
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$conn->close();

?>




