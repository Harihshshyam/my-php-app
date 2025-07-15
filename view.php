<?php
$host = "project-db2.cdqks2q4gnxc.ap-south-1.rds.amazonaws.com";
$dbname = "company";
$username = "admin";
$password = "MyStrongPass123";

// Connect to DB
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query("SELECT * FROM employees");

if ($result->num_rows > 0) {
    echo "<h2>Employee List</h2>";
    echo "<table border='1'>
            <tr>
                <th>ID</th><th>Name</th><th>Email</th>
            </tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>".$row["id"]."</td>
                <td>".$row["name"]."</td>
                <td>".$row["email"]."</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No records found.";
}

$conn->close();
?>
