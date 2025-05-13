<?php
if (isset($_POST['register'])) {
    require '../config/koneksi.php';
    session_start();

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm = $_POST['confirm_password'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['danger'] = "Invalid email format";
        header("Location: register.php");
        exit;
    }

    if ($password !== $confirm) {
        $_SESSION['danger'] = "Password doesn't match";
        header("Location: register.php");
        exit;
    }

    $stmt = $koneksi->prepare("SELECT id FROM user WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $_SESSION['danger'] = "Email already registered";
        header("Location: register.php");
        exit;
    }

    $hashed = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $koneksi->prepare("INSERT INTO user (name, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $hashed);
    $stmt->execute();

    $_SESSION['success'] = "Registration successful. Please login.";
    header("Location: login.php");
}