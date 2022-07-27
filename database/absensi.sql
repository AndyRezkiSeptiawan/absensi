-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2022 at 08:22 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `absensi`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id_absen` int(11) NOT NULL,
  `id_pegawai` varchar(20) NOT NULL,
  `tgl` date NOT NULL,
  `waktu_masuk` time NOT NULL,
  `waktu_keluar` time NOT NULL,
  `keterangan` enum('Masuk','Keluar') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`id_absen`, `id_pegawai`, `tgl`, `waktu_masuk`, `waktu_keluar`, `keterangan`) VALUES
(24, '22842', '2022-07-07', '22:21:00', '22:29:00', 'Keluar');

-- --------------------------------------------------------

--
-- Table structure for table `bidang`
--

CREATE TABLE `bidang` (
  `id_bidang` smallint(3) NOT NULL,
  `nama_bidang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bidang`
--

INSERT INTO `bidang` (`id_bidang`, `nama_bidang`) VALUES
(30, 'Tata Usaha'),
(1111, 'Marketing'),
(1112, 'IT'),
(1113, 'Akuntan'),
(1114, 'Kebersihan'),
(1115, 'PEM'),
(1117, 'Pemantau'),
(1118, 'Marketing');

-- --------------------------------------------------------

--
-- Table structure for table `cuti`
--

CREATE TABLE `cuti` (
  `id_cuti` int(11) NOT NULL,
  `id_pegawai` varchar(20) NOT NULL,
  `jenis_cuti` enum('Cuti Tahunan','Cuti Sakit','Cuti Alasan Penting','Cuti Melahirkan','Cuti Besar','Cuti Diluar Tanggungan Negara') NOT NULL,
  `mulai` date NOT NULL,
  `akhir` date NOT NULL,
  `waktu_pengajuan` date NOT NULL,
  `bukti` varchar(100) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `status_cuti` enum('Ajukan','Diperiksa','Diterima','Ditolak','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cuti`
--

INSERT INTO `cuti` (`id_cuti`, `id_pegawai`, `jenis_cuti`, `mulai`, `akhir`, `waktu_pengajuan`, `bukti`, `keterangan`, `status_cuti`) VALUES
(2, '37196', 'Cuti Melahirkan', '2022-06-01', '2022-07-01', '2022-06-21', '21062022130855102159-26335-1-SM.pdf', '<p>Melahirkan</p>', 'Diterima'),
(4, '18631990', 'Cuti Alasan Penting', '2022-06-21', '2022-06-24', '2022-06-22', '2206202219143811-Article Text-32-2-10-20170905.pdf', '<p>Cuti Mengikuti Kegiatan Pemerintah</p>', 'Diterima'),
(8, '37196', 'Cuti Tahunan', '2022-06-13', '2022-06-16', '2022-06-29', '29062022195601aaa.png', '<p>andi</p>', 'Diterima'),
(9, '77810', 'Cuti Tahunan', '2022-07-01', '2022-07-07', '2022-06-29', '29062022201134pasien-penderita-penyakit-demam-berdarah-dengue-dbd-menjalani-perawatan-_160205140536-', '<p>mohon cuti tahunan</p>', 'Diterima'),
(10, '22842', 'Cuti Tahunan', '2022-07-07', '2022-07-11', '2022-07-07', '07072022223359Picture2.png', '<p>coba coba</p>', 'Diterima'),
(12, '37196', 'Cuti Sakit', '2022-07-27', '2022-07-29', '2022-07-27', '27072022135808Sistem usulan baru.png', '<p>Sakit demam berdarah</p>', 'Ajukan');

-- --------------------------------------------------------

--
-- Table structure for table `data_pegawai`
--

CREATE TABLE `data_pegawai` (
  `id_pegawai` varchar(20) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `id_bidang` smallint(3) NOT NULL,
  `id_pangkat` int(11) NOT NULL,
  `jenis` enum('PNS','HONORER') NOT NULL,
  `jum_cuti` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_pegawai`
--

INSERT INTO `data_pegawai` (`id_pegawai`, `nik`, `nama`, `id_bidang`, `id_pangkat`, `jenis`, `jum_cuti`) VALUES
('11250', '13580', 'Ari', 30, 5, 'HONORER', 10),
('18631990', '18631990', 'Dayat Ambalang', 30, 5, 'PNS', 8),
('22842', '1329100912', 'Hamdah, SP, MT.', 1112, 1, 'PNS', 7),
('37196', '00907908080787', 'Anissa', 1111, 4, 'PNS', 1),
('77810', '17268', 'Muhlan', 1113, 4, 'HONORER', 5);

-- --------------------------------------------------------

--
-- Table structure for table `gaji`
--

CREATE TABLE `gaji` (
  `id_gaji` int(11) NOT NULL,
  `id_pegawai` varchar(20) NOT NULL,
  `waktu` date NOT NULL,
  `gaji_pokok` int(10) NOT NULL,
  `t_istri_suami` int(10) DEFAULT NULL,
  `t_anak` int(10) DEFAULT NULL,
  `t_umum` int(10) DEFAULT NULL,
  `t_struktur` int(10) DEFAULT NULL,
  `t_fungsi` int(10) DEFAULT NULL,
  `t_lain` int(10) DEFAULT NULL,
  `t_bulat` int(10) DEFAULT NULL,
  `t_beras` int(10) DEFAULT NULL,
  `t_pajak` int(10) DEFAULT NULL,
  `jml_kotor` int(10) DEFAULT NULL,
  `pot_beras` int(10) DEFAULT NULL,
  `iwp` int(10) DEFAULT NULL,
  `pot_pph` int(10) DEFAULT NULL,
  `sewa_rumah` int(10) DEFAULT NULL,
  `tunggakan` int(10) DEFAULT NULL,
  `utang` int(10) DEFAULT NULL,
  `pot_lain` int(10) DEFAULT NULL,
  `taperum` int(10) DEFAULT NULL,
  `jml_pot` int(10) NOT NULL,
  `jml_bersih` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jam`
--

CREATE TABLE `jam` (
  `id_jam` tinyint(1) NOT NULL,
  `start` time NOT NULL,
  `finish` time NOT NULL,
  `keterangan` enum('Masuk','Pulang') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jam`
--

INSERT INTO `jam` (`id_jam`, `start`, `finish`, `keterangan`) VALUES
(1, '07:50:00', '09:50:00', 'Masuk'),
(2, '17:00:00', '23:00:00', 'Pulang');

-- --------------------------------------------------------

--
-- Table structure for table `libur`
--

CREATE TABLE `libur` (
  `id_calender` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `libur`
--

INSERT INTO `libur` (`id_calender`, `nama`, `tgl`) VALUES
(1, 'Kelahiran Pancasila', '2022-06-01'),
(2, 'Hari Kelahiran Pancasila', '2022-07-17');

-- --------------------------------------------------------

--
-- Table structure for table `pangkat`
--

CREATE TABLE `pangkat` (
  `id_pangkat` int(11) NOT NULL,
  `pangkat` varchar(50) NOT NULL,
  `golongan` varchar(30) NOT NULL,
  `gaji` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pangkat`
--

INSERT INTO `pangkat` (`id_pangkat`, `pangkat`, `golongan`, `gaji`) VALUES
(1, 'Pembina Utama Muda', 'IV/c', 4500000),
(4, 'Pembina Tingkat I', 'IV/b', 3800000),
(5, 'Penata Tingkat I', 'IV/a', 3200000);

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_gaji`
--

CREATE TABLE `riwayat_gaji` (
  `id_rgaji` int(15) NOT NULL,
  `id_pegawai` varchar(20) NOT NULL,
  `tgl_pengajian` date NOT NULL,
  `gaji` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `riwayat_gaji`
--

INSERT INTO `riwayat_gaji` (`id_rgaji`, `id_pegawai`, `tgl_pengajian`, `gaji`) VALUES
(9, '11250', '2022-06-29', 3200000),
(10, '18631990', '2022-06-29', 3200000),
(11, '37196', '2022-06-29', 3800000),
(12, '77810', '2022-06-29', 3200000);

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_pangkat`
--

CREATE TABLE `riwayat_pangkat` (
  `id_rpngkat` int(11) NOT NULL,
  `id_pegawai` varchar(20) NOT NULL,
  `pangkat_lama` varchar(50) NOT NULL,
  `pangkat_baru` int(11) NOT NULL,
  `waktu_perubahan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `riwayat_pangkat`
--

INSERT INTO `riwayat_pangkat` (`id_rpngkat`, `id_pegawai`, `pangkat_lama`, `pangkat_baru`, `waktu_perubahan`) VALUES
(3, '37196', 'Penata Tingkat I (IV/a)', 4, '2022-06-23'),
(4, '77810', 'Penata Tingkat I (IV/a)', 4, '2022-06-29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` smallint(5) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `foto` varchar(100) DEFAULT 'no-foto.png',
  `username` varchar(25) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` enum('Admin','Pegawai','Pimpinan') NOT NULL DEFAULT 'Pegawai'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nik`, `nama`, `telp`, `email`, `foto`, `username`, `password`, `level`) VALUES
(1, '12312312332123', 'Ahmad Fadillah 1', '08139212092', 'ahm.fadil@mail.com', '1642480288.jpg', 'ahmad', '202cb962ac59075b964b07152d234b70', 'Admin'),
(6, '00907908080787', 'Anissa Fadilla', '08151231980', 'anissa.Anissa31@mail.com', '22062022110821citra lena bagus.PNG', 'anissa', '827ccb0eea8a706c4c34a16891f84e7b', 'Pegawai'),
(15, '196208151985031021', 'Nor Fadillah, S,Sos', '08568998890', 'norfadillah@gmail.com', '10062022081701Capture4.PNG', 'nor fadillah', '827ccb0eea8a706c4c34a16891f84e7b', 'Pegawai'),
(17, '123', 'cahya', '123', 'cahya@gmail.com', '', 'cahya', '202cb962ac59075b964b07152d234b70', 'Pegawai'),
(18, '18631990', 'Dayat', '085689901120', 'Dayat23@gmail.com', '', 'dayat', '827ccb0eea8a706c4c34a16891f84e7b', 'Pegawai'),
(19, '1329100912', 'Hamdah', '08898328009', 'hamdah@gmail.com', '0707202222573080082c73-854e-419e-ae21-551548f0cfa3.jpg', 'hamdah', '827ccb0eea8a706c4c34a16891f84e7b', 'Pimpinan'),
(21, '17268', 'Muhlan', '187219118', 'muhlan@gmail.com', '', 'muhlan', '202cb962ac59075b964b07152d234b70', 'Pegawai');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id_absen`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indexes for table `bidang`
--
ALTER TABLE `bidang`
  ADD PRIMARY KEY (`id_bidang`);

--
-- Indexes for table `cuti`
--
ALTER TABLE `cuti`
  ADD PRIMARY KEY (`id_cuti`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indexes for table `data_pegawai`
--
ALTER TABLE `data_pegawai`
  ADD PRIMARY KEY (`id_pegawai`),
  ADD KEY `id_divisi` (`id_bidang`);

--
-- Indexes for table `gaji`
--
ALTER TABLE `gaji`
  ADD PRIMARY KEY (`id_gaji`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indexes for table `jam`
--
ALTER TABLE `jam`
  ADD PRIMARY KEY (`id_jam`);

--
-- Indexes for table `libur`
--
ALTER TABLE `libur`
  ADD PRIMARY KEY (`id_calender`);

--
-- Indexes for table `pangkat`
--
ALTER TABLE `pangkat`
  ADD PRIMARY KEY (`id_pangkat`);

--
-- Indexes for table `riwayat_gaji`
--
ALTER TABLE `riwayat_gaji`
  ADD PRIMARY KEY (`id_rgaji`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indexes for table `riwayat_pangkat`
--
ALTER TABLE `riwayat_pangkat`
  ADD PRIMARY KEY (`id_rpngkat`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `bidang`
--
ALTER TABLE `bidang`
  MODIFY `id_bidang` smallint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1119;

--
-- AUTO_INCREMENT for table `cuti`
--
ALTER TABLE `cuti`
  MODIFY `id_cuti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `jam`
--
ALTER TABLE `jam`
  MODIFY `id_jam` tinyint(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `libur`
--
ALTER TABLE `libur`
  MODIFY `id_calender` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pangkat`
--
ALTER TABLE `pangkat`
  MODIFY `id_pangkat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `riwayat_gaji`
--
ALTER TABLE `riwayat_gaji`
  MODIFY `id_rgaji` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `riwayat_pangkat`
--
ALTER TABLE `riwayat_pangkat`
  MODIFY `id_rpngkat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
