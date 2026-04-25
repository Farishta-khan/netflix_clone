<?php

$host = "localhost";
$user = "root";
$pass = "";
$db   = "netflix_clone";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die(json_encode([
        "status" => "error",
        "message" => "DB connection failed"
    ]));
}

?>