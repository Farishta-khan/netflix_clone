<?php

header("Content-Type: application/json");

// DATABASE CONNECTION
$host = "localhost";
$user = "root";
$pass = "";
$db   = "netflix_clone";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {

    echo json_encode([
        "status" => "error",
        "message" => "Database connection failed"
    ]);
    exit;
}

// GLOBAL RESPONSE FUNCTION
function response($status, $message, $data = null) {
    echo json_encode([
        "status" => $status,
        "message" => $message,
        "data" => $data
    ]);
    exit;
    die(json_encode([
        "status" => "error",
        "message" => "DB connection failed"
    ]));
}

?>