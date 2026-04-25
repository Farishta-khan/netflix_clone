<?php
session_start();
include("../config/db.php");

if (!isset($_SESSION['user'])) {
    response("error", "Not logged in");
}

$user_id = $_SESSION['user']['id'];

$result = $conn->query("
    SELECT movies.* 
    FROM watchlist 
    JOIN movies ON watchlist.movie_id = movies.id 
    WHERE watchlist.user_id = $user_id
");

$movies = [];

while ($row = $result->fetch_assoc()) {
    $movies[] = $row;
}

response("success", "Watchlist fetched", $movies);
?>