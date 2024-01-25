<?php
// Koneksi ke database

$host = 'localhost';
$db = 'nama_database';
$user = 'username';
$pass = 'password';

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die('Koneksi gagal: ' . mysqli_connect_error());
}

$nama_mhs_id = $_GET['id'];

$query = "SELECT nim_mhs FROM nilai WHERE id_nilai = '$nama_mhs_id'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$nim_mhs = $row['nim_mhs'];

echo $nim_mhs;
?>
