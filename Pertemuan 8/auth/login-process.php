<?php
if (isset($_POST['login'])) {
    require '../config/koneksi.php';
    session_start();

    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $koneksi->prepare("SELECT id, name, password FROM user WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['name'] = $user['name'];
        $_SESSION['success'] = "Welcome back, {$user['name']}!";
        header("Location: ../index.php");
    } else {
        $_SESSION['danger'] = "Login failed. Check email and password.";
        header("Location: login.php");
    }
}
