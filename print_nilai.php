
<!DOCTYPE html>
<html>
<head>
    <title>Cetak Nilai</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Cetak Nilai</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Mahasiswa</th>
                    <th>NIM</th>
                    <th>Kelas</th>
                    <th>Semester</th>
                    <th>Mata Kuliah</th>
                    <th>Nilai Harian</th>
                    <th>UTS</th>
                    <th>UAS</th>
                    <th>Predikat</th>
                    <th>IPK</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include('koneksi.php');

                // Query untuk mengambil data nilai
                $query = "SELECT nama_mhs,nim_mhs, nama_kelas, smt, nama_matkul, nilai_harian, nilai_uts, nilai_uas, nilai_huruf, sakit, izin, alfa,  AVG((nilai_harian + nilai_uts + nilai_uas) / 3) AS ipk FROM nilaie GROUP BY nama_mhs, nama_kelas, smt";
								$result = mysqli_query($koneksi, $query);



                if (mysqli_num_rows($result) > 0) {
                    $no = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $no . "</td>";
                        echo "<td>" . $row['nama_mhs'] . "</td>";
                        echo "<td>" . $row['nim_mhs'] . "</td>";
                        echo "<td>" . $row['nama_kelas'] . "</td>";
                        echo "<td>" . $row['smt'] . "</td>";
                        echo "<td>" . $row['nama_matkul'] . "</td>";
                        echo "<td>" . $row['nilai_harian'] . "</td>";
                        echo "<td>" . $row['nilai_uts'] . "</td>";
                        echo "<td>" . $row['nilai_uas'] . "</td>";
                        echo "<td>" . $row['nilai_huruf'] . "</td>";
                        echo "<td>" . $row['ipk'] . "</td>";
                        echo "</tr>";
                        
                        $no++;
                    }
                } else {
                    echo "<tr><td colspan='6'>Tidak ada data nilai.</td></tr>";
                }
                ?>
            </tbody>
        </table>
            </div>
            <div>
    <center><a href='javascript:if(window.print)window.print()'>
    <button type='button' class='btn btn-success'><span class='glyphicon glyphicon-print' aria-hidden='true'></span>Cetak halaman ini</button></a></center>
    </div>
        </div></div></div>
</body>
</html>