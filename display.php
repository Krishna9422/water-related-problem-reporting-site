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

// Fetch data from the database
$sql = "SELECT * FROM users";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display User Data</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Registered Users</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Birth Date</th>
            <th>Gender</th>
            <th>Address</th>
            <th>Address Line 2</th>
            <th>Country</th>
            <th>City</th>
            <th>Region</th>
            <th>Postal Code</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["id"] . "</td>
                        <td>" . $row["fullname"] . "</td>
                        <td>" . $row["email"] . "</td>
                        <td>" . $row["phone"] . "</td>
                        <td>" . $row["birthdate"] . "</td>
                        <td>" . $row["gender"] . "</td>
                        <td>" . $row["address"] . "</td>
                        <td>" . $row["address_line2"] . "</td>
                        <td>" . $row["country"] . "</td>
                        <td>" . $row["city"] . "</td>
                        <td>" . $row["region"] . "</td>
                        <td>" . $row["postal_code"] . "</td>
                    </tr>";
            }
        } else {
            echo "<tr><td colspan='12'>No records found</td></tr>";
        }
        $conn->close();
        ?>
    </table>
</body>
</html>
