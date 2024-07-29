

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>
    <div class="continer">
        <h1>Login
        </h1>
        <div class="form">
        <form action="login.php" method="post">
            <!-- <label class="text" for="email">Email</label><br> -->
            <input type="text" class="email" name="email" id="email" placeholder="Username" required>
            <br><br>
            <!-- <label class="text" for="password">Password</label><br> -->
            <input type="password" class="password" name="password" id="password" placeholder="Password" required><br>

                    <p class="password-verification" id="password-verification"></p>

                    <div class="checkbox-show-pass">
                    <input type="checkbox" id="show-password">
                    <label for="show-password">Show password</label>
                    </div>


            <!-- <input type="submit" value=""> -->
            <input class="button" type="submit" value="login">
            <!-- <button type="submit" class="button">Login</button> -->

            <p class="Forget">Forget <a href="#">Password</a></p>
            <p class="signup">Don't have an account? <a href="signup.php">Sign Up</a></p>
        </div>

    </div>

        </form>


        <script>
            // for showing password 
                const passwordInput = document.getElementById('password');
                const showPasswordCheckbox = document.getElementById('show-password');
                const passwordVerificationElement = document.getElementById('password-verification');

                showPasswordCheckbox.addEventListener('click', () => {
                if (showPasswordCheckbox.checked) {
                    passwordInput.type = 'text';
                } else {
                    passwordInput.type = 'password';
                }
                }); 

                passwordInput.addEventListener('input', () => {
                const passwordValue = passwordInput.value;
                if (passwordValue.length < 8) {
                    passwordVerificationElement.textContent = 'Password is too short (min 8 characters)';
                    passwordVerificationElement.style.color = 'red';
                } else {
                    passwordVerificationElement.textContent = 'Password is valid';
                    passwordVerificationElement.style.color = 'green';
                }
                });
                
        </script>
</body>
</html>