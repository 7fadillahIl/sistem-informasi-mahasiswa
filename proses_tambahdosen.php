<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include 'koneksi.php';

  // membuat variabel untuk menampung data dari form
  $nama_dosen   = $_POST['nama_dosen'];
  $nip     = $_POST['nip'];
  $nama_dosen    = $_POST['nama_dosen'];
  $alamat_dosen   = $_POST['alamat_dosen'];
  $notelp_dosen     = $_POST['notelp_dosen'];


                  $query = "INSERT INTO dosen VALUES ('', '$nip', '$nama_dosen', '$alamat_dosen', '$notelp_dosen')";
                  $result = mysqli_query($koneksi, $query); 
                  // periska query apakah ada error
                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                           " - ".mysqli_error($koneksi));
                  } else {
                    //tampil alert dan akan redirect ke halaman index.php
                    //silahkan ganti index.php sesuai halaman yang akan dituju
                    echo "<script>alert('Data berhasil ditambah.');window.location='dosen.php';</script>";
                  }

            ?>