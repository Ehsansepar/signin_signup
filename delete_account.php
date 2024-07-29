<?php 
    $username = $_GET['username']
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Account</title>
</head>
<body>
    <div class="continer">
        <h1>Delete Account
        </h1>
        <form action="delete_account_process.php" method="post">
            <label for="password">Enter your password to confirm:</label><br>
            <input type="password" name="password" id="password" required><br><br>
            <input type="submit" value="Delete Account">
        </form>
    </div>

</body>
</html>