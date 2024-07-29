<?php
session_start(); // Start the session

// Connect to the database
$servername = "mysql-sepaehs.alwaysdata.net";
$dbname = "sepaehs_info";
$conn = new mysqli($servername, "sepaehs", "onuq7256", $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the password from the form
$password = $_POST["password"];

// Get the username from the session
$username = $_SESSION["username"];

// Prepare the query to prevent SQL injection
$stmt = $conn->prepare("DELETE FROM alwaysdata_connection WHERE username=? AND password=?");
$stmt->bind_param("ss", $username, $password);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    echo "Account deleted successfully!";
    // You can also redirect the user to a success page or logout
    header("Location: index.php");
    exit;
} else {
    echo "Error deleting account: " . $conn->error;
}

$conn->close();
?>