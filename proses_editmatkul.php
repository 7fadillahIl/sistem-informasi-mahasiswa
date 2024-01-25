<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include 'koneksi.php';

	// membuat variabel untuk menampung data dari form
  $id = $_POST['id'];

  $nama_matkul   = $_POST['nama_matkul'];
  $kode_matkul     = $_POST['kode'];
  $nama_matkul    = $_POST['nama_matkul'];
  $sks_matkul   = $_POST['sks_matkul'];
  $nama_dosen     = $_POST['nama_dosen'];

  //cek dulu jika merubah gambar produk jalankan coding ini
  
                    // jalankan query UPDATE berdasarkan ID yang produknya kita edit
                    $query  = "UPDATE matkul SET nama_matkul= '$nama_matkul',  kode_matkul='$kode_matkul', sks_matkul= '$sks_matkul', nama_dosen= '$nama_dosen' WHERE id_matkul= '$id'";
                    $result = mysqli_query($koneksi, $query);
                    // periska query apakah ada error
                    if(!$result){
                        die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                             " - ".mysqli_error($koneksi));
                    } else {
                      //tampil alert dan akan redirect ke halaman index.php
                      //silahkan ganti index.php sesuai halaman yang akan dituju
                      echo "<script>alert('Data berhasil diubah.');window.location='matkul.php';</script>";
                    }
              
			  
			  ?>
