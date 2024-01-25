-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Jul 2023 pada 17.39
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nilai`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `id_dosen` int(11) NOT NULL,
  `nip_dosen` int(11) NOT NULL,
  `nama_dosen` varchar(225) NOT NULL,
  `alamat_dosen` varchar(225) NOT NULL,
  `notelp_dosen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `nip_dosen`, `nama_dosen`, `alamat_dosen`, `notelp_dosen`) VALUES
(1, 214001016, 'Yudi Ramdhani,M.kom', 'Jl.Sulaksana', 838071286),
(2, 133214123, 'Setiyana Nurodin', 'Jl. Setiyana', 2147483647),
(3, 124245645, 'Suryadi Jailani', 'Jl. Suriyadi', 218888888),
(4, 402610636, 'Lukas Widoyo', 'Jl. Sidoyo', 847483647),
(5, 993544673, 'Geri Cardingan', 'Jl. Sardingan', 2147483647),
(6, 2147483647, 'Diana Widdowfield', 'Jl. Sidoumouncoul', 2147483647),
(7, 639996868, 'Ani Suryani', 'Jl. Suryani', 2147483647);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(10) NOT NULL,
  `jurusan` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`, `jurusan`) VALUES
(1, 'X MIPA 1', 'MIPA'),
(2, 'XI IPS 1', 'IPS'),
(3, 'MNJ4A', 'Manajeman'),
(5, 'TI', 'Teknik Informatika'),
(6, 'SI', 'Sistem Informasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mhs` int(11) NOT NULL,
  `nama_mhs` varchar(255) NOT NULL,
  `nim_mhs` int(11) NOT NULL,
  `alamat_mhs` varchar(225) NOT NULL,
  `telp_mhs` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mhs`, `nama_mhs`, `nim_mhs`, `alamat_mhs`, `telp_mhs`, `id_kelas`) VALUES
(2, 'Chikal', 17203044, 'Bandung', 2147483647, 5),
(5, 'Trisna', 17213007, 'Nagreg', 878264292, 2),
(6, 'Tania', 17213056, 'Ciwastra', 8878632, 3),
(7, 'Serly', 17203045, 'Ujung Berung', 878264292, 5),
(10, 'Rizkia Meinita', 172140001, 'Ujung Berung', 878264292, 5),
(11, 'Amelia Anjani', 172140002, 'Gunung Halu', 2147483647, 5),
(12, 'Femmy Novica R', 17214028, 'Bandung', 2147483647, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `matkul`
--

CREATE TABLE `matkul` (
  `id_matkul` int(11) NOT NULL,
  `nama_matkul` varchar(255) NOT NULL,
  `kode_matkul` varchar(225) NOT NULL,
  `sks_matkul` int(11) NOT NULL,
  `nama_dosen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `matkul`
--

INSERT INTO `matkul` (`id_matkul`, `nama_matkul`, `kode_matkul`, `sks_matkul`, `nama_dosen`) VALUES
(4, 'Basis Data', 'BD', 3, 'Setiyana Nurodin'),
(5, 'Kalkulus dan Aljabar Linear', 'KAL', 3, 'Lukas Widoyo'),
(6, 'Pemograman Berbasis Objek', 'PBO', 3, 'Ani Suryani'),
(7, 'Kewirausahaan', 'KWU', 4, 'Geri Cardingan'),
(8, 'Pemograman Lanjutan', 'PL', 4, 'Diana Widdowfield'),
(9, 'Komputer dan Jaringan Dasar', 'KOMJARDAR', 5, 'Suryadi Jailani'),
(10, 'Pemodelan Perangkat Lunak', 'PPL', 3, 'Yudi Ramdhani,M.kom');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilaie`
--

CREATE TABLE `nilaie` (
  `id_nilai` int(11) NOT NULL,
  `nama_mhs` varchar(255) NOT NULL,
  `nim_mhs` varchar(255) NOT NULL,
  `nama_kelas` varchar(255) NOT NULL,
  `nama_matkul` varchar(255) NOT NULL,
  `nilai_harian` int(11) NOT NULL,
  `nilai_uts` int(11) NOT NULL,
  `nilai_uas` int(11) NOT NULL,
  `nilai_huruf` enum('A','B','C','D') NOT NULL,
  `sakit` int(11) NOT NULL,
  `izin` int(11) NOT NULL,
  `alfa` int(11) NOT NULL,
  `smt` int(11) NOT NULL,
  `id_tampil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `nilaie`
--

INSERT INTO `nilaie` (`id_nilai`, `nama_mhs`, `nim_mhs`, `nama_kelas`, `nama_matkul`, `nilai_harian`, `nilai_uts`, `nilai_uas`, `nilai_huruf`, `sakit`, `izin`, `alfa`, `smt`, `id_tampil`) VALUES
(95, 'Femmy Novica R', '17214028', 'TI', '  Basis Data', 88, 95, 98, 'A', 2, 3, 0, 4, 1395),
(96, 'Femmy Novica R', '17214028', 'TI', '  Kalkulus dan Aljabar Linear', 90, 98, 91, 'A', 2, 3, 0, 4, 1395),
(97, 'Femmy Novica R', '17214028', 'TI', '  Kewirausahaan', 85, 90, 87, 'A', 2, 3, 0, 4, 1395),
(98, 'Femmy Novica R', '17214028', 'TI', '  Komputer dan Jaringan Dasar', 87, 87, 98, 'A', 2, 3, 0, 4, 1395),
(99, 'Femmy Novica R', '17214028', 'TI', '  Pemodelan Perangkat Lunak', 98, 87, 85, 'B', 2, 3, 0, 4, 1395),
(100, 'Femmy Novica R', '17214028', 'TI', '  Pemograman Berbasis Objek', 85, 98, 90, 'A', 2, 3, 0, 4, 1395),
(101, 'Femmy Novica R', '17214028', 'TI', '  Pemograman Lanjutan', 91, 87, 85, 'A', 2, 3, 0, 4, 1395),
(102, 'Chikal', '17203044', 'TI', '  Basis Data', 70, 90, 80, 'A', 7, 3, 1, 0, 1974),
(103, 'Chikal', '17203044', 'TI', '  Kalkulus dan Aljabar Linear', 95, 85, 77, 'A', 7, 3, 1, 0, 1974),
(104, 'Chikal', '17203044', 'TI', '  Kewirausahaan', 77, 95, 80, 'B', 7, 3, 1, 0, 1974),
(105, 'Chikal', '17203044', 'TI', '  Komputer dan Jaringan Dasar', 90, 77, 95, 'A', 7, 3, 1, 0, 1974),
(106, 'Chikal', '17203044', 'TI', '  Pemodelan Perangkat Lunak', 80, 95, 77, 'A', 7, 3, 1, 0, 1974),
(107, 'Chikal', '17203044', 'TI', '  Pemograman Berbasis Objek', 95, 77, 90, 'A', 7, 3, 1, 0, 1974),
(108, 'Chikal', '17203044', 'TI', '  Pemograman Lanjutan', 77, 90, 80, 'A', 7, 3, 1, 0, 1974),
(109, 'Trisna', '17213007', 'XI IPS 1', '  Basis Data', 77, 88, 95, 'A', 3, 2, 0, 5, 1102),
(110, 'Trisna', '17213007', 'XI IPS 1', '  Kalkulus dan Aljabar Linear', 80, 79, 90, 'A', 3, 2, 0, 5, 1102),
(111, 'Trisna', '17213007', 'XI IPS 1', '  Kewirausahaan', 77, 90, 95, 'B', 3, 2, 0, 5, 1102),
(112, 'Trisna', '17213007', 'XI IPS 1', '  Komputer dan Jaringan Dasar', 90, 77, 79, 'A', 3, 2, 0, 5, 1102),
(113, 'Trisna', '17213007', 'XI IPS 1', '  Pemodelan Perangkat Lunak', 95, 90, 77, 'A', 3, 2, 0, 5, 1102),
(114, 'Trisna', '17213007', 'XI IPS 1', '  Pemograman Berbasis Objek', 79, 88, 90, 'A', 3, 2, 0, 5, 1102),
(115, 'Trisna', '17213007', 'XI IPS 1', '  Pemograman Lanjutan', 88, 90, 95, 'A', 3, 2, 0, 5, 1102);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_petugas` int(11) NOT NULL,
  `nisn` varchar(11) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `bulan_dibayar` varchar(8) NOT NULL,
  `tahun_dibayar` varchar(4) NOT NULL,
  `id_spp` int(11) NOT NULL,
  `jumlah_bayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_petugas`, `nisn`, `tgl_bayar`, `bulan_dibayar`, `tahun_dibayar`, `id_spp`, `jumlah_bayar`) VALUES
(2, 2, '2020112233', '2021-03-30', 'maret', '2019', 3, 300000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nama_petugas` varchar(35) NOT NULL,
  `level` enum('admin','petugas','siswa') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `username`, `password`, `nama_petugas`, `level`) VALUES
(1, 'admin1', 'admin', 'April', 'admin'),
(2, 'petugas1', 'petugas', 'lia', 'petugas'),
(7, '2020112233', 'ramdan', 'ramdan', 'siswa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `nisn` varchar(11) NOT NULL,
  `nis` varchar(11) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `id_spp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`nisn`, `nis`, `nama`, `id_kelas`, `alamat`, `no_telp`, `id_spp`) VALUES
('2020112233', '18191010', 'Muhammad Ramdan', 1, 'Perumahan Padasuka blok c no.32', '089665412345', 3),
('2020112234', '18191011', 'Ahmad Setiawan', 2, 'Perumahan Giriharja blok g no.135', '087653998764', 2),
('2020112235', '18191012', 'Mira Helmalia', 3, 'Komplek Sumur bandung no.76', '081432567890', 1),
('2020112236', '181910123', 'Aisha Amira Devina', 2, 'Perumahan Alam Indah blok f no.211', '085677908443', 2),
('2020112237', '18191013', 'Muhamad Hendra', 3, 'Perumahan Padasuka blok a no.4', '082456334987', 1),
('2020112238', '18191014', 'tanti Dwi Putri', 5, 'Perumahan Mekar Mukti blok b no.43', '085222674908', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `spp`
--

CREATE TABLE `spp` (
  `id_spp` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `nominal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `spp`
--

INSERT INTO `spp` (`id_spp`, `tahun`, `nominal`) VALUES
(1, 2019, 130000),
(2, 2020, 140000),
(3, 2021, 150000);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id_dosen`),
  ADD UNIQUE KEY `nama_dosen` (`nama_dosen`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD UNIQUE KEY `nama_kelas` (`nama_kelas`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mhs`),
  ADD UNIQUE KEY `nama_mhs` (`nama_mhs`),
  ADD UNIQUE KEY `nim_mhs` (`nim_mhs`),
  ADD KEY `id_kelas` (`id_kelas`) USING BTREE;

--
-- Indeks untuk tabel `matkul`
--
ALTER TABLE `matkul`
  ADD PRIMARY KEY (`id_matkul`),
  ADD UNIQUE KEY `nama_matkul` (`nama_matkul`),
  ADD KEY `nama_dosen` (`nama_dosen`);

--
-- Indeks untuk tabel `nilaie`
--
ALTER TABLE `nilaie`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_petugas` (`id_petugas`),
  ADD KEY `nisn` (`nisn`),
  ADD KEY `id_spp` (`id_spp`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nisn`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_spp` (`id_spp`);

--
-- Indeks untuk tabel `spp`
--
ALTER TABLE `spp`
  ADD PRIMARY KEY (`id_spp`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mhs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `matkul`
--
ALTER TABLE `matkul`
  MODIFY `id_matkul` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `nilaie`
--
ALTER TABLE `nilaie`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `spp`
--
ALTER TABLE `spp`
  MODIFY `id_spp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `matkul`
--
ALTER TABLE `matkul`
  ADD CONSTRAINT `matkul_ibfk_1` FOREIGN KEY (`nama_dosen`) REFERENCES `dosen` (`nama_dosen`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`),
  ADD CONSTRAINT `pembayaran_ibfk_2` FOREIGN KEY (`nisn`) REFERENCES `siswa` (`nisn`),
  ADD CONSTRAINT `pembayaran_ibfk_3` FOREIGN KEY (`id_spp`) REFERENCES `siswa` (`id_spp`);

--
-- Ketidakleluasaan untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`),
  ADD CONSTRAINT `siswa_ibfk_2` FOREIGN KEY (`id_spp`) REFERENCES `spp` (`id_spp`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
