<?php
include('koneksi.php');

// Tangkap data
$nama_mhs = $_POST["nama_mhs"];
$nim = $_POST["nim_mhs"];
$kelas = $_POST["nama_kelas"];
$semester = $_POST["smt"];
$matkul = isset($_POST["nama_matkul"]) ? $_POST["nama_matkul"] : array();
$nilai_harian = isset($_POST["nilai_harian"]) ? $_POST["nilai_harian"] : array();
$nilai_uts = isset($_POST["nilai_uts"]) ? $_POST["nilai_uts"] : array();
$nilai_uas = isset($_POST["nilai_uas"]) ? $_POST["nilai_uas"] : array();
$huruf = isset($_POST["nilai_huruf"]) ? $_POST["nilai_huruf"] : array();
$huruf = $_POST["nilai_huruf"];
$sakit = $_POST["sakit"];
$izin = $_POST["izin"];
$alfa = $_POST["alfa"];
$count = count($matkul);
$id_tampil = mt_rand(1000, 2000);

// Query insert
$sql = "INSERT INTO nilaie(nama_mhs, nim_mhs, nama_kelas, smt, nama_matkul, nilai_harian, nilai_uts, nilai_uas, nilai_huruf, sakit, izin, alfa, id_tampil) VALUES ";

// Perulangan untuk menambahkan nilai ke dalam query
for ($i = 0; $i < $count; $i++) {
    $nilai_angka = ($nilai_harian[$i] + $nilai_uts[$i] + $nilai_uas[$i]) / 3;
    $sql .= "('$nama_mhs', '$nim', '$kelas', '$semester', '{$matkul[$i]}', '{$nilai_harian[$i]}', '{$nilai_uts[$i]}', '{$nilai_uas[$i]}', '{$huruf[$i]}', '$sakit', '$izin', '$alfa', '$id_tampil'),";
}

// Hapus tanda koma (,) di akhir query
$sql = rtrim($sql, ",");

// Eksekusi query insert
$insert = mysqli_query($koneksi, $sql);

// Cek hasil eksekusi query
if ($insert) {
    // Hitung dan jumlahkan total nilai
    $hitung = "SELECT SUM(nama_matkul) AS totalmapel, SUM((nilai_harian + nilai_uts + nilai_uas) / 3) AS totalnilai FROM nilaie WHERE id_tampil = '$id_tampil' GROUP BY id_tampil";
    $vhitung = mysqli_query($koneksi, $hitung);
    $hasil = mysqli_fetch_assoc($vhitung);
    $totalnilai = $hasil['totalnilai'];
    $totalmapel = $hasil['totalmapel'];

    // Hitung IPK (rata-rata nilai)
    $ipk = $totalmapel != 0 ? $totalnilai / $totalmapel : 0;
    echo "<script>alert('Data berhasil ditambah.');window.location='tampil_nilai.php';</script>";

    // Tampilkan hasil
} else {
    echo "Gagal menambahkan nilai";
}

?>

