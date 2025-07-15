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

// Form Submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];

    $sql = "INSERT INTO employees (name, email) VALUES ('$name', '$email')";

    if ($conn->query($sql) === TRUE) {
        echo "Data inserted successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<h2>Employee Form</h2>
<form method="post">
  Name: <input type="text" name="name" required><br><br>
  Email: <input type="email" name="email" required><br><br>
  <input type="submit" value="Submit">
</form>
