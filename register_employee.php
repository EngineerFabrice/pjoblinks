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
    $educationLevel = $_POST['educationLevel'];
    $telephone = $_POST['telephone'];
    $userRole = $_POST['userRole'];
    $password = $_POST['password'];

    // Perform basic server-side validation
    if (empty($name) || empty($email) || empty($location) || empty($educationLevel) || empty($telephone) || empty($userRole) || empty($password)) {
        echo 'All fields are required.';
        // You may redirect back to the registration form or handle errors accordingly
    } else {
        // If validation passes, you can proceed to create the account
        // In a real-world scenario, you would hash the password before saving it to the database
        // For example: $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Sample code (replace this with your database interactions)
        echo 'Account created successfully!';

        // You may redirect to a success page or perform other actions here
    }
} else {
    // Redirect if accessed directly without submitting the form
    header('Location: pemployeeregister.html');
    exit;
}

?>
