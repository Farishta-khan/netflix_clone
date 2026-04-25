<?php
include("../config/db.php");

if (!isset($_POST['title'], $_POST['description'], $_POST['thumbnail'], $_POST['video_url'])) {
    response("error", "Missing fields");
}

$title = $_POST['title'];
$description = $_POST['description'];
$thumbnail = $_POST['thumbnail'];
$video_url = $_POST['video_url'];

$conn->query("INSERT INTO movies (title, description, thumbnail, video_url)
VALUES ('$title', '$description', '$thumbnail', '$video_url')");

response("success", "Movie added successfully");
?>