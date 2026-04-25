<?php
include("../config/db.php");

echo json_encode([
    "status" => "success",
    "message" => "DB connected successfully"
]);
?>