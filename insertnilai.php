<?php
include "koneksi.php";


//tangkap data
$nama = $_POST["nama_mhs"];
$nim = $_POST["nim_mhs"];
$kelas = $_POST["nama_kelas"];
$matkul = $_POST['nama_matkul'];
$semester = $_POST["smt"];
$nilai_h = $_POST["nilai_harian"];
$nilai_uts = $_POST["nilai_uts"];
$nilai_uas = $_POST["nilai_uas"];
$huruf = $_POST["nilai_huruf"];
$sakit = $_POST["sakit"];
$izin = $_POST["izin"];
$alfa = $_POST["alfa"];
$count = count($matkul);
$kd_raport = mt_rand(1000, 2000);
// query insert
$sql = "INSERT INTO nilaie (nama_mhs,nim_mhs,nama_kelas,nama_matkul,nilai_harian,nilai_uts, nilai_uas, nilai_huruf,sakit,izin,alfa,smt,id_tampil) values";
//perintah seleksi data nilai kecualy yang 0
$seleksi = "SELECT * FROM nilaie WHERE nilai_harian <>'0' AND nilai_uts <>'0' AND nilai_uas <>'0' AND  id_tampil='$kd_raport'";
//perintah hapus eow yang nilainya 0
$hapusrow = "DELETE FROM nilaie WHERE nilai_harian <>'0' AND nilai_uts <>'0' AND nilai_uas <>'0'";
for ($i = 0; $i < $count; $i++) {
    $sql .= "('$nama', '$nim','$kelas','{$matkul[$i]}', '{$nilai_h[$i]}', '{$nilai_uts[$i]}', '{$nilai_uas[$i]}', '{$huruf[$i]}','$sakit','$izin', '$alfa','$semester','$kd_raport')";
    $sql .= ",";
}
//eksekusi query insert
$sql = rtrim($sql, ",");
$insert = mysqli_query($koneksi, $sql);
if ($insert = 0) {
    echo "gagal insert : $insert";
}
//eksekusi hapus row yang nilai 0
$hapus = mysqli_query($koneksi, $hapusrow);
//hitung dan jumlahkan total nilai
$hitung = "SELECT SUM(nama_matkul) AS totalmapel, SUM((nilai_harian + nilai_uts + nilai_uas) / 3) AS totalnilai FROM nilaie WHERE id_tampil = '$kd_raport' GROUP BY id_tampil";
$vhitung = mysqli_query($koneksi, $hitung);
$vhitung = mysqli_query($koneksi, $hitung);
if (!$vhitung) {
    die('Query Error: ' . mysqli_error($koneksi));


$hasil = mysqli_fetch_assoc($vhitung);
$totalnilai = $hasil['totalnilai'];
$totalmapel = $hasil['totalmapel'];
$nmsekolah = "SMPN 2 Banyakan Satu Atap";
$alamat = "Dusun Peso Desa Parang Kecamatan Banyakan";
$no = 1;
}
//tampilkan 
echo "<div class='container'>
     
    
    <div class='row'>
    <div class='col-lg'>
    <p> Kelas   : $kelas</p>
    </div>
    </div>
    <div class='col-lg'>
    <p>Semester : $semester</p>
    </div>
    </div>
    <div class='row'>
    <div class='col-lg'>
    <p>Nama Peserta Didik : $nama</p>
    </div>
    <div class='col-lg'>
    <p>Tahun Pelajaran : $semester</p>
    </div>
    </div>
    <div class='row'>
    <div class='col-lg'>
    <p>Nim               : $nim</p>
    </div>
    <div class='col-lg'>
    <p>Kode Raport : $kd_raport</p>
    </div>
    </div>
    
    
    ";

echo "
<style>
.tg {
    border-collapse: collapse;
    border-spacing: 0;
}

.tg td {
    font-family: Arial, sans-serif;
    font-size: 12px;
    padding: 5px 5px;
    border-style: solid;
    border-width: 0px;
    overflow: hidden;
    word-break: normal;
    border-color: black;
}

.tg th {
    font-family: Arial, sans-serif;
    font-size: 12px;
    font-weight: normal;
    padding: 5px 5px;
    border-style: solid;
    border-width: 1px;
    overflow: hidden;
    word-break: normal;
    border-color: black;
}

.tg .tg-s268 {
    text-align: left
}

.tg .tg-0lax {
    text-align: left;
    vertical-align: top
}

.tg .tg-73oq {
    border-color: #000000;
    text-align: left;
    vertical-align: top
}
.no{
    width:-10px;
}
</style>
<table class='tg' style='undefined;table-layout: fixed; width :500px;>
<colgroup>
    <col style='width: 30px'>
    <col style='width: 40px'>
    <col style='width: 250px'>
    <col style='width: 40px'>
    <col style='width: 50px'>
    <col style='width: 50px'>
    <col style='width: 225px'>
</colgroup>
<tr>
<th class='tg-s268'>No</th>
<th class='tg-s268'>Mata Pelajaran</th>
<th class='tg-s268'>KKM</th>
<th class='tg-s268'>Nilai</th>
<th class='tg-s268'>Huruf</th>
<th class='tg-s268'>Deskripsi Kemajuan Belajar</th>
</tr>
<tbody>
         ";
//seleksi pemilihan nilai ketika 0 tidak masuk kedatabase

$seleksi = "SELECT * FROM nilaie WHERE nilai_harian <>'0' AND nilai_uts <>'0' AND nilai_uas <>'0' AND id_tampil='$kd_raport'";
$tampilkan = mysqli_query($koneksi, $seleksi);
$i = 1;
while ($select_result = mysqli_fetch_assoc($tampilkan)) {

    $kkm = 70;
    $nila_h = $select_result["nilai_harian"];
    $nilai_uts = $select_result["nilai_uts"];
    $nilai_uas = $select_result["nilai_uas"];
    $nilaif = $select_result["nilai_huruf"];
    echo "<tr><td class='tg-0lax'> $i</td>
    <td class='tg-0lax'> $nila_h</td>
    </td><td class='tg-0lax'>$nilai_uts</td>
    <td class='tg-0lax'>$nilai_uas</td>
    <td class='tg-0lax'>$nilaif</td>
    <td class='tg-0lax'></td></tr>";
    $i++;
}
echo "<tr><td colspan='3'>Jumlah Nilai </td><td>$totalnilai</td><td></td><td></td></tr>
<tr><td colspan='3'>Nilai Rata-rata</td><td></td><td></td><td></td></tr>
<tr><td colspan='6'>Peringkat Ke......dari....siswa</td></tr>
<div class='row'>
</table>
</div>
";
$i++;

echo "
<div class='container'>
<div class='row'>
<div class='col-lg-4'>Non Akademis
<style type='text/css'>
.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
.tg .tg-baqh{text-align:center;vertical-align:top}
.tg .tg-c3ow{border-color:inherit;text-align:center;vertical-align:top}
</style>

</div>
<div class='row'>
<div class='col-lg-3'> Ketidakhadiran
<style type='text/css'>
.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
.tg .tg-baqh{text-align:center;vertical-align:top}
.tg .tg-c3ow{border-color:inherit;text-align:center;vertical-align:top}
</style>
<table class='tg' style='undefined;table-layout: fixed; width: 320px; height: 150px;'>
<colgroup>
<col style='width: 100px'>
<col style='width: 120px'>
<col style='width: 100px'>
</colgroup>
  <tr>
    <th class='tg-c3ow'>No</th>
    <th class='tg-c3ow'>Alasan Ketidakhadiran</th>
    <th class='tg-baqh'>Keterangan</th>
  </tr>
  <tr>
    <td class='tg-baqh'>1</td>
    <td class='tg-baqh'>Sakit</td>
    <td class='tg-baqh'>$sakit</td>
    
  </tr>
  <tr>
    <td class='tg-baqh'>2</td>
    <td class='tg-baqh'>Izin</td>
    <td class='tg-baqh'>$izin</td>
    
  </tr>
  <tr>
    <td class='tg-baqh'>3</td>
    <td class='tg-baqh'>Tanpa Keterangan</td>
    <td class='tg-baqh'>$alfa</td>
    
  </tr>
</table>
</div>
</div>
</br>




";
echo "
<div class='container'>
<div class='row'>
<div class='col-lg'>
<p>Mengetahui,</p> 
<p>Orang Tua / Wali</p>
</br>  </br>  </br>




....................................
</div>
<div class='col-lg'>
<p>Kediri,...............20........</p>
<p>Walikelas</p>
</br>  </br>  </br>




....................................
</div>
</div>
</div>
";
echo "
    <div class='alert alert-warning' role='alert'>
    <center><a href='javascript:if(window.print)window.print()'>
    <button type='button' class='btn btn-success'><span class='glyphicon glyphicon-print' aria-hidden='true'></span>Cetak halaman ini</button></a></center>
    </div>
        </div>
    ";
