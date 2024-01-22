<?php
$servername = "localhost";
$username = "fabrice";
$password = "fabrice123";
$dbname = "pjoblink";
$port = 3307;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to handle registration and provide feedback
function registerAdmin($conn) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $location = $_POST['location'];
        $telephone = $_POST['telephone'];
        $adminCode = $_POST['adminCode'];
        $userRole = $_POST['userRole'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $sql = "INSERT INTO padminregtable (name, email, district_location, telephone_number, admin_code, user_role, password) 
                VALUES ('$name', '$email', '$location', '$telephone', '$adminCode', '$userRole', '$password')";

        if ($conn->query($sql) === TRUE) {
            echo "<div class='feedback success-feedback'>Account created successfully. You can now <a href='plogin.html'>login</a>.</div>";
        } else {
            echo "<div class='feedback error-feedback'>Error: " . $sql . "<br>" . $conn->error . "</div>";
        }
    }
}

// Register the admin
registerAdmin($conn);

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Admin Account</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            margin: auto;
        }

        h2 {
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
        }

        input, select {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            display: inline-block;
        }

        .password-container {
            position: relative;
        }

        #password, #confirmPassword, #adminCodeInput {
            width: 100%;
        }

        .toggle-password {
            position: absolute;
            top: 50%;
            right: 5px;
            transform: translateY(-50%);
            cursor: pointer;
            color: #777;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
            border: none;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .error-message {
            color: red;
            margin-bottom: 10px;
        }

        .feedback {
            text-align: center;
            margin-top: 20px;
            padding: 10px;
            border-radius: 4px;
        }

        .success-feedback {
            background-color: #4caf50;
            color: #fff;
        }

        .error-feedback {
            background-color: #ff3333;
            color: #fff;
        }

        #login-link {
            text-decoration: none;
            color: black;
            font-weight: bold;
            border-bottom: 1px solid black;
        }

        #login-sentence {
            font-size: 14px;
            font-family: 'Times New Roman', serif;
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <form id="adminRegistrationForm" method="post">
        <h2>Create Admin Account</h2>

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="location">District Location:</label>
        <input type="text" id="location" name="location" required>

        <label for="telephone">Telephone Number:</label>
        <input type="tel" id="telephone" name="telephone" pattern="07[238]\d{7}" placeholder="e.g., 078*******" required>

        <label for="adminCodeInput" style="display: none;">Admin Code:</label>
        <input type="text" id="adminCodeInput" name="adminCode" value="admin1" style="display: none;">

        <label for="userRole">User Role:</label>
        <select id="userRole" name="userRole" required>
            <option value="admin">Admin</option>
        </select>

        <label for="password">Password:</label>
        <div class="password-container">
            <input type="password" id="password" name="password" required>
            <span class="toggle-password" onclick="togglePassword('password')">👁️</span>
        </div>

        <label for="confirmPassword">Confirm Password:</label>
        <div class="password-container">
            <input type="password" id="confirmPassword" name="confirmPassword" required>
            <span class="toggle-password" onclick="togglePassword('confirmPassword')">👁️</span>
        </div>

        <div class="error-message" id="passwordError"></div>

        <input type="submit" value="Create Admin Account">

        <p id="login-sentence">Already have an account? <a href="plogin.html" id="login-link">Login</a></p>
    </form>

    <script>
        function togglePassword(inputId) {
            var passwordInput = document.getElementById(inputId);
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
            } else {
                passwordInput.type = 'password';
            }
        }

        document.getElementById('adminRegistrationForm').addEventListener('submit', function (event) {
            // Basic client-side validation
            var password = document.getElementById('password').value;
            var confirmPassword = document.getElementById('confirmPassword').value;
            var adminCode = document.getElementById('adminCodeInput').value;

            if (password !== confirmPassword) {
                event.preventDefault(); // Prevent form submission
                document.getElementById('passwordError').textContent = 'Passwords do not match';
            }

            if (userRole.value === 'admin' && adminCode !== 'admin1') {
                event.preventDefault(); // Prevent form submission
                alert('Invalid admin code. Admin account creation not allowed.');
            }
        });
    </script>
</body>
</html>
