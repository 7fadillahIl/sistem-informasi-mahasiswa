<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include 'koneksi.php';

  // membuat variabel untuk menampung data dari form
  $nama_matkul   = $_POST['nama_matkul'];
  $kode     = $_POST['kode'];
  $sks    = $_POST['sks'];
  $nama_dosen   = $_POST['nama_dosen'];


                  $query = "INSERT INTO matkul VALUES ('', '$nama_matkul', '$kode', '$sks', '$nama_dosen')";
                  $result = mysqli_query($koneksi, $query); 
                  // periska query apakah ada error
                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                           " - ".mysqli_error($koneksi));
                  } else {
                    //tampil alert dan akan redirect ke halaman index.php
                    //silahkan ganti index.php sesuai halaman yang akan dituju
                    echo "<script>alert('Data berhasil ditambah.');window.location='matkul.php';</script>";
                  }

            ?>