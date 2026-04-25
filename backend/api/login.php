<?php
session_start();
include("../config/db.php");

// CHECK INPUTS
if (!isset($_POST['email'], $_POST['password'])) {
    response("error", "Missing fields");
}

$email = $_POST['email'];
$password = $_POST['password'];

// FIND USER
$result = $conn->query("SELECT * FROM users WHERE email='$email'");

if ($result->num_rows == 0) {
    response("error", "User not found");
}

$user = $result->fetch_assoc();

// VERIFY PASSWORD
if (!password_verify($password, $user['password'])) {
    response("error", "Wrong password");
}

// STORE SESSION (IMPORTANT PART)
$_SESSION['user'] = [
    "id" => $user['id'],
    "name" => $user['name'],
    "email" => $user['email']
];

// SUCCESS RESPONSE
response("success", "Login successful", $_SESSION['user']);
?>