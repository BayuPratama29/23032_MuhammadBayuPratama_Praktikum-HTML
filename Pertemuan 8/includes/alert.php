<?php
session_start();
if (isset($_SESSION['success'])) {
    echo '<div class="alert alert-success">'.$_SESSION['success'].'</div>';
    unset($_SESSION['success']);
}
if (isset($_SESSION['danger'])) {
    echo '<div class="alert alert-danger">'.$_SESSION['danger'].'</div>';
    unset($_SESSION['danger']);
}
?>