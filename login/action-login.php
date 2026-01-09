<?php
session_start();

$nickname = $_POST['nickname'] ?? '';
$password = $_POST['password'] ?? '';

if ($nickname === '' || $password === '') {
    header("Location: ../main/landingPage.html");
    exit;
}

require_once 'check-login.php';