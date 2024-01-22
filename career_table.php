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

// Retrieve form data from POST request
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$skills = $_POST['skills'];
$education = $_POST['education'];
$disability = $_POST['disability'];
$interaction = $_POST['interaction'];
$freeTime = $_POST['freeTime'];

// SQL query to insert form data into the table
$sql = "INSERT INTO career_guidance_data (name, email, phone, skills, education, disability, interaction, freeTime)
        VALUES ('$name', '$email', '$phone', '$skills', '$education', '$disability', '$interaction', '$freeTime')";

if ($conn->query($sql) === TRUE) {
    echo "$name,Applied successfully!,we will  call you as soon as possible ";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
