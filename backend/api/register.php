<?php
include("../config/db.php");

header("Content-Type: application/json");

$data = json_decode(file_get_contents("php://input"), true);

$name = $data['name'] ?? null;
$email = $data['email'] ?? null;
$password = $data['password'] ?? null;

if(!$name || !$email || !$password){
    echo json_encode([
        "success" => false,
        "message" => "Missing fields"
    ]);
    exit;
}

// check duplicate email
$check = $conn->query("SELECT id FROM users WHERE email='$email'");
if($check->num_rows > 0){
    echo json_encode([
        "success" => false,
        "message" => "Email already exists"
    ]);
    exit;
}

// insert user
$conn->query("INSERT INTO users (name, email, password) 
VALUES ('$name', '$email', '$password')");

echo json_encode([
    "success" => true,
    "message" => "User registered"
]);
?>