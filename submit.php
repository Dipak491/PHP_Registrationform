<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind parameters
$stmt = $conn->prepare("INSERT INTO admission_form (
    fullName,
    dob,
    currentAddress,
    permanentAddress,
    status,
    gender,
    email,
    phone
) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

$stmt->bind_param("ssssssss",
    $fullName,
    $dob,
    $currentAddress,
    $permanentAddress,
    $status,
    $gender,
    $email,
    $phone
);

// Set parameters and execute
$fullName = $_POST['fullName'];
$dob = $_POST['dob'];
$currentAddress = $_POST['currentAddress'];
$permanentAddress = $_POST['permanentAddress'];
$status = $_POST['status'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$phone = $_POST['phone'];

$stmt->execute();

echo "New record inserted successfully";

$stmt->close();
$conn->close();
?>
