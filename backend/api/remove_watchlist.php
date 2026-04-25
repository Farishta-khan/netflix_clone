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

$conn->query("
    DELETE FROM watchlist 
    WHERE user_id=$user_id AND movie_id=$movie_id
");

response("success", "Removed from watchlist");
?>