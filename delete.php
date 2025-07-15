<?php
$host = "project-db2.cdqks2q4gnxc.ap-south-1.rds.amazonaws.com";
$dbname = "company";
$username = "admin";
$password = "MyStrongPass123";

$conn = new mysqli($host, $username, $password, $dbname);

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $conn->query("DELETE FROM employees WHERE id = $id");
    echo "Record deleted. <a href='view.php'>Back</a>";
}
?>
