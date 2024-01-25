<?php
  include('koneksi.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include
  
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Data Nilai TI</title>
    
  </head>
<body>

	<?php

  include ('tampilan/header.php');
  include ('tampilan/sidebar.php');
  include ('tampilan/footer.php');
?>

     
      
   <!-- Main Content -->
      <div class="main-content bg-primary">
        <section class="section">
          <div class="section-header">
            <h1>Data Nilai</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item text-primary">Data Nilai TI</div>
            </div>
          </div>
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>LIST NILAI</h4>
                    <div class="card-header-form">
                      <form>
                          <div class="input-group-btn">
                            <a href="tambah_nilai.php" class="btn btn-primary"><i class="fas fa-plus"></i></a>
                        </div>
                      </form>
                    </div>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-striped">
                       <thead>
                          <tr>
                          <th>No</th>
                          <th>Nama Mahasiswa</th>
                          <th>NIM</th>
                          <th>Kelas</th>
                          <th>Semester</th>
                          <th>IPK</th>
                          <th>Aksi</th>
                        </tr>
                        </thead>
                         <tbody>
                           <?php
                              // jalankan query untuk menampilkan semua data diurutkan berdasarkan id
                              $query = "SELECT nama_mhs,nim_mhs, nama_kelas, smt, AVG((nilai_harian + nilai_uts + nilai_uas) / 3) AS ipk, id_tampil FROM nilaie GROUP BY id_tampil";


                               $result = mysqli_query($koneksi, $query);
                              //mengecek apakah ada error ketika menjalankan query
                              if(!$result){
                                die ("Query Error: ".mysqli_errno($koneksi).
                                   " - ".mysqli_error($koneksi));
                              }

                              //buat perulangan untuk element tabel dari data mahasiswa
                              $no = 1;
                               //variabel untuk membuat nomor urut
                              // hasil query akan disimpan dalam variabel $data dalam bentuk array
                              // kemudian dicetak dengan perulangan while
                              while($row = mysqli_fetch_assoc($result))
                              {
                              ?>
                        <tr>  
                          <td><?php echo $no; ?></td>
                          <td><?php echo $row['nama_mhs']; ?></td>
                          <td><?php echo $row['nim_mhs']; ?></td>
                          <td><?php echo $row['nama_kelas']; ?></td>
                          <td><?php echo $row['smt']; ?></td>  
                          <td><?php echo $row['ipk']; ?></td> 
                          <td>
                          <a href="print_nilai2.php?id_tampil=<?= $row['id_tampil']; ?>" class="btn btn-warning"><i class="fa fa-print" aria-hidden="true"></i>Print</a>
                          </td>
                        </tr>
                         <?php
                           $no++; //untuk nomor urut terus bertambah 1
                           }
                         ?>
                         </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </section>
      </div>
      
    </div>
  </div>
</body>
</html>