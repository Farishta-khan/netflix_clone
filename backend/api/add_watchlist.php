<?php
session_start();
include("../config/db.php");

if (!isset($_SESSION['user'])) {
    response("error", "Not logged in");
}

if (!isset($_POST['movie_id'])) {
    response("error", "Movie ID required");
}

$user_id = $_SESSION['user']['id'];
$movie_id = $_POST['movie_id'];

// prevent duplicates
$check = $conn->query("SELECT * FROM watchlist WHERE user_id=$user_id AND movie_id=$movie_id");

if ($check->num_rows > 0) {
    response("error", "Already in watchlist");
}

$conn->query("INSERT INTO watchlist (user_id, movie_id)
VALUES ($user_id, $movie_id)");

response("success", "Added to watchlist");
?>