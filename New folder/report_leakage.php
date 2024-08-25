<?php
// Database connection parameters
$servername = "localhost";
$username = "root"; // Default XAMPP username
$password = ""; // Default XAMPP password (empty)
$dbname = "water_leakage_reports";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $reporter_name = $_POST['reporter_name'];
    $contact_email = $_POST['contact_email'];
    $contact_phone = $_POST['contact_phone'];
    $leakage_location = $_POST['leakage_location'];
    $leakage_description = $_POST['leakage_description'];
    $leakage_severity = $_POST['leakage_severity'];
    $leakage_datetime = $_POST['leakage_datetime'];

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO leakage_reports (reporter_name, contact_email, contact_phone, leakage_location, leakage_description, leakage_severity, leakage_datetime) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $reporter_name, $contact_email, $contact_phone, $leakage_location, $leakage_description, $leakage_severity, $leakage_datetime);

    // Execute the statement
    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request method";
}
?>
