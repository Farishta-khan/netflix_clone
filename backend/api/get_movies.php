<?php
include("../config/db.php");

$result = $conn->query("SELECT * FROM movies");

$movies = [];

while ($row = $result->fetch_assoc()) {
    $movies[] = $row;
}

response("success", "Movies fetched successfully", $movies);
?>