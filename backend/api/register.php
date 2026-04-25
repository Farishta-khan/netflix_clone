<?php
include("../config/db.php");

if (!isset($_POST['name'], $_POST['email'], $_POST['password'])) {
    response("error", "Missing fields");
}

$name = $_POST['name'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

// CHECK EXISTING USER
$check = $conn->query("SELECT id FROM users WHERE email='$email'");

if ($check->num_rows > 0) {
    response("error", "User already exists");
}

// INSERT USER
$conn->query("INSERT INTO users (name, email, password)
VALUES ('$name', '$email', '$password')");

response("success", "User registered successfully");

?>
<?php
include("../config/db.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $check = $conn->query("SELECT * FROM users WHERE email='$email'");

    if ($check->num_rows > 0) {
        echo json_encode(["status" => "error", "message" => "Email already exists"]);
        exit;
    }

    $sql = "INSERT INTO users (name, email, password)
            VALUES ('$name', '$email', '$password')";

    if ($conn->query($sql)) {
        echo json_encode(["status" => "success", "message" => "User registered"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Registration failed"]);
    }
}

?>