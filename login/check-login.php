<?php
$conn = mysqli_connect("localhost", "root", "", "flixora");
if (!$conn) die("Koneksi gagal");

$stmt = mysqli_prepare($conn,
    "SELECT id_akun, nickname, password FROM akun_pengguna WHERE nickname=?"
);
mysqli_stmt_bind_param($stmt, "s", $nickname);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($user = mysqli_fetch_assoc($result)) {
    if (password_verify($password, $user['password'])) {
        $_SESSION['login'] = true;
        $_SESSION['id_akun'] = $user['id_akun'];
        $_SESSION['nickname'] = $user['nickname'];
        header("Location: ../main/dashboard.html");
        exit;
    }
}

header("Location: ../main/landingPage.html");
exit;