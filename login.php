<?php
session_start();
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $conn->real_escape_string($_POST['email']);
    $password = $_POST['password'];


    $stmt = $conn->prepare("SELECT * FROM user WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();


        if ($password == $user['password']) {
            $_SESSION['user'] = $user['name'];
            $_SESSION['role'] = $user['role'];


            if ($user['role'] == 'admin') {
                header("Location: Admin_panel.html");
                exit();
            } elseif ($user['role'] == 'patient') {
                header("Location: Patient_panel.html");
                exit();
            } elseif ($user['role'] == 'doctor') {
                header("Location: Doctor_panel.html");
                exit();
            } else {
                echo "Invalid role!";
            }
        } else {
            echo "<script>alert('Invalid password!'); window.location.href='Login_Register.html';</script>";
        }
    } else {
        echo "<script>alert('No user found with this email!'); window.location.href='Login_Register.html';</script>";
    }
}

$conn->close();
?>
