<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "registration";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $birthdate = $_POST['birthdate'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $address_line2 = $_POST['address_line2'];
    $country = $_POST['country'];
    $city = $_POST['city'];
    $region = $_POST['region'];
    $postal_code = $_POST['postal_code'];

    $sql = "INSERT INTO users (fullname, email, phone, birthdate, gender, address, address_line2, country, city, region, postal_code)
    VALUES ('$fullname', '$email', '$phone', '$birthdate', '$gender', '$address', '$address_line2', '$country', '$city', '$region', '$postal_code')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
