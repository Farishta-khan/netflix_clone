<?php
session_start();
include("../config/db.php");

if (!isset($_SESSION['user'])) {
    response("error", "Not logged in");
}

response("success", "User data", $_SESSION['user']);
?>