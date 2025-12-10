<?php
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = $_POST['password'];
    $role = $conn->real_escape_string($_POST['role']);

    $sql = "INSERT INTO user (name, email, password, role) VALUES ('$name', '$email', '$password', '$role')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful! <a href='Login_Register.html'>Login here</a>";
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>
