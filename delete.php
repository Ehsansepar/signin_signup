<?php
$username = "sepaehs";
$password = "onuq7256";
$database = "sepaehs_info";

$mysqli = new mysqli("mysql-sepaehs.alwaysdata.net", $username, $password, $database);

if (isset($_POST['username'])) {
    $username_to_delete = $_POST['username'];
    $query = "DELETE FROM alwaysdata_connection WHERE username='$username_to_delete'";
    if ($mysqli->query($query) === TRUE) {
        echo "Account deleted successfully";
    } else {
        echo "Error deleting account: " . $mysqli->error;
    }
}
$mysqli->close();
?>