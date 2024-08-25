<?php
// Database connection parameters
$servername = "localhost";
$username = "root"; // Default XAMPP username
$password = ""; // Default XAMPP password (empty)
$dbname = "water_scarcity_reports";

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
    $scarcity_location = $_POST['scarcity_location'];
    $scarcity_description = $_POST['scarcity_description'];
    $scarcity_severity = $_POST['scarcity_severity'];
    $scarcity_datetime = $_POST['scarcity_datetime'];

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO scarcity_reports (reporter_name, contact_email, contact_phone, scarcity_location, scarcity_description, scarcity_severity, scarcity_datetime) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $reporter_name, $contact_email, $contact_phone, $scarcity_location, $scarcity_description, $scarcity_severity, $scarcity_datetime);

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
