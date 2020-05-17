-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2020 at 10:36 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pendataanmagang`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_karyawan`
--

CREATE TABLE `data_karyawan` (
  `NIK` varchar(10) NOT NULL,
  `Nama` varchar(255) NOT NULL,
  `StatusKerja` varchar(25) NOT NULL,
  `Telepon` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `access_level` int(11) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_karyawan`
--

INSERT INTO `data_karyawan` (`NIK`, `Nama`, `StatusKerja`, `Telepon`, `password`, `access_level`) VALUES
('1111', 'Alex', 'Admin', '', '9a99c59b66ba09bbb2402baa42fb091d4ed4fff4', 3),
('1234', 'Jessica Amazy', 'Admin', '0876541234', '93f26648e3659c10bfc323101d1339e9c4e2eafa', 4),
('123456', 'Alex', 'Admin', '', '69c5fcebaa65b560eaf06c3fbeb481ae44b8d618', 3),
('6666', 'testDosenA', 'Dosen', '09876543211', 'de59a3e0ced129d422e6fa9b0ae46567e31b0944', -1),
('7777', 'TestBKMK', 'BKMK', '09876543211', 'de59a3e0ced129d422e6fa9b0ae46567e31b0944', 2),
('8888', 'TestProdi', 'Kaprogdi', '09876543211', 'de59a3e0ced129d422e6fa9b0ae46567e31b0944', -2),
('9999', 'TestBAAK', 'BAAK', '09876543211', 'de59a3e0ced129d422e6fa9b0ae46567e31b0944', 3);

-- --------------------------------------------------------

--
-- Table structure for table `data_magang`
--

CREATE TABLE `data_magang` (
  `NIM` varchar(10) NOT NULL,
  `Dospem` varchar(50) DEFAULT 'Belum Ada',
  `KodeMagang` varchar(50) NOT NULL,
  `NamaIndustri` varchar(255) NOT NULL,
  `Kode` varchar(255) NOT NULL,
  `NamaPerusahaan` varchar(255) NOT NULL,
  `AlamatPerusahaan` text NOT NULL,
  `Telepon` varchar(15) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Supervisor` varchar(255) NOT NULL,
  `JabatanSupervisor` varchar(50) NOT NULL,
  `Departemen` varchar(50) NOT NULL,
  `TanggalMagang` date NOT NULL,
  `HariMagang` int(10) NOT NULL,
  `Verifikasi` int(11) NOT NULL DEFAULT 0,
  `SKM` blob DEFAULT NULL,
  `fileSize` varchar(255) NOT NULL,
  `fileType` varchar(50) NOT NULL DEFAULT 'application/pdf',
  `fileName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_magang`
--

INSERT INTO `data_magang` (`NIM`, `Dospem`, `KodeMagang`, `NamaIndustri`, `Kode`, `NamaPerusahaan`, `AlamatPerusahaan`, `Telepon`, `Email`, `Supervisor`, `JabatanSupervisor`, `Departemen`, `TanggalMagang`, `HariMagang`, `Verifikasi`, `SKM`, `fileSize`, `fileType`, `fileName`) VALUES
('12345678', 'testDosenA', 'hJgr7iIK', 'aaaaaaaa', '12345', 'aaaaaaaa', 'aaaaaaaaa', '1234567890', 'a@gmail.com', 'asdfgh', 'asdadds', 'keuang', '2020-03-11', 2, 1, 0x416c6578616e646572477261636574616e74696f6e6f2d3230323030312d30352d496e744379622d63657274696669636174652e706466, '', '', ''),
('53160024', 'testDosenA', 'LMLHuboX', 'aaaaaaaa', '12345', 'aaaaaaaa', 'aaaaaaaaa', '1234567890', 'a@gmail.com', 'asdfgh', 'asdadds', 'aaaaaaaaaa', '2020-03-19', 5, 0, 0x544d3034782e706466, '', 'application/pdf', ''),
('41160078', 'testDosenA', 'UfTCkh6J', 'Distribusi (perdagangan) besar', '6.1', 'PT Giant Sumarindo', 'Jalan Tanah Abang IV No. 60 K-L', '02134830373', 'widjaja.t68@gmail.com', 'Widjaja Tjahjadi', 'Manajer HRD', 'HR&GA', '2019-05-08', 3, 1, NULL, '', '', ''),
('12345679', 'testDosenA', 'ZicTFmBP', 'aaaaaaaa', '12345', 'aaaaaaaa', 'aaaaaaaaa', '1234567890', 'a@gmail.com', 'asdfgh', 'asdadds', 'aaaaaaaaaa', '2020-03-05', 2, 1, 0x30, '', 'application/pdf', '');

-- --------------------------------------------------------

--
-- Table structure for table `data_mahasiswa`
--

CREATE TABLE `data_mahasiswa` (
  `NIM` varchar(10) NOT NULL,
  `KodeMagang` varchar(50) NOT NULL,
  `NamaMahasiswa` varchar(255) NOT NULL,
  `Jurusan` varchar(255) NOT NULL,
  `Angkatan` int(4) NOT NULL,
  `TahunAkademik` varchar(50) DEFAULT '2019/2020',
  `Status` varchar(20) DEFAULT NULL,
  `Semester` varchar(8) DEFAULT 'Ganjil',
  `JumlahBimbingan` int(14) DEFAULT 0,
  `password` varchar(255) NOT NULL,
  `access_level` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_mahasiswa`
--

INSERT INTO `data_mahasiswa` (`NIM`, `KodeMagang`, `NamaMahasiswa`, `Jurusan`, `Angkatan`, `TahunAkademik`, `Status`, `Semester`, `JumlahBimbingan`, `password`, `access_level`) VALUES
('12345678', 'hJgr7iIK', 'Joko Susanto', 'Teknik Informatika', 2034, '2019/2020', 'Boleh Magang', 'Ganjil', 1, '8c9a62171b4cb7af53484cefadf0590329e7c577', 1),
('12345679', 'ZicTFmBP', 'bokoboko', 'Teknik Informatika', 2010, '2019/2020', 'Boleh Magang', 'Ganjil', 1, '8c9a62171b4cb7af53484cefadf0590329e7c577', 1),
('12345680', '', 'popor', 'Teknik Informatika', 2011, '2019/2020', 'Belum Magang', 'Ganjil', 1, '8c9a62171b4cb7af53484cefadf0590329e7c577', 1),
('12345681', '', 'desudesu', 'Teknik Informatika', 2012, '2019/2020', 'Belum Magang', 'Ganjil', 1, '8c9a62171b4cb7af53484cefadf0590329e7c577', 1),
('12345682', '', 'anysd', 'Teknik Informatika', 2013, '2019/2020', 'Belum Magang', 'Ganjil', 1, '8c9a62171b4cb7af53484cefadf0590329e7c577', 1),
('12345683', '', 'santi2', 'Akuntansi', 2009, '2019/2020', 'Boleh Magang', 'Ganjil', 1, '8c9a62171b4cb7af53484cefadf0590329e7c577', 1),
('12345684', '', 'bokoboko2', 'Akuntansi', 2010, '2019/2020', 'Boleh Magang', 'Ganjil', 1, '8c9a62171b4cb7af53484cefadf0590329e7c577', 1),
('12345685', '', 'popor2', 'Akuntansi', 2011, '2019/2020', 'Belum Magang', 'Ganjil', 1, '8c9a62171b4cb7af53484cefadf0590329e7c577', 1),
('12345686', '', 'desudesu2', 'Akuntansi', 2012, '2019/2020', 'Belum Magang', 'Ganjil', 1, '8c9a62171b4cb7af53484cefadf0590329e7c577', 1),
('12345687', '', 'anysd2', 'Akuntansi', 2013, '2019/2020', 'Belum Magang', 'Ganjil', 1, '8c9a62171b4cb7af53484cefadf0590329e7c577', 1),
('12345688', '', 'santi', 'Teknik Informatika', 2009, '2019/2020', 'Belum Magang', 'Ganjil', 1, '8c9a62171b4cb7af53484cefadf0590329e7c577', 1),
('26160361', '', 'Elsera Liduwina', 'Manajemen', 2016, '2019/2020', 'Belum Magang', 'Ganjil', 1, '8c9a62171b4cb7af53484cefadf0590329e7c577', 1),
('40160257', '', 'Phendy Chandra', 'Sistem Informasi', 2016, '2019/2020', 'ok', 'Ganjil', 1, '8c9a62171b4cb7af53484cefadf0590329e7c577', 1),
('41160078', 'UfTCkh6J', 'Jessica Wijaya', 'Sistem Informasi', 2016, '2019/2020', 'Boleh Magang', 'Ganjil', 3, '8c9a62171b4cb7af53484cefadf0590329e7c577', 1),
('43160443', '', 'Viriyaparami Tofani', 'Sistem Informasi', 2016, '2019/2020', 'Belum Magang', 'Ganjil', 1, '8c9a62171b4cb7af53484cefadf0590329e7c577', 1),
('51170019', '', 'Alex3', 'Teknik Informatika', 2017, '2020/2021', 'Belum Magang', 'Ganjil', 1, '8c9a62171b4cb7af53484cefadf0590329e7c577', 1),
('51170020', 'Belum Magang', 'Alex4', 'Teknik Informatika', 2017, '2018/2019', 'Belum Magang', 'Ganjil', 1, '8c9a62171b4cb7af53484cefadf0590329e7c577', 1),
('51170021', 'Belum Magang', 'Alex5', 'Teknik Informatika', 2017, '2020/2021', 'Boleh Magang', 'Ganjil', 1, '8c9a62171b4cb7af53484cefadf0590329e7c577', 1),
('51170022', 'Belum Magang', 'Alex2', 'Teknik Informatika', 2017, '2019/2020', 'Belum Magang', 'Ganjil', 1, '8c9a62171b4cb7af53484cefadf0590329e7c577', 1),
('53160012', '', 'Filemon', 'Teknik Informatika', 2016, '2019/2020', 'Belum Magang', 'Genap', 1, '8c9a62171b4cb7af53484cefadf0590329e7c577', 1),
('53160013', '', 'Ribka Velia Santoso', 'Ilmu Komunikasi', 2016, '2019/2020', 'Belum Magang', 'Genap', 1, '8c9a62171b4cb7af53484cefadf0590329e7c577', 1),
('53160014', '', 'Stevenius', 'Sistem Informasi', 2016, '2019/2020', 'Belum Magang', 'Genap', 1, '8c9a62171b4cb7af53484cefadf0590329e7c577', 1),
('53160015', '', 'Vina Yunizafach Cahyani', 'Ilmu Komunikasi', 2016, '2020/2021', 'Belum Magang', 'Ganjil', 1, '8c9a62171b4cb7af53484cefadf0590329e7c577', 1),
('53160016', '', 'Jonathan Sun', 'Administrasi Bisnis', 2016, '2020/2021', 'Belum Magang', 'Ganjil', 1, '8c9a62171b4cb7af53484cefadf0590329e7c577', 1),
('53160021', '', 'Filemon', 'Teknik Informatika', 2016, '2019/2020', 'Belum Magang', 'Genap', 0, '8c9a62171b4cb7af53484cefadf0590329e7c577', 1),
('53160022', '', 'Ribka Velia Santoso', 'Ilmu Komunikasi', 2016, '2019/2020', 'Belum Magang', 'Genap', 0, '8c9a62171b4cb7af53484cefadf0590329e7c577', 1),
('53160023', '', 'Stevenius', 'Sistem Informasi', 2016, '2019/2020', 'Belum Magang', 'Genap', 0, '8c9a62171b4cb7af53484cefadf0590329e7c577', 1),
('53160024', 'LMLHuboX', 'Vina Yunizafach Cahyani', 'Ilmu Komunikasi', 2016, '2020/2021', 'Menunggu Verifikasi', 'Ganjil', 0, '8c9a62171b4cb7af53484cefadf0590329e7c577', 1),
('53160025', '', 'Jonathan Sun', 'Administrasi Bisnis', 2016, '2020/2021', 'Belum Magang', 'Ganjil', 0, '8c9a62171b4cb7af53484cefadf0590329e7c577', 1);

-- --------------------------------------------------------

--
-- Table structure for table `data_mingguan`
--

CREATE TABLE `data_mingguan` (
  `id` int(100) NOT NULL,
  `KodeMagang` varchar(255) NOT NULL,
  `Minggu` int(10) NOT NULL,
  `Tanggal` date NOT NULL,
  `Comment` text NOT NULL,
  `CommentDospem` text DEFAULT NULL,
  `VerifDospem` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_mingguan`
--

INSERT INTO `data_mingguan` (`id`, `KodeMagang`, `Minggu`, `Tanggal`, `Comment`, `CommentDospem`, `VerifDospem`) VALUES
(2, 'UfTCkh6J', 1, '2020-01-27', 'Materi Manual Accounting 2', 'Helllo jokos', 1),
(3, 'UfTCkh6J', 2, '2020-01-27', 'Pemetaan proses bisnis', 'test comment', 1),
(4, 'hJgr7iIK', 1, '2020-03-14', 'saya cape kerja\r\nlagi', NULL, 0),
(5, 'hJgr7iIK', 2, '2020-03-14', 'hari ke 2 cape\r\ns', NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_karyawan`
--
ALTER TABLE `data_karyawan`
  ADD PRIMARY KEY (`NIK`);

--
-- Indexes for table `data_magang`
--
ALTER TABLE `data_magang`
  ADD PRIMARY KEY (`KodeMagang`);

--
-- Indexes for table `data_mahasiswa`
--
ALTER TABLE `data_mahasiswa`
  ADD PRIMARY KEY (`NIM`);

--
-- Indexes for table `data_mingguan`
--
ALTER TABLE `data_mingguan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_mingguan`
--
ALTER TABLE `data_mingguan`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
