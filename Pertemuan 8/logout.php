<?php
session_start();
session_unset();
session_destroy();
session_start();
$_SESSION['danger'] = "You have logged out.";
header("Location: auth/login.php");
