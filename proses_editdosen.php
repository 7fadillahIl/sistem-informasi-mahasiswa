<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include 'koneksi.php';

	// membuat variabel untuk menampung data dari form
  $id = $_POST['id'];

  $nama_dosen   = $_POST['nama_dosen'];
  $nip     = $_POST['nip'];
  $nama_dosen    = $_POST['nama_dosen'];
  $alamat_dosen   = $_POST['alamat_dosen'];
  $notelp_dosen     = $_POST['notelp_dosen'];

  //cek dulu jika merubah gambar produk jalankan coding ini
  
                    // jalankan query UPDATE berdasarkan ID yang produknya kita edit
                    $query  = "UPDATE dosen SET nip_dosen='$nip', nama_dosen= '$nama_dosen', alamat_dosen= '$alamat_dosen', notelp_dosen= '$notelp_dosen' WHERE id_dosen = '$id'";
                    $result = mysqli_query($koneksi, $query);
                    // periska query apakah ada error
                    if(!$result){
                        die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                             " - ".mysqli_error($koneksi));
                    } else {
                      //tampil alert dan akan redirect ke halaman index.php
                      //silahkan ganti index.php sesuai halaman yang akan dituju
                      echo "<script>alert('Data berhasil diubah.');window.location='dosen.php';</script>";
                    }
              
			  
			  ?>
