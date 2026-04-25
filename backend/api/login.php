<?php
echo "API is working";
?>
<?php
include("../config/db.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = $conn->query("SELECT * FROM users WHERE email='$email'");

    if ($result->num_rows > 0) {

        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {

            echo json_encode([
                "status" => "success",
                "message" => "Login successful",
                "user" => [
                    "id" => $user['id'],
                    "name" => $user['name'],
                    "email" => $user['email']
                ]
            ]);

        } else {
            echo json_encode(["status" => "error", "message" => "Wrong password"]);
        }

    } else {
        echo json_encode(["status" => "error", "message" => "User not found"]);
    }
}
?>