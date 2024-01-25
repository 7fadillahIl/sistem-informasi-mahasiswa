<?php
  include('koneksi.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include 
?>

<?php
$siswa = mysqli_query($koneksi, "SELECT * FROM mahasiswa") or die(mysqli_error($koneksi));
$jsArray = "var id_mhs = {};\n";
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Tambah Nilai</title>
   
  </head>
<body>
  <?php

  include ('tampilan/header.php');
  include ('tampilan/sidebar.php');
  include ('tampilan/footer.php');
?>
<div class="main-content bg-primary">
        <section class="section">
          <div class="section-header">
            <h1>TAMBAH NILAI</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item text-primary"><a href="siswa.php">Data Nilai</a></div>
              <div class="breadcrumb-item text-primary">Tambah Nilai</div>
            </div>
          </div>
          <div class="row">
              <div class="col-12">
                <div class="card bg-primary">
                  </div>
                  <div class="card-body bg-primary">
                  <div class="card shadow mb-4">
        <div class="card-header py-3">

            <!-- head nilai -->
            <h6 class="m-0 font-weight-bold text-primary">Tabel Identitas Khs</h6>
        </div>
        <div class="card-body">
          <form action="proses_tambahnilai.php" method="post">
                 <div class="row">
                       <div class="col-lg">
                            <label for="nama">Nama Mahasiswa</label>
                            <select class="form-control" name="nama_mhs" onchange="changeValue(this.value)">
                                <option>- - -</option>
                                <?php if (mysqli_num_rows($siswa)) { ?>
                                    <?php while ($new_siswa = mysqli_fetch_array($siswa)) { ?>
                                        <option value="<?php echo $new_siswa["nama_mhs"] ?>"> <?php echo $new_siswa["nama_mhs"] ?> </option>
                                        <?php
                                        $jsArray .= "id_mhs['" . $new_siswa['nama_mhs'] . "'] = '" . addslashes($new_siswa['nim_mhs']) . "';\n";
                                        ?>
                                    <?php } ?>
                                <?php } ?>
                            </select>
                        </div>
                        <script>
                            function changeValue(nama_mhs) {
                                document.getElementById("nim_mhs").value = id_mhs[nama_mhs];
                            }

                            <?php echo $jsArray; ?>
                        </script>

                        <div class="col-lg">
                            <label for="nim_mhs">NIM</label>
                            <input type="text" class="form-control" name="nim_mhs" id="nim_mhs" value="0" readonly="readonly">
                        </div>
                       
                    </div>

                     <div class="row">
                        <div class="col-lg">
                            <label for="nama_kelas">Kelas</label>
                            <select name="nama_kelas" id="nama_kelas" class="form-control">
                                <option value="">Kelas</option>
                                <?php $sql_tahun = mysqli_query($koneksi, "SELECT * FROM kelas") or die(nysqli_error($koneksi));
                                while ($datatahun = mysqli_fetch_assoc($sql_tahun)) {
                                    echo '<option value="' . $datatahun["nama_kelas"] . '">' . $datatahun["nama_kelas"]
                                        . '</option>';
                                }

                                ?>
                            </select>
                        </div>

                       <div class="col-lg">
                            <label for="smt">Semester</label>
                            <select name="smt" id="smt" class="form-control">
                                <option value="">--Pilih Semester--</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>

                            </select>
                        </div>
                    </div>
          </div>            
        </div>
    </div>
 <div class="container justify-center">
        <div class="card">
            <div class="row">
                <div class="col-md text-center">
                    <div class="card-body">
                        <h5 class="m-0 font-weight-bold text-primary">Pilih Mata Pelajaran</h5>
                        <h6 class="m-0 font-weight-bold"> Keterangan Nilai Huruf : </h6>
                        <a class="btn btn-success" href="#" role="button" disabled>A = Sangat Baik</a>
                        <a class="btn btn-primary" href="#" role="button" disabled>B = Baik</a>
                        <a class="btn btn-warning" href="#" role="button" disabled>C = Cukup</a>
                        <a class="btn btn-danger" href="#" role="button" disabled>D = Kurang Baik</a>
                        <br><br>
                    </div>

                    <table class="table table-light " id="dataTable" width="100%" cellspacing="0">
                        <thead class="thead-dark">
                            <tr>
                                <td>Mata Pelajaran</td>
                                <td>Nilai Harian</td>
                                <td>Nilai UTS</td>
                                <td>Nilai UAS</td>
                                <td>Nilai Angka</td>
                            </tr>
                        </thead>
                        <tr>
                            <?php
                            $sql_mapel = mysqli_query($koneksi, "SELECT * FROM matkul ORDER BY nama_matkul") or die(mysqli_error($koneksi));
                            while ($datamapel = mysqli_fetch_assoc($sql_mapel)) :
                                $mapel = $datamapel["nama_matkul"];
                                ?>


                                <td>
                                    <input type="text" name="nama_matkul[]" id="nama_matkul[]" value="  <?php echo $mapel ?>" class="form-control" readonly>

                                <td>
                                    <input type="number" name="nilai_harian[]" id="nilai_harian" class="form-control">
                                </td>
                                <td>
                                    <input type="number" name="nilai_uts[]" id="nilai_uts" class="form-control">
                                </td>
                                <td>
                                    <input type="number" name="nilai_uas[]" id="nilai_uas" class="form-control">
                                </td>
                                <td>
                                    <select name="nilai_huruf[]" id="" class="form-control">
                                        <option value="">Pilih Nilai Huruf</option>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="C">C</option>
                                        <option value="D">D</option>
                                    </select>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                     

                        <tr>
                            <td>

                                <label for="ekstra">Sakit</label>
                                <input type="number" name="sakit" id="izin" class="form-control">
                            </td>

                            <td> <label for="ekstra">Izin</label>
                                <input type="number" name="izin" id="izin" class="form-control">
                            </td>
                            <td> <label for="ekstra">Tanpa Keterangan</label>
                                <input type="number" name="alfa" id="alfa" class="form-control">
                            </td>
                        </tr>
                  </table>
                        <div class="form-group row">
                          <div class="col-md-4"></div>
                          <div class="col-lg-4 col-md-6 text-right">
                            <button type="submit" class="btn btn-icon icon-right btn-primary">Simpan<i class="fas fa-arrow-right"></i></button>
                          </div>
                          </form>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
    </div>