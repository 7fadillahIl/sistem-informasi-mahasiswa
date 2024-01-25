<?php
include('koneksi.php');
?>

<html>
<head>
    <title>Cetak Nilai</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<?php
// Query untuk mengambil data nilai
$id_tampil = $_GET["id_tampil"];
$query = "SELECT nama_mhs, nim_mhs, nama_kelas, smt, nama_matkul, nilai_harian, nilai_uts, nilai_uas, nilai_huruf, AVG((nilai_harian + nilai_uts + nilai_uas) / 3) AS ipk, id_tampil, sakit, izin, alfa FROM nilaie WHERE id_tampil='$id_tampil' GROUP BY id_tampil";
$result = mysqli_query($koneksi, $query);
$shows = mysqli_fetch_assoc($result);
$nama = $shows['nama_mhs'];
$nim = $shows['nim_mhs'];
$kelas = $shows['nama_kelas'];
$semester = $shows['smt'];
$matkul = $shows['nama_matkul'];
$nhari = $shows['nilai_harian'];
$nuts = $shows['nilai_uts'];
$nuas = $shows['nilai_uas'];
$huruf = $shows['nilai_huruf'];
$sakit = $shows['sakit'];
$izin = $shows['izin'];
$alfa = $shows['alfa'];
$ipk = $shows['ipk'];
$tampil = $shows['id_tampil'];
$nmsekolah = "ARS University";
$no = 1;

echo "
<div class='container'>
	<div class='col-lg'>
        <p style='text-align: left; width:30%; display: inline-block;'>Universitas: $nmsekolah</p>
        <p style='text-align: right; width: 30%; display: inline-block;'>Kelas: $kelas</p><br>
        <p style='text-align: right; width: 60%; display: inline-block;'>Semester: $semester</p>
        <br>
        <p style='text-align: left; width: 60%; display: inline-block;'>Nama: $nama</p>
        <br>
        <p style='text-align: left; width: 30%; display: inline-block;'>NIM: $nim</p>
        <p style='text-align: right; width: 30%; display: inline-block;'>Kode KHS: $tampil</p>
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

.no {
    width: -10px;
}
</style>

<div class='container'>
    <table class='tg' style='undefined; table-layout:fixed; width:500px;'>
        <colgroup>
            <col style='width: 30px'>
            <col style='width: 250px'>
            <col style='width: 40px'>
            <col style='width: 50px'>
            <col style='width: 50px'>
            <col style='width: 50px'>
            <col style='width: 225px'>
        </colgroup>
        <tr>
            <th class='tg-s268'>No</th>
            <th class='tg-s268'>Mata Kuliah</th>
            <th class='tg-s268'>Nilai Harian</th>
            <th class='tg-s268'>Nilai UTS</th>
            <th class='tg-s268'>Nilai UAS</th>
            <th class='tg-s268'>Predikat</th>
        </tr>
        <tbody>
";

$seleksi = "SELECT * FROM nilaie WHERE nilai_harian<>'0' AND id_tampil='$tampil'";
$tampilkan = mysqli_query($koneksi, $seleksi);
$i = 1;
while ($select_result = mysqli_fetch_assoc($tampilkan)) {
    $kkm = 70;
    $mapels = $select_result['nama_matkul'];
    $nha = $select_result['nilai_harian'];
    $nuts = $select_result['nilai_uts'];
    $nuas = $select_result['nilai_uas'];
    $nilaif = $select_result["nilai_huruf"];
    echo "
        <tr>
            <td class='tg-s268'>$i</td>
            <td class='tg-s268'>$mapels</td>
            <td class='tg-s268'>$nha</td>
            <td class='tg-s268'>$nuts</td>
            <td class='tg-s268'>$nuas</td>
            <td class='tg-s268'>$nilaif</td>
            
        </tr>";
    $i++;
}

echo "<tr><td colspan='3'>IPK </td><td>$ipk</td><td></td><td></td></tr>
<div class='row'>
</table>
</div>
</div>
";

$i++;

echo "
<div class='container'>
    <div class='row'>
        <div class='row'>
            <div class='col-lg-3'>Ketidakhadiran
                <style type='text/css'>
                    .tg  {border-collapse:collapse;border-spacing:0;}
                    .tg td{font-family:Arial, sans-serif;font-size:12px;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
                    .tg th{font-family:Arial, sans-serif;font-size:12px;font-weight:normal;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
                    .tg .tg-baqh{text-align:center;vertical-align:top}
                    .tg .tg-c3ow{border-color:inherit;text-align:center;vertical-align:top}
                </style>
                <table class='tg' style='undefined; table-layout: fixed; width: 300px;'>
                    <colgroup>
                        <col style='width: 30px'>
                        <col style='width: 100px'>
                        <col style='width: 60px'>
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
    </div>
    </br>

";

echo "
    <div>
        <center>
            <a href='javascript:if(window.print)window.print()'>
                <button type='button' class='btn btn-success'>
                    <span class='glyphicon glyphicon-print' aria-hidden='true'></span>Cetak halaman ini
                </button>
            </a>
        </center>
    </div>
</div>
</div>
</div>
";
?>
