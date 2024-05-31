<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "atsiskaitymui";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Delete entry
$sql = "DELETE FROM forma WHERE Vartotojo_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $_GET['id']);
$stmt->execute();

// Redirect to previous page
header("Location: test.php");

$conn->close();
?>