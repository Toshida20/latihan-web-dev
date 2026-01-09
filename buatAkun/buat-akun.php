<?php

$host = "localhost";
$user = "root";
$pass = "";
$db   = "flixora";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$nickname = trim($_POST['nickname']);
$email    = trim($_POST['email']);
$password = $_POST['password'];
$no_hp    = trim($_POST['no_hp']);

if (empty($nickname) || empty($email) || empty($password)) {
    echo "Semua field wajib diisi!";
    exit;
}

$password_hash = password_hash($password, PASSWORD_DEFAULT);

$cek = mysqli_query($conn, "SELECT email FROM akun_pengguna WHERE email='$email'");
if (mysqli_num_rows($cek) > 0) {
    echo "Email sudah terdaftar!";
    exit;
}
$query = "INSERT INTO akun_pengguna (nickname, email, password, no_hp) 
          VALUES ('$nickname', '$email', '$password_hash', '$no_hp')";

if (mysqli_query($conn, $query)) {
    echo "Akun berhasil dibuat!";
} else {
    echo "Gagal membuat akun: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
