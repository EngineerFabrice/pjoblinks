<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

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

// Function to check login credentials
function checkLogin($conn, $email, $password) {
    $sql = "SELECT * FROM pallregtable WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['user_role'];
    } else {
        return false;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $userRole = checkLogin($conn, $email, $password);

    if ($userRole) {
        if ($userRole === 'employee') {
            header("Location: employee-dashboard.html");
            exit();
        } elseif ($userRole === 'employer') {
            header("Location: employer-dashboard.html");
            exit();
        } else {
            header("Location: padmin-dashboard.html");
            exit();
        }
    } else {
        echo "<script>document.getElementById('loginError').textContent = 'Invalid email or password';</script>";
    }
}

$conn->close();
?>
