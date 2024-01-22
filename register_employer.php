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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Extract form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $location = $_POST['location'];
    $economySector = $_POST['economySector'];
    $telephone = $_POST['telephone'];
    $userRole = $_POST['userRole'];
    $password = $_POST['password'];

    // Perform basic server-side validation
    if (empty($name) || empty($email) || empty($location) || empty($economySector) || empty($telephone) || empty($userRole) || empty($password)) {
        echo 'All fields are required.';
        
    } else {
        
        echo 'Employer account created successfully!';

        
    }
} else {
    
    header('Location: pemployerregister.html');
    exit;
}

?>
