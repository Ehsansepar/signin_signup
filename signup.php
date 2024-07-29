<?php
// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get the username, password, and repassword from the form
  $username = $_POST["username"];
  $password = $_POST["password"];
  $repassword = $_POST["repassword"];

  // Check if the passwords match
  if ($password != $repassword) {
    $error_pass = "Passwords do not match";
  } else {
    // Connect to the database
    $conn = mysqli_connect("mysql-sepaehs.alwaysdata.net", "sepaehs", "onuq7256", "sepaehs_info");

    // Check connection
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }

    // Check if the username already exists
    $query = "SELECT * FROM alwaysdata_connection WHERE username='$username'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
      $error_username = "Username already exists";
    } else {
      // Insert the new user into the database
      $query = "INSERT INTO alwaysdata_connection (username, password) VALUES ('$username', '$password')";
      if (mysqli_query($conn, $query)) {
        header("Location: extra_staf/loading_page_when_signup.html");
      } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
      }
    }

    mysqli_close($conn);
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>

    <style>

body {
    background-image: url(background_photo.jpg);
    background-size: 100%;
    background-repeat: no-repeat;
    /* font-weight: bold; */
    font-family: Arial, Helvetica, sans-serif;
}

h1 {
    margin-right: auto; margin-left: auto;
    text-align: center;
    padding-top: 50px;
    padding-bottom: 50px;
    font-weight: bold;
    color: white;

}
.email, .password {
    width: 250px;
    color: white;
    text-align: left;
    border-top-style: none;
    border-left-style: none;
    border-right-style: none;
    padding-bottom: 6px;
    border-color: rgb(197, 197, 197);
    font-size: medium;


        background: transparent;
        backdrop-filter: blur(60px) brightness(100%);
}

::placeholder {
    margin-bottom: 50px;
    padding-left: 5px;
    color: white;
}
.continer {
    width: 22.5%;
    height: 500px;
    margin-right: auto; margin-left: auto;
    border-radius: 20px;
    border-color: aliceblue;
    margin-top: 100px;
    border: 1px solid black;
    background-color: white;
    /* position: absolute; */


        background: transparent;
        backdrop-filter: blur(6px) brightness(100%);
        border: none;
}
.form {
    height: fit-content;
    width: fit-content;
    margin-right: auto; margin-left: auto;
    text-align: left;
    /* position: relative; */
}

.button {
    background-color: rgb(185, 195, 196);
    margin-top: 40px;
    width: 100%;
    border: none;
    padding: 10px 20px;
    font-size: 16px;
    color: white; /* or any other color you prefer */
    font-weight: bold;
    font-family: Arial, Helvetica, sans-serif;
    cursor: pointer;
    border-radius: 10px;

    transition: 4s ease-in-out;
}
.button:hover {
    background-color: red;
    /* height: 60px; */
    transition: 5s;

    /* transform: 120deg; */
    transform: rotate(1440deg);
}

.Forget, a {
    margin-right: auto; margin-left: auto;
    font-size: smaller;
    margin-top: 50px;
    /* color: gray; */
    text-align: center;
    margin-bottom: 0px;
}

p {
    color: white;
}
.signup {
    margin-right: auto; margin-left: auto;
    font-size: smaller;
    text-align: center;
    margin-bottom: 0px;
}

.password_email_error {
        /* padding-left: 80px; */
        text-align: center;
        font-weight: bold;
    }


    .checkbox-show-pass {
    color: white;
    margin-top: 10px;
}

.password-verification {
    font-size: 14.5px;
}

/* ******************************************************************************************* */

@media only screen and (max-width: 500px) {

    body {
        background-image: url(background_photo.jpg);
        background-repeat:no-repeat;
        background-size:contain;
        background-position:center;
        background-position: center center;
        background-attachment: fixed;
        background-size: cover;
    }

    h1 {
        color: white;
        font-size: 55px;
    }

    .continer {
        width: 80%;
        height: 600px;
        margin-right: auto; margin-left: auto;
        border-radius: 20px;
        border-color: aliceblue;
        margin-top: 50px;
        border: 1px solid black;
        background-color: white;
        /* position: absolute; */
        background: transparent;
        backdrop-filter: blur(3px) brightness(100%);
        border: none;
    }

    .email, .password { 
        background: transparent;
        backdrop-filter: blur(2px) brightness(100%);
        border-bottom-color: white;
    }

    ::placeholder {
        color: white;
    }

    .Forget, .signup {
        color: white;
    }

    .Forget, .signup, a {
        font-size: 15px;
    }


    .password_email_error {
        padding-left: 50px;
        font-weight: bold;
    }

}

    </style>


</head>
<body>
    <div class="continer">
        <h1>Sign Up</h1>
        <?php if (isset($error_pass)) { echo "<p class='password_email_error' style='color:red;'>$error_pass</p>"; } ?>
        <?php if (isset($error_username)) { echo "<p class='password_email_error' style='color:red;'>$error_username</p>"; } ?>

        <div class="form">
        <form action="signup.php" method="post">
            <input class="email" type="text" name="username" placeholder="Username" required><br><br>
            <input class="password" id="password" type="password" name="password" placeholder="Password" required><br><br>
            <input class="password" id="repassword" type="password" name="repassword" placeholder="Re-enter Password" required><br><br>

                    <p class="password-verification" id="password-verification"></p>
                    

            <div class="checkbox-show-pass">
                    <input type="checkbox" id="show-password">
                    <label for="show-password">Show password</label>
                </div>

            <input class="button" type="submit" value="Sign Up">
        </form>
        </div>
    </div>

    <script>

const passwordInput = document.getElementById('password');
    const repasswordInput = document.getElementById('repassword');
    const showPasswordCheckbox = document.getElementById('show-password');
    const passwordVerificationElement = document.getElementById('password-verification');

    showPasswordCheckbox.addEventListener('click', () => {
      if (showPasswordCheckbox.checked) {
        passwordInput.type = 'text';
        repasswordInput.type = 'text';
      } else {
        passwordInput.type = 'password';
        repasswordInput.type = 'password';
      }
    });

    passwordInput.addEventListener('input', () => {
      const passwordValue = passwordInput.value;
      const repasswordValue = repasswordInput.value;
      if (passwordValue !== repasswordValue) {
        passwordVerificationElement.textContent = 'Passwords do not match';
        passwordVerificationElement.style.color = 'red';
      } else if (passwordValue.length < 8) {
        passwordVerificationElement.textContent = 'Password is too short (min 8 characters)';
        passwordVerificationElement.style.color = 'red';
      } else {
        passwordVerificationElement.textContent = 'Password is valid';
        passwordVerificationElement.style.color = 'green';
      }
    });

    repasswordInput.addEventListener('input', () => {
      const passwordValue = passwordInput.value;
      const repasswordValue = repasswordInput.value;
      if (passwordValue !== repasswordValue) {
        passwordVerificationElement.textContent = 'Passwords do not match';
        passwordVerificationElement.style.color = 'red';
      } else if (passwordValue.length < 8) {
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