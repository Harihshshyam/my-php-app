<?php
$host = "project-db2.cdqks2q4gnxc.ap-south-1.rds.amazonaws.com";
$dbname = "company";
$username = "admin";
$password = "MyStrongPass123";

$conn = new mysqli($host, $username, $password, $dbname);

// Get current data
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $id = $_GET["id"];
    $result = $conn->query("SELECT * FROM employees WHERE id = $id");
    $row = $result->fetch_assoc();
}

// Save update
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $conn->query("UPDATE employees SET name='$name', email='$email' WHERE id=$id");
    echo "Record updated. <a href='view.php'>Back</a>";
    exit;
}
?>

<h2>Edit Employee</h2>
<form method="post">
  <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
  Name: <input type="text" name="name" value="<?php echo $row['name']; ?>"><br><br>
  Email: <input type="email" name="email" value="<?php echo $row['email']; ?>"><br><br>
  <input type="submit" value="Update">
</form>
