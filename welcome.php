<?php
session_start();

$username = $_GET['username'];
if (!preg_match('/^[a-zA-Z0-9_]+$/', $username)) {
    // Invalid username, redirect to error page
    header('Location: error.php');
    exit;
}

$_SESSION["username"] = $username;

// Generate a CSRF token
$csrf_token = bin2hex(random_bytes(16));
$_SESSION["csrf_token"] = $csrf_token;
?>

<a href="delete_account.php?username=<?php echo $username ?>&csrf_token=<?php echo $csrf_token ?>">Delete Account</a>
?>


<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="welcome_style.css">
        <title>Welcome</title>
    </head>
    <body>

    <h1>fuck you </h1>

        <div class="continer">
            <p>Welcome dear <?php echo $username ?> you finally logged in</p>

            <!-- <form method="GET">
                <button name="deleteaccount" type="submit">Delete Account</button>
            </form> -->
            <a style="color: white;" href="delete_account.php?username=<?php echo $username ?>">Delete Account</a>
        </div>
    
</body>
    </html>