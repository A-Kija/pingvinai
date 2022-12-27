<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: http://localhost/pingvinai/login/login.php');
    die;
}