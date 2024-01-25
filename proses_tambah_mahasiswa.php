<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include 'koneksi.php';

  // membuat variabel untuk menampung data dari form
  $nama   = $_POST['nama'];
  $nim     = $_POST['nim'];
  $alamat    = $_POST['alamat'];
  $kontak    = $_POST['kontak'];
  $id_kelas   = $_POST['id_kelas'];



                  $query = "INSERT INTO mahasiswa VALUES ('', '$nama', '$nim','$alamat', '$kontak', '$id_kelas')";
                  $result = mysqli_query($koneksi, $query); 
                  // periska query apakah ada error
                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                           " - ".mysqli_error($koneksi));
                  } else {
                    //tampil alert dan akan redirect ke halaman index.php
                    //silahkan ganti index.php sesuai halaman yang akan dituju
                    echo "<script>alert('Data berhasil ditambah.');window.location='mahasiswa.php';</script>";
                  }

            ?>