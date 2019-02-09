-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2018 at 08:42 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk-prodi`
--

-- --------------------------------------------------------

--
-- Table structure for table `akreditasi`
--

CREATE TABLE `akreditasi` (
  `id_akreditasi` int(11) NOT NULL,
  `nama_akreditasi` char(1) NOT NULL,
  `nilai_akreditasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akreditasi`
--

INSERT INTO `akreditasi` (`id_akreditasi`, `nama_akreditasi`, `nilai_akreditasi`) VALUES
(1, 'A', 100),
(2, 'B', 75),
(3, 'C', 50),
(4, 'D', 25),
(5, 'E', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cita_cita`
--

CREATE TABLE `cita_cita` (
  `id_cita_cita` int(11) NOT NULL,
  `nama_cita_cita` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cita_cita`
--

INSERT INTO `cita_cita` (`id_cita_cita`, `nama_cita_cita`) VALUES
(1, 'Guru'),
(2, 'Dokter'),
(3, 'Pengacara'),
(4, 'Pembisnis'),
(5, 'Pegawai Negeri');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `id_preferensi` int(11) NOT NULL,
  `nama_kriteria` varchar(55) NOT NULL,
  `kaidah` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `id_preferensi`, `nama_kriteria`, `kaidah`) VALUES
(1, 4, 'Minat', 'max'),
(2, 3, 'Nilai', 'max'),
(3, 3, 'Akreditasi', 'max'),
(4, 4, 'Cita Cita', 'max');

-- --------------------------------------------------------

--
-- Table structure for table `mata_pelajaran`
--

CREATE TABLE `mata_pelajaran` (
  `id_pelajaran` int(11) NOT NULL,
  `nama_pelajaran` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `mata_pelajaran`
--

INSERT INTO `mata_pelajaran` (`id_pelajaran`, `nama_pelajaran`) VALUES
(1, 'Matematika'),
(2, 'Biologi'),
(3, 'Kimia'),
(4, 'Fisika'),
(5, 'TIK'),
(6, 'Seni Budaya'),
(7, 'PKN'),
(8, 'Bahasa Indonesia'),
(9, 'Bahasa Inggris');

-- --------------------------------------------------------

--
-- Table structure for table `minat`
--

CREATE TABLE `minat` (
  `id_minat` int(11) NOT NULL,
  `nama_minat` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `minat`
--

INSERT INTO `minat` (`id_minat`, `nama_minat`) VALUES
(1, 'Medis'),
(2, 'Teknologi'),
(3, 'Seni'),
(4, 'Sosial'),
(5, 'Bisnis');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_cita_cita`
--

CREATE TABLE `nilai_cita_cita` (
  `id_nilai_cita_cita` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_cita_cita` int(11) NOT NULL,
  `nilai_cita_cita` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `nilai_cita_cita`
--

INSERT INTO `nilai_cita_cita` (`id_nilai_cita_cita`, `id_siswa`, `id_cita_cita`, `nilai_cita_cita`) VALUES
(1, 1, 1, 3),
(2, 1, 2, 4),
(3, 1, 3, 1),
(4, 1, 4, 3),
(5, 1, 5, 3),
(6, 3, 1, 1),
(7, 3, 2, 1),
(8, 3, 3, 1),
(9, 3, 4, 1),
(10, 3, 5, 1),
(11, 4, 1, 2),
(12, 4, 2, 1),
(13, 4, 3, 1),
(14, 4, 4, 1),
(15, 4, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_minat`
--

CREATE TABLE `nilai_minat` (
  `id_nilai_minat` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_minat` int(11) NOT NULL,
  `nilai_minat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `nilai_minat`
--

INSERT INTO `nilai_minat` (`id_nilai_minat`, `id_siswa`, `id_minat`, `nilai_minat`) VALUES
(1, 1, 1, 4),
(2, 1, 2, 5),
(3, 1, 3, 1),
(4, 1, 4, 2),
(5, 1, 5, 3),
(6, 2, 1, 1),
(7, 2, 2, 1),
(8, 2, 3, 1),
(9, 2, 4, 1),
(10, 2, 5, 1),
(11, 3, 1, 1),
(12, 3, 2, 1),
(13, 3, 3, 1),
(14, 3, 4, 1),
(15, 3, 5, 1),
(16, 4, 1, 1),
(17, 4, 2, 1),
(18, 4, 3, 1),
(19, 4, 4, 1),
(20, 4, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_pelajaran`
--

CREATE TABLE `nilai_pelajaran` (
  `id_nilai_pelajaran` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_pelajaran` int(11) NOT NULL,
  `nilai_pelajaran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `nilai_pelajaran`
--

INSERT INTO `nilai_pelajaran` (`id_nilai_pelajaran`, `id_siswa`, `id_pelajaran`, `nilai_pelajaran`) VALUES
(1, 1, 1, 88),
(2, 1, 2, 87),
(3, 1, 3, 89),
(4, 1, 4, 80),
(5, 1, 5, 90),
(6, 1, 6, 70),
(7, 1, 7, 78),
(8, 1, 8, 80),
(9, 1, 9, 86),
(10, 2, 1, 0),
(11, 2, 2, 0),
(12, 2, 3, 0),
(13, 2, 4, 0),
(14, 2, 5, 0),
(15, 2, 6, 0),
(16, 2, 7, 0),
(17, 2, 8, 0),
(18, 2, 9, 0),
(19, 3, 1, 0),
(20, 3, 2, 0),
(21, 3, 3, 0),
(22, 3, 4, 0),
(23, 3, 5, 0),
(24, 3, 6, 0),
(25, 3, 7, 0),
(26, 3, 8, 0),
(27, 3, 9, 0),
(28, 4, 1, 0),
(29, 4, 2, 0),
(30, 4, 3, 0),
(31, 4, 4, 0),
(32, 4, 5, 0),
(33, 4, 6, 0),
(34, 4, 7, 0),
(35, 4, 8, 0),
(36, 4, 9, 0);

-- --------------------------------------------------------

--
-- Table structure for table `perbandingan_kriteria`
--

CREATE TABLE `perbandingan_kriteria` (
  `id_perbandingan` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `perbandingan_kriteria`
--

INSERT INTO `perbandingan_kriteria` (`id_perbandingan`, `id_siswa`, `nilai`) VALUES
(1, 1, 1),
(2, 1, 6),
(3, 1, 1),
(4, 1, 2),
(5, 1, 0.17),
(6, 1, 1),
(7, 1, 4),
(8, 1, 0.33),
(9, 1, 1),
(10, 1, 0.25),
(11, 1, 1),
(12, 1, 0.25),
(13, 1, 0.5),
(14, 1, 3),
(15, 1, 4),
(16, 1, 1),
(17, 3, 1),
(18, 3, 1),
(19, 3, 1),
(20, 3, 1),
(21, 3, 1),
(22, 3, 1),
(23, 3, 1),
(24, 3, 1),
(25, 3, 1),
(26, 3, 1),
(27, 3, 1),
(28, 3, 1),
(29, 3, 1),
(30, 3, 1),
(31, 3, 1),
(32, 3, 1),
(33, 4, 1),
(34, 4, 3),
(35, 4, 1),
(36, 4, 0.5),
(37, 4, 0.33),
(38, 4, 1),
(39, 4, 4),
(40, 4, 0.33),
(41, 4, 1),
(42, 4, 0.25),
(43, 4, 1),
(44, 4, 0.2),
(45, 4, 2),
(46, 4, 3),
(47, 4, 5),
(48, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `program_studi`
--

CREATE TABLE `program_studi` (
  `id_prodi` int(11) NOT NULL,
  `nama_prodi` varchar(255) NOT NULL,
  `id_pelajaran` int(11) NOT NULL,
  `id_minat` int(11) NOT NULL,
  `id_akreditasi` int(11) NOT NULL,
  `id_cita_cita` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `program_studi`
--

INSERT INTO `program_studi` (`id_prodi`, `nama_prodi`, `id_pelajaran`, `id_minat`, `id_akreditasi`, `id_cita_cita`) VALUES
(1, 'Pendidikan Dokter', 2, 1, 1, 2),
(2, 'Pendidikan Dokter Gigi', 2, 1, 3, 2),
(3, 'Pendidikan Bahasa dan Sastra Indonesia', 6, 3, 2, 1),
(4, 'Sistem Informasi', 5, 2, 2, 4),
(5, 'Sosiologi', 7, 4, 2, 3),
(6, 'Akuntansi', 1, 5, 2, 4),
(8, 'Pendidikan Biologi', 2, 1, 1, 1),
(9, 'Pendidikan Matematika', 1, 2, 1, 1),
(10, ' Pendidikan Luar Sekolah', 7, 4, 2, 1),
(11, 'Pendidikan Guru Pendidikan Anak Usia Dini', 8, 1, 1, 1),
(12, 'Pendidikan Bahasa Dan Sastra Indonesia', 6, 3, 2, 1),
(13, ' Teknik Mesin', 4, 2, 2, 4),
(14, 'Pendidikan Guru Sekolah Dasar', 8, 4, 2, 1),
(15, 'Bimbingan Dan Konseling', 7, 1, 2, 1),
(16, 'Pendidikan Jasmani, Kesehatan Dan Rekreasi', 6, 3, 2, 1),
(17, 'Ilmu Tanah', 3, 5, 2, 4),
(18, 'Pendidikan Teknik Mesin', 4, 5, 2, 4),
(19, 'Teknik Informatika', 4, 2, 2, 4),
(20, 'Sistem Komputer', 3, 2, 2, 4),
(21, 'Pendidikan Pancasila Dan Kewarganegaraan', 7, 4, 2, 5),
(22, 'Manajemen', 7, 4, 1, 4),
(23, 'Farmasi', 2, 1, 3, 2),
(24, 'Ilmu Administrasi Negara', 1, 4, 1, 5),
(25, 'Akuntansi', 1, 5, 2, 5),
(26, ' 	Teknik Pertanian', 2, 2, 2, 4),
(27, ' 	Pendidikan Ekonomi', 1, 4, 2, 1),
(28, 'Psikologi', 7, 4, 3, 4),
(29, 'Ilmu Hama Dan Penyakit Tumbuhan', 3, 2, 1, 4),
(30, 'Agroekoteknologi', 2, 2, 2, 4),
(31, 'Agribisnis', 1, 5, 2, 4),
(32, ' 	Teknik Elektro', 1, 2, 2, 4),
(33, 'Teknologi Hasil Perikanan', 2, 2, 2, 4),
(34, 'Teknik Kimia', 3, 2, 1, 4),
(35, 'Pendidikan Biologi', 2, 4, 2, 1),
(36, 'Budidaya Perairan', 3, 2, 2, 4),
(37, 'Ilmu Hukum', 7, 4, 1, 5),
(38, ' Ilmu Kelautan', 3, 2, 2, 4),
(39, 'Teknik Arsitektur', 1, 2, 1, 4),
(40, 'Matematika', 1, 2, 2, 5),
(41, 'Teknik Pertambangan', 1, 2, 2, 5),
(42, 'Ilmu Keperawatan', 2, 1, 3, 2),
(43, 'Pendidikan Fisika', 4, 2, 2, 1),
(44, 'Pendidikan Kimia', 3, 2, 2, 1),
(45, 'Biologi', 2, 2, 1, 1),
(46, 'Fisika', 4, 2, 1, 1),
(47, 'Kesehatan Masyarakat', 2, 1, 2, 2),
(48, 'Peternakan', 2, 5, 2, 4),
(49, 'Ekonomi Pembangunan', 1, 5, 1, 5),
(50, 'Agronomi', 2, 2, 2, 4),
(51, 'Pendidikan Dokter', 2, 1, 1, 1),
(52, 'Pendidikan Dokter Gigi', 2, 1, 3, 1),
(53, 'Pendidikan Sejarah', 6, 4, 1, 1),
(54, 'Teknologi Hasil Pertanian', 2, 2, 2, 4),
(55, 'Teknik Sipil', 1, 2, 1, 5),
(56, 'Kimia', 3, 2, 1, 5),
(57, 'Nutrisi Dan Makanan Ternak', 2, 1, 2, 2),
(58, 'Penyuluhan Dan Komunikasi Pertanian', 2, 4, 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `nama_siswa` varchar(55) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `jurusan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `id_users`, `nama_siswa`, `gender`, `alamat`, `jurusan`) VALUES
(1, 2, 'siswa', 'Laki-laki', 'palembang', 'IPA'),
(2, 3, 'tes', 'Laki-laki', 'tes', 'tes'),
(3, 4, 'tes', 'Laki-laki', 'tes', 'tes'),
(4, 5, 'aaaaa', 'Laki-laki', 'aaaaa', 'aaaaa');

-- --------------------------------------------------------

--
-- Table structure for table `tipe_preferensi`
--

CREATE TABLE `tipe_preferensi` (
  `id_preferensi` int(11) NOT NULL,
  `tipe_preferensi` varchar(55) NOT NULL,
  `nama_preferensi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tipe_preferensi`
--

INSERT INTO `tipe_preferensi` (`id_preferensi`, `tipe_preferensi`, `nama_preferensi`) VALUES
(1, 'I', 'Kriteria Biasa (Usual Criterion)'),
(2, 'II', 'Kriteria Quasi (Quasi-Criterion)'),
(3, 'III', 'Kriteria Preferensi Linier\n(Criterion with linier\npreference)'),
(4, 'IV', 'Kriteria Level (Level Criterion)'),
(5, 'V', 'Kriteria Preferensi linier\narea yang tidak berbeda\n(Criterion with linier\npreference)'),
(6, 'VI', 'Kriteria Gaussian (Gaussian Criterion)');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `username` varchar(55) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_users`, `username`, `password`, `level`) VALUES
(1, 'Admin', '21232f297a57a5a743894a0e4a801fc3', 1),
(2, 'siswa', 'bcd724d15cde8c47650fda962968f102', 2),
(3, 'tes', '28b662d883b6d76fd96e4ddc5e9ba780', 2),
(4, 'tes', '28b662d883b6d76fd96e4ddc5e9ba780', 2),
(5, 'aaaaa', '594f803b380a41396ed63dca39503542', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akreditasi`
--
ALTER TABLE `akreditasi`
  ADD PRIMARY KEY (`id_akreditasi`);

--
-- Indexes for table `cita_cita`
--
ALTER TABLE `cita_cita`
  ADD PRIMARY KEY (`id_cita_cita`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`),
  ADD KEY `id_preferensi` (`id_preferensi`);

--
-- Indexes for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  ADD PRIMARY KEY (`id_pelajaran`);

--
-- Indexes for table `minat`
--
ALTER TABLE `minat`
  ADD PRIMARY KEY (`id_minat`);

--
-- Indexes for table `nilai_cita_cita`
--
ALTER TABLE `nilai_cita_cita`
  ADD PRIMARY KEY (`id_nilai_cita_cita`),
  ADD KEY `id_siswa` (`id_siswa`),
  ADD KEY `id_cita_cita` (`id_cita_cita`);

--
-- Indexes for table `nilai_minat`
--
ALTER TABLE `nilai_minat`
  ADD PRIMARY KEY (`id_nilai_minat`),
  ADD KEY `id_siswa` (`id_siswa`),
  ADD KEY `id_minat` (`id_minat`);

--
-- Indexes for table `nilai_pelajaran`
--
ALTER TABLE `nilai_pelajaran`
  ADD PRIMARY KEY (`id_nilai_pelajaran`),
  ADD KEY `id_siswa` (`id_siswa`),
  ADD KEY `id_mk` (`id_pelajaran`);

--
-- Indexes for table `perbandingan_kriteria`
--
ALTER TABLE `perbandingan_kriteria`
  ADD PRIMARY KEY (`id_perbandingan`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indexes for table `program_studi`
--
ALTER TABLE `program_studi`
  ADD PRIMARY KEY (`id_prodi`),
  ADD KEY `id_mk` (`id_pelajaran`),
  ADD KEY `id_minat` (`id_minat`),
  ADD KEY `id_akreditasi` (`id_akreditasi`),
  ADD KEY `id_cita_cita` (`id_cita_cita`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD KEY `id_users` (`id_users`);

--
-- Indexes for table `tipe_preferensi`
--
ALTER TABLE `tipe_preferensi`
  ADD PRIMARY KEY (`id_preferensi`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akreditasi`
--
ALTER TABLE `akreditasi`
  MODIFY `id_akreditasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `cita_cita`
--
ALTER TABLE `cita_cita`
  MODIFY `id_cita_cita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  MODIFY `id_pelajaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `minat`
--
ALTER TABLE `minat`
  MODIFY `id_minat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `nilai_cita_cita`
--
ALTER TABLE `nilai_cita_cita`
  MODIFY `id_nilai_cita_cita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `nilai_minat`
--
ALTER TABLE `nilai_minat`
  MODIFY `id_nilai_minat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `nilai_pelajaran`
--
ALTER TABLE `nilai_pelajaran`
  MODIFY `id_nilai_pelajaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `perbandingan_kriteria`
--
ALTER TABLE `perbandingan_kriteria`
  MODIFY `id_perbandingan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `program_studi`
--
ALTER TABLE `program_studi`
  MODIFY `id_prodi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tipe_preferensi`
--
ALTER TABLE `tipe_preferensi`
  MODIFY `id_preferensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD CONSTRAINT `kriteria_ibfk_1` FOREIGN KEY (`id_preferensi`) REFERENCES `tipe_preferensi` (`id_preferensi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nilai_cita_cita`
--
ALTER TABLE `nilai_cita_cita`
  ADD CONSTRAINT `nilai_cita_cita_ibfk_2` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_cita_cita_ibfk_3` FOREIGN KEY (`id_cita_cita`) REFERENCES `cita_cita` (`id_cita_cita`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nilai_minat`
--
ALTER TABLE `nilai_minat`
  ADD CONSTRAINT `nilai_minat_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_minat_ibfk_2` FOREIGN KEY (`id_minat`) REFERENCES `minat` (`id_minat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nilai_pelajaran`
--
ALTER TABLE `nilai_pelajaran`
  ADD CONSTRAINT `nilai_pelajaran_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_pelajaran_ibfk_2` FOREIGN KEY (`id_pelajaran`) REFERENCES `mata_pelajaran` (`id_pelajaran`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `perbandingan_kriteria`
--
ALTER TABLE `perbandingan_kriteria`
  ADD CONSTRAINT `perbandingan_kriteria_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `program_studi`
--
ALTER TABLE `program_studi`
  ADD CONSTRAINT `program_studi_ibfk_1` FOREIGN KEY (`id_pelajaran`) REFERENCES `mata_pelajaran` (`id_pelajaran`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `program_studi_ibfk_2` FOREIGN KEY (`id_minat`) REFERENCES `minat` (`id_minat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `program_studi_ibfk_4` FOREIGN KEY (`id_cita_cita`) REFERENCES `cita_cita` (`id_cita_cita`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `program_studi_ibfk_5` FOREIGN KEY (`id_akreditasi`) REFERENCES `akreditasi` (`id_akreditasi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
