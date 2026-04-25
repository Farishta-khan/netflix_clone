<?php
include("../config/db.php");

header("Content-Type: application/json");

$data = json_decode(file_get_contents("php://input"), true);

$email = $data['email'] ?? '';
$password = $data['password'] ?? '';

if($email == '' || $password == ''){
    echo json_encode([
        "success" => false,
        "message" => "Email and password required"
    ]);
    exit;
}

// SAFE QUERY (basic level)
$email = $conn->real_escape_string($email);
$password = $conn->real_escape_string($password);

$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
$result = $conn->query($sql);

if($result && $result->num_rows > 0){

    $user = $result->fetch_assoc();

    echo json_encode([
        "success" => true,
        "user" => [
            "id" => $user['id'],
            "name" => $user['name'],
            "email" => $user['email']
        ]
    ]);

} else {

    echo json_encode([
        "success" => false,
        "message" => "Invalid email or password"
    ]);
}
?>