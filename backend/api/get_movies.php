<?php
include("../config/db.php");

header("Content-Type: application/json");

$result = $conn->query("SELECT * FROM movies");

$movies = [];

while($row = $result->fetch_assoc()) {

    // FORCE CLEAN PATH (NO RELATIVE ISSUES)
    $image = "http://localhost/netflix_clone/backend/uploads/" . trim($row["thumbnail"]);

    $movies[] = [
        "id" => $row["id"],
        "title" => $row["title"],
        "description" => $row["description"],
        "image" => $image,
        "video_url" => $row["video_url"]
    ];
}

echo json_encode($movies);
?>