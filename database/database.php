<?php
$conn = mysqli_connect("localhost", "root", "", "flixora");
if (!$conn) {
    die("Koneksi database gagal");
}