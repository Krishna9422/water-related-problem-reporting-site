<?php
// Database connection parameters
$servername = "localhost";
$username = "root"; // Default XAMPP username
$password = ""; // Default XAMPP password (empty)
$dbname1 = "water_leakage_reports";
$dbname2 = "water_scarcity_reports";

// Create connection
$conn1 = new mysqli($servername, $username, $password, $dbname1);
$conn2 = new mysqli($servername, $username, $password, $dbname2);

// Check connection
if ($conn1->connect_error) {
    die("Connection to leakage_reports database failed: " . $conn1->connect_error);
}
if ($conn2->connect_error) {
    die("Connection to scarcity_reports database failed: " . $conn2->connect_error);
}

// Handle delete request
if (isset($_POST['delete_leakage'])) {
    $id = $_POST['delete_leakage'];
    $deleteStmt = $conn1->prepare("DELETE FROM leakage_reports WHERE id = ?");
    $deleteStmt->bind_param("i", $id);
    $deleteStmt->execute();
    $deleteStmt->close();
}

if (isset($_POST['delete_scarcity'])) {
    $id = $_POST['delete_scarcity'];
    $deleteStmt = $conn2->prepare("DELETE FROM scarcity_reports WHERE id = ?");
    $deleteStmt->bind_param("i", $id);
    $deleteStmt->execute();
    $deleteStmt->close();
}

// Fetch data from leakage_reports
$leakageReports = $conn1->query("SELECT * FROM leakage_reports");

// Fetch data from scarcity_reports
$scarcityReports = $conn2->query("SELECT * FROM scarcity_reports");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        form {
            display: inline;
        }
        button {
            background-color: #ff4c4c;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            border-radius: 3px;
        }
        button:hover {
            background-color: #ff1c1c;
        }
    </style>
</head>
<body>
    <h1>Leakage Reports</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Reporter Name</th>
            <th>Contact Email</th>
            <th>Contact Phone</th>
            <th>Location</th>
            <th>Description</th>
            <th>Severity</th>
            <th>Date & Time</th>
            <th>Action</th>
        </tr>
        <?php while ($row = $leakageReports->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['reporter_name']; ?></td>
            <td><?php echo $row['contact_email']; ?></td>
            <td><?php echo $row['contact_phone']; ?></td>
            <td><?php echo $row['leakage_location']; ?></td>
            <td><?php echo $row['leakage_description']; ?></td>
            <td><?php echo $row['leakage_severity']; ?></td>
            <td><?php echo $row['leakage_datetime']; ?></td>
            <td>
                <form method="post" action="">
                    <button type="submit" name="delete_leakage" value="<?php echo $row['id']; ?>">Delete</button>
                </form>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>

    <h1>Scarcity Reports</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Reporter Name</th>
            <th>Contact Email</th>
            <th>Contact Phone</th>
            <th>Location</th>
            <th>Description</th>
            <th>Severity</th>
            <th>Date & Time</th>
            <th>Action</th>
        </tr>
        <?php while ($row = $scarcityReports->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['reporter_name']; ?></td>
            <td><?php echo $row['contact_email']; ?></td>
            <td><?php echo $row['contact_phone']; ?></td>
            <td><?php echo $row['scarcity_location']; ?></td>
            <td><?php echo $row['scarcity_description']; ?></td>
            <td><?php echo $row['scarcity_severity']; ?></td>
            <td><?php echo $row['scarcity_datetime']; ?></td>
            <td>
                <form method="post" action="">
                    <button type="submit" name="delete_scarcity" value="<?php echo $row['id']; ?>">Delete</button>
                </form>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>

<?php
// Close connections
$conn1->close();
$conn2->close();
?>
