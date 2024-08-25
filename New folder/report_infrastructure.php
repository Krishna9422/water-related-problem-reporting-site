<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database configuration
    $servername = "localhost";
    $username = "your_database_username";
    $password = "your_database_password";
    $dbname = "water_management";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get form data
    $reporter_name = $_POST['reporter_name'];
    $contact_email = $_POST['contact_email'];
    $contact_phone = $_POST['contact_phone'];
    $issue_location = $_POST['issue_location'];
    $infrastructure_description = $_POST['infrastructure_description'];
    $issue_type = $_POST['issue_type'];
    $issue_severity = $_POST['issue_severity']; // New field
    $issue_datetime = $_POST['issue_datetime'];

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO water_infrastructure_issues (reporter_name, contact_email, contact_phone, issue_location, infrastructure_description, issue_type, issue_severity, issue_datetime) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssss", $reporter_name, $contact_email, $contact_phone, $issue_location, $infrastructure_description, $issue_type, $issue_severity, $issue_datetime);

    // Execute the query
    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
