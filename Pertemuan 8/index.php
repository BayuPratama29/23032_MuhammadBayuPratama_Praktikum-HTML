<?php
session_start();
if (!isset($_SESSION['name'])) {
    $_SESSION['danger'] = "Please login first.";
    header("Location: auth/login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand">My Blog</a>
        <a class="btn btn-danger" href="logout.php">Logout</a>
    </div>
</nav>
<div class="container mt-5">
    <h1>Hello, <?= $_SESSION['name'] ?> 👋</h1>
    <?php include 'includes/alert.php'; ?>
    <p>This is your dashboard.</p>
</div>
</body>
</html>
