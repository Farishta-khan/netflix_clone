<?php
include("../config/db.php");

echo json_encode([
    "status" => "success",
    "message" => "DB connected successfully"
]);

echo "DB CONNECTED SUCCESSFULLY";
?>