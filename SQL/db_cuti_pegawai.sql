-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 13, 2023 at 08:02 PM
-- Server version: 10.5.22-MariaDB
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cutipega_db_cuti`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_absen`
--

CREATE TABLE `tbl_absen` (
  `kd_absen` int(5) NOT NULL,
  `tgl` text NOT NULL,
  `nik` varchar(15) NOT NULL,
  `jam` timestamp NOT NULL DEFAULT current_timestamp(),
  `kd_admin` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_absen`
--

INSERT INTO `tbl_absen` (`kd_absen`, `tgl`, `nik`, `jam`, `kd_admin`) VALUES
(2, '31-12-16', 'NIK112233', '2016-12-30 19:15:53', 0),
(3, '18-08-18', 'NIK112', '2018-08-17 17:10:53', 0),
(4, '18-08-18', 'NIK111', '2018-08-17 17:12:43', 0),
(5, '27-08-18', 'NIK100', '2018-08-27 12:15:51', 0),
(6, '14-10-19', 'NIK112', '2019-10-13 21:32:51', 0),
(7, '06-11-19', 'NIK112', '2019-11-06 08:27:32', 0),
(8, '27-06-20', 'NIK100', '2020-06-27 08:17:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_absenplg`
--

CREATE TABLE `tbl_absenplg` (
  `kd_absen` int(5) NOT NULL,
  `tgl` text NOT NULL,
  `nik` varchar(15) NOT NULL,
  `jam` timestamp NOT NULL DEFAULT current_timestamp(),
  `kd_admin` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_absenplg`
--

INSERT INTO `tbl_absenplg` (`kd_absen`, `tgl`, `nik`, `jam`, `kd_admin`) VALUES
(1, '18-08-18', 'NIK111', '2018-08-17 17:13:29', 0),
(2, '27-08-18', 'NIK100', '2018-08-27 12:16:30', 0),
(3, '14-10-19', 'NIK112', '2019-10-13 21:33:00', 0),
(4, '27-06-20', 'NIK100', '2020-06-27 08:16:58', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `kd_admin` int(5) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `foto` varchar(30) NOT NULL,
  `role` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`kd_admin`, `nama`, `username`, `password`, `foto`, `role`) VALUES
(1, 'admin', 'admin', 'admin', '', NULL),
(2, 'KABAG', 'KABAG', 'KABAG', '0', 'KABAG');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_agama`
--

CREATE TABLE `tbl_agama` (
  `kd_agama` int(5) NOT NULL,
  `agama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_agama`
--

INSERT INTO `tbl_agama` (`kd_agama`, `agama`) VALUES
(3, 'Islam'),
(4, 'Hindu'),
(5, 'Budha'),
(6, 'Konghucu'),
(7, 'Kristen'),
(8, 'Katolik');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cuty`
--

CREATE TABLE `tbl_cuty` (
  `kd_cuty` int(5) NOT NULL,
  `nik` varchar(15) NOT NULL,
  `kd_karyawan` varchar(30) NOT NULL,
  `tgl_pengajuan` date NOT NULL,
  `jml_hari` int(5) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_akhir` date NOT NULL,
  `jenis_cuty` varchar(100) NOT NULL,
  `alasan` varchar(30) NOT NULL,
  `alamat_selama_cuti` varchar(222) NOT NULL,
  `persetujuan` varchar(50) DEFAULT NULL,
  `file_arsip` varchar(200) NOT NULL,
  `atasan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_cuty`
--

INSERT INTO `tbl_cuty` (`kd_cuty`, `nik`, `kd_karyawan`, `tgl_pengajuan`, `jml_hari`, `tgl_mulai`, `tgl_akhir`, `jenis_cuty`, `alasan`, `alamat_selama_cuti`, `persetujuan`, `file_arsip`, `atasan`) VALUES
(88, '0', '0', '2003-08-23', 1, '2023-08-04', '2023-08-05', 'Tahunan', 'k', 'j', 'Ditolak', '', '197608272007031'),
(89, '198603192009031', '94', '2003-08-23', 1, '2023-08-03', '2023-08-04', 'Cuti Besar', 'j', 'ka', 'Ditolak', '', '197608272007031'),
(90, '198504202017012', '95', '2003-08-23', 3, '2023-08-01', '2023-08-03', 'Di luar Tanggungan Negara', 'contoh', 'jakarta', 'Disetujui', '', '197608272007031'),
(91, '198603192009031', '94', '2009-08-23', 5, '2023-08-26', '2023-08-31', 'Cuti Melahirkan', 'hamil', 'Jakarta Timur', 'Disetujui', '', '197608272007031'),
(92, '198603192009031', '133', '2023-08-23', 2, '2023-08-23', '2023-08-25', 'Cuti Sakit', 'Demam', 'Jakarta selatan', 'Disetujui', '', '197608272007031'),
(93, '199012022019172', '117', '2023-08-23', 1, '2023-08-24', '2023-08-25', 'Tahunan', 'pergi', 'jakarta', 'Disetujui', '', '197608272007031'),
(94, '198603192009031', '133', '2013-09-23', 2, '2023-09-13', '2023-09-15', 'Tahunan', 'sakit maag', 'Depok', NULL, '', '-');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jabatan`
--

CREATE TABLE `tbl_jabatan` (
  `kd_jabatan` int(5) NOT NULL,
  `jabatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_jabatan`
--

INSERT INTO `tbl_jabatan` (`kd_jabatan`, `jabatan`) VALUES
(1, 'KABAG'),
(2, 'KASUBAG DOKUMENTASI dan KEPEGAWAIAN'),
(3, 'PENGELOLA INFORMASI dan KEPEGAWAIAN'),
(4, 'BENDAHARA PENGELUARAN (BPP)'),
(5, 'ANALIS KEPEGAWAIAN / ANALIS SDM APARATUR AHLI MADYA'),
(6, 'ANALIS KEPEGAWAIAN / ANALIS SDM APARATUR AHLI MADYA MUDA'),
(7, 'ANALIS ORGANISASI dan TATA LAKSANA'),
(8, 'ANALIS PENGEMBANGAN KARIR'),
(9, 'ANALIS PENEGAKAN INTEGRITAS dan DISIPLIN SDM APARATUR'),
(10, 'ANALIS PELAYANAN'),
(11, 'ANALIS JABATAN'),
(12, 'ANALIS TATA LAKSANA'),
(13, 'PENGOLAH DATA DAN INFORMASI');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_karir`
--

CREATE TABLE `tbl_karir` (
  `kd_karir` int(5) NOT NULL,
  `nik` varchar(15) NOT NULL,
  `kd_jabatan` int(5) NOT NULL,
  `status` varchar(20) NOT NULL,
  `tgl_berlaku` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_karir`
--

INSERT INTO `tbl_karir` (`kd_karir`, `nik`, `kd_jabatan`, `status`, `tgl_berlaku`) VALUES
(11, '1234567890', 1, 'Pegawai', '2022-06-02');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_karyawan`
--

CREATE TABLE `tbl_karyawan` (
  `kd_karyawan` int(5) NOT NULL,
  `nik` varchar(15) NOT NULL,
  `password` varchar(30) NOT NULL,
  `nama_karyawan` varchar(30) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` varchar(10) NOT NULL,
  `no_telp` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `kd_agama` int(5) NOT NULL,
  `gol_darah` varchar(5) NOT NULL,
  `no_ktp` text NOT NULL,
  `kd_jabatan` int(5) NOT NULL,
  `bio` text NOT NULL,
  `foto` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_karyawan`
--

INSERT INTO `tbl_karyawan` (`kd_karyawan`, `nik`, `password`, `nama_karyawan`, `tempat_lahir`, `tgl_lahir`, `jk`, `no_telp`, `email`, `alamat`, `kd_agama`, `gol_darah`, `no_ktp`, `kd_jabatan`, `bio`, `foto`) VALUES
(100, '-', 'fahmi', 'Ali Fahmi Darmawan', 'Jakarta', '1955-01-06', 'Laki-laki', '-', 'fahmiali55@gmail.com', 'Tebet, Jakarta Selatan', 3, '0', '-', 13, '0', 'pegawai_pria2.png'),
(101, '-', 'robby', 'Robby Dwi Rajendra', 'Jakarta', '1997-06-15', 'Laki-laki', '085694351234', 'robbydr@gmail.com', 'Jakarta', 7, '0', '-', 13, '0', 'pegawai_pria2.png'),
(117, '199012022019172', 'lulu', 'Lulu Handayani, S.M', 'Jakarta', '1990-12-02', 'Perempuan', '-', 'luluhandayann0212@gmail.com', 'Jakarta', 3, '0', ' S.M', 10, '0', 'pegawai_wanita1.png'),
(116, '-', 'rinno', 'Rinno Firmanto,A.Md. Ak', 'Bekasi, Jawa Barat', '1993-07-19', 'Laki-laki', '-', 'rinnofirmantoo@gmail.com', 'Bekasi, Jawa Barat', 3, '0', 'A.Md. Ak', 8, '0', 'pegawai_pria2.png'),
(114, '199303132020192', 'diana', 'Diana Nauli, S.E', 'Jakarta', '1993-03-13', 'Perempuan', '-', 'dianauli@gmail.com', 'Jakarta', 3, '0', 'S.E', 10, '0', 'pegawai_wanita1.png'),
(115, '199006172020191', 'didik', 'Didik Sucianto, A.Md. Ak', 'Garut', '1990-06-17', 'Laki-laki', '-', 'didiksantoo@gmmail.com', 'Jakarta', 3, '0', 'A.Md. Ak', 10, '0', 'pegawai_pria2.png'),
(113, '-', 'fauzi', 'Fauzi Rachmansyah, ST ', 'Bekasi, Jawa Barat', '1994-09-11', 'Laki-laki', '081319335336', 'fauzirachmatt@gmail.com', 'Bekasi, Jawa Barat', 3, '0', 'ST ', 13, '0', 'pegawai_pria2.png'),
(138, '197608272007031', 'kabag', 'Dr. Gutmen Nainggolan, SH ,M.H', 'Medan, Sumatera Utara', '1976-08-27', 'Laki-laki', '-', 'gutmen_nainggolan@gmail.com', '-', 3, '0', 'SH ,M.HUM', 1, '0', 'icon_kabag.png'),
(102, '-', 'afharizzy', 'M. Alfharizzy Y', 'Jakarta', '1996-11-07', '', '-', 'afharizzy_mev@gmail.com', 'Jakarta', 3, '0', '-', 12, '0', 'pegawai_pria2.png'),
(103, '199207092018172', 'karina', 'Karina Kharisma Putri, S.PSI', 'Jakarta', '1992-07-09', 'Perempuan', '-', 'karinakharismaput@gmail.com', 'Jakarta', 3, '0', 'S.PSI', 12, '0', 'pegawai_wanita1.png'),
(104, '199008172017062', 'yulia', 'Yulia Herawati, S.KOM ', 'Jakarta', '1990-08-17', 'Perempuan', '-', 'yulher221@gmail.com', 'Jakarta', 3, '0', 'S.KOM ', 12, '0', 'pegawai_wanita1.png'),
(105, '-', 'seske', 'Seske Febrina Debella, SE', 'Bekasi, Jawa Barat', '1994-03-09', 'Perempuan', '-', 'seskefebinadella@gmail.com', 'Bekasi, Jawa Barat', 7, '0', 'SE', 12, '0', 'pegawai_wanita1.png'),
(106, '-', 'ryan', 'Ryan Syahroni, S.KOM', 'Jakarta', '1996-07-16', 'Laki-laki', '-', 'Ryansyahr@gmail.com', 'Jakarta', 3, '0', 'S.KOM', 13, '0', 'pegawai_pria2.png'),
(107, '199103052015032', 'ruth', 'Ruth Tirtahani S. Hutauruk, SE', 'Medan', '1991-03-05', '', '-', 'tirtahartanutauruk@gmail.com', 'Jakarta', 7, '0', 'SE', 13, '0', 'pegawai_wanita1.png'),
(108, '199009202014011', '-', 'Rishandoyo Sukarno, SH ', 'Bandung', '1990-09-20', 'Laki-laki', '-', 'rishandoyoss@ggmail.com', 'Kamal muara, Jakarta Utara', 3, '0', ' SH ', 12, '0', 'pegawai_pria2.png'),
(109, '199101052010042', 'riris', 'Risis Monica N. S.IP, ME', 'Jakarta', '1991-01-05', 'Perempuan', '-', 'monicarisris@gmail.com', 'Jakarta', 3, '0', 'S.IP, ME', 11, '0', 'pegawai_wanita1.png'),
(110, '-', 'kerisianggara', 'Kerisianggara S.E ', 'Salatiga, Jawa Tengah', '1994-08-19', 'Laki-laki', '-', 'krissianggara03@gmail.com', 'Jakarta', 7, '0', ' S.E ', 11, '0', 'pegawai_pria2.png'),
(111, '199006172017152', 'karina', 'Karina Octavia, S. AK', 'Bogor', '1990-06-17', 'Perempuan', '-', 'karinnnaoctaviaa@gmail.com', 'Bogor', 3, '0', 'S. AK', 11, '0', 'pegawai_wanita1.png'),
(112, '-', 'jhoniee', 'Jhonlee. M., SP ', 'Magelang', '1996-03-10', 'Laki-laki', '-', 'jhonnie96@gmail.com', 'Bekasi, Jawa Barat', 7, '0', ' M., SP ', 10, '0', 'pegawai_pria2.png'),
(118, '-', 'tri', 'Tri Rachmandani, S.Psi ', 'Makassar', '1994-03-20', 'Laki-laki', '-', 'rachmadanitri@Gmail.com', 'Jakarta', 3, '0', 'S.Psi ', 11, '0', 'pegawai_pria2.png'),
(119, '199109132020181', 'prasetyo', 'Prasetyo Wibisono, SH', 'Bandung', '1991-09-13', 'Laki-laki', '-', 'prasetyow1991@gmail.com', 'Jakarta', 3, '0', 'SH', 11, '0', 'pegawai_pria2.png'),
(120, '199408182021201', 'subhan', 'Subban Ichsan, SH ', 'Jakarta', '1994-08-18', 'Laki-laki', '-', 'subhansan94@gmail.com', 'Jakarta', 3, '0', 'SH ', 11, '0', 'pegawai_pria2.png'),
(121, '199008072018031', 'imam', 'Mukhammad Imam Bukhori, S.IP', 'Jakarta', '1990-08-07', 'Laki-laki', '087895610939', 'imambukhori90@gmail.com', 'Jakarta', 3, '0', 'S.IP', 8, '0', 'pegawai_pria2.png'),
(122, '199407022020212', 'citra', 'Citra Annisa Mataram, A.Md', 'Bekasi, Jawa Barat', '1994-07-02', 'Perempuan', '-', 'annisacitram@gmail.com', 'Bekasi, Jawa Barat', 3, '0', 'A.Md', 8, '0', 'pegawai_wanita1.png'),
(123, '199604302018082', 'rieska', 'Rieska Kurniati, S.IP', 'Palangkaraya, Kalimantan Tengah', '1996-04-30', 'Perempuan', '-', 'rieskak96@gmail.com', 'Bekasi, Jawa Barat', 3, '0', 'S.IP', 10, '0', 'pegawai_wanita1.png'),
(124, '198205012007032', 'elvira', 'Frishenda Elvira Pocerattu, S.', 'Pontianak, Kalimantan Barat', '1982-05-01', 'Perempuan', '-', 'elvira_fp@gmail.com', 'Jakarta', 7, '0', 'S.IP ', 11, '0', 'pegawai_wanita1.png'),
(125, '199207292020192', 'dea', 'Dea Evajelista, S.STP', 'Jakarta', '1992-07-29', 'Perempuan', '-', 'deaaevajelista@gmail.com', 'Jakarta', 3, '0', 'S.STP', 10, '0', 'pegawai_wanita1.png'),
(126, '199003302019151', 'sabam', 'Hizkia Sabam, S.STP', 'Cianjur, Jawa Barat', '1990-03-30', 'Laki-laki', '-', 'sabam1990@gmail.com', 'Jakarta', 3, '0', ' S.STP', 10, '0', 'pegawai_pria2.png'),
(127, '198005032009062', 'eka', 'Eka Yulianti, SKM., MM', 'Bandung', '1980-05-03', 'Perempuan', '-', 'ekayulianti88@gmaul.com', 'Jakarta', 3, '0', 'MM', 9, '0', 'pegawai_wanita1.png'),
(128, '199012202020172', 'dhita', 'Dhita Marizki, S.STP', 'Bandung', '1990-12-20', 'Perempuan', '-', 'marikidhita@gmail.com', 'Mampang, Jakarta', 3, '0', ' S.STP', 9, '0', 'pegawai_wanita1.png'),
(129, '198108092012012', 'tasya', 'Natthasya Baetris Kumesan, S.S', 'Medan, Sumatera Utara', '1981-08-09', 'Perempuan', '+62 852-9865-8828', 'tasyabaetrisk@gmail.com', 'Jakarta', 7, '0', 'S.STP., M.Si ', 8, '0', 'pegawai_wanita1.png'),
(130, '199004202020182', 'tangkis', 'Oktiana Tangkis Inuji, S.IP ', 'Jakarta', '1990-04-19', 'Perempuan', '-', 'tangkisinujiaktiana90@gmail.com', 'Jakarta', 7, '0', 'S.IP ', 9, '0', 'pegawai_wanita1.png'),
(131, '197911032005032', '-', 'Elitrisiana Modesianne R. Y, S', 'NTT ( Nusa Tenggara Timur )', '1979-11-03', '', '-', 'Modesiannerye@gmail.com', 'Bogor', 7, '0', 'S.Sos, M.Si', 6, '0', 'pegawai_wanita1.png'),
(132, '199104232018012', 'lisna', 'Lisnawati Rivai, S.Pd, M.Si ', 'Depok, Jawa Barat', '1991-04-23', 'Perempuan', '-', 'lisnawati1991@gmail.com', 'Depok, Jawa Barat', 3, '0', 'S.Pd, M.Si ', 1, '0', 'pegawai_wanita1.png'),
(133, '198603192009031', 'lopa', 'Swarna Atjo Lopa, S.Sos ', 'Bangka, Sumatera Selatan', '1996-03-19', '', '-', 'atjo_lopa90@gmail.com', 'Depok, Jawa Barat', 3, '0', ' S.Sos ', 1, '0', 'pegawai_pria2.png'),
(134, '198309022017031', 'elprida', 'Elprida, SH, M.Si', 'Jakarta', '1983-09-02', 'Perempuan', '-', 'elprida_83@gmail.com', 'Jakarta', 3, '0', 'SH, M.Si', 1, '0', 'pegawai_wanita1.png'),
(135, '198504202017012', 'kusuma', 'Kusuma Nig Tiyas, S.Sos, M.S', 'Sragen. Jawa Tengah', '1985-04-20', 'Perempuan', '-', 'kusumaning_tyas@gmail.com', 'Jakarta', 3, '0', 'S.Sos, M.Si', 1, '0', 'pegawai_wanita1.png'),
(136, '197903282009032', 'amsani', 'Dra. Amsani, M.si', 'Solo, Jawa Tengah', '1979-03-28', 'Perempuan', '-', 'amsani_79@gmail.com', 'Jakarta', 3, '0', 'M.si', 1, '0', 'pegawai_wanita1.png'),
(137, '198004052011071', 'sofyan', 'Drs. Sofyan, M.Si', 'Jakarta', '1980-04-05', 'Laki-laki', '-', 'sofyan_03@gmal.com', 'Jakarta', 3, '0', ' M.Si', 2, '0', 'pegawai_pria2.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_keluarga`
--

CREATE TABLE `tbl_keluarga` (
  `kd_keluarga` int(5) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `status` varchar(20) NOT NULL,
  `telephone` int(15) NOT NULL,
  `keterangan` text NOT NULL,
  `nik` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_keluarga`
--

INSERT INTO `tbl_keluarga` (`kd_keluarga`, `nama`, `status`, `telephone`, `keterangan`, `nik`) VALUES
(8, 'Arif', 'Ayah', 2147483647, 'Jl. Kapitan No.21 Jakarta', 'NIK112'),
(9, 'Ainun', 'Ibu', 7345737, 'Jl. Kapitan No.21 Jakarta', 'NIK112'),
(10, 'Zul', 'Ayah', 88448484, 'Jl. Kapitan No.21 Jakarta', 'NIK111'),
(11, 'LinaS', 'Ibu', 2147483647, 'Jl. Kapitan No.21 Jakarta Selatan', 'NIK111'),
(13, 'Joni', 'Kakak', 8888, 'Jl. Kapitan No.21 Jakarta Selatan', 'NIK111'),
(15, 'Joni', 'Ayah', 950349503, 'Jl. Kapitan No.21 Jakarta', 'NIK112233'),
(16, 'Jono', 'Ayah', 986576566, 'Ayah Saya', 'NIK100'),
(17, 'aji', '', 2147483647, 'aji', 'NIP123');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pendidikan`
--

CREATE TABLE `tbl_pendidikan` (
  `kd_pendidikan` int(5) NOT NULL,
  `pendidikan` varchar(50) NOT NULL,
  `status` varchar(30) NOT NULL,
  `nik` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_pendidikan`
--

INSERT INTO `tbl_pendidikan` (`kd_pendidikan`, `pendidikan`, `status`, `nik`) VALUES
(7, 'SDN 123/X Jalukoooo', 'Berijazah', 'NIK111'),
(8, 'SMP N 9 Kota Jambi  kk', 'Berijazah', 'NIK111'),
(9, 'SDN 123/X Jaluko', 'Berijazah', 'NIK112'),
(11, 'SDN 149/IX Mekar Sari', 'Berijazah', 'NIK112233'),
(12, 'S1', 'Berijazah', 'NIK100'),
(13, 'SD', 'Berijazah', 'NIK100'),
(14, 'S1', 'Berijazah', 'NIP123');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengumuman`
--

CREATE TABLE `tbl_pengumuman` (
  `kd_pengumuman` int(5) NOT NULL,
  `pengumuman` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_pengumuman`
--

INSERT INTO `tbl_pengumuman` (`kd_pengumuman`, `pengumuman`) VALUES
(1, '<p>\r\n	Selamat Datang Dihalaman Pengumuman Cuti Online.. Silahkan Ubah Pengumuman di halaman admin</p>\r\n<p>\r\n	&nbsp;</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_training`
--

CREATE TABLE `tbl_training` (
  `kd_training` int(5) NOT NULL,
  `tanggal` date NOT NULL,
  `tempat` varchar(50) NOT NULL,
  `nama_karyawan` varchar(30) NOT NULL,
  `tujuan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_training`
--

INSERT INTO `tbl_training` (`kd_training`, `tanggal`, `tempat`, `nama_karyawan`, `tujuan`) VALUES
(2, '2016-12-30', 'Aula STNIK NH', 'joni , jono , saya, Jini', '<p>\r\n	hhhh jhhh</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	&nbsp;</p>\r\n'),
(3, '2016-12-31', 'Bandung', 'Luna', '<p>\r\n	nhhhh</p>\r\n'),
(4, '2016-12-01', 'JAKARTA', 'HENDRI, winton,budy', '<p>\r\n	menangani custamer&nbsp;</p>\r\n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_absen`
--
ALTER TABLE `tbl_absen`
  ADD PRIMARY KEY (`kd_absen`);

--
-- Indexes for table `tbl_absenplg`
--
ALTER TABLE `tbl_absenplg`
  ADD PRIMARY KEY (`kd_absen`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`kd_admin`);

--
-- Indexes for table `tbl_agama`
--
ALTER TABLE `tbl_agama`
  ADD PRIMARY KEY (`kd_agama`);

--
-- Indexes for table `tbl_cuty`
--
ALTER TABLE `tbl_cuty`
  ADD PRIMARY KEY (`kd_cuty`);

--
-- Indexes for table `tbl_jabatan`
--
ALTER TABLE `tbl_jabatan`
  ADD PRIMARY KEY (`kd_jabatan`);

--
-- Indexes for table `tbl_karir`
--
ALTER TABLE `tbl_karir`
  ADD PRIMARY KEY (`kd_karir`);

--
-- Indexes for table `tbl_karyawan`
--
ALTER TABLE `tbl_karyawan`
  ADD PRIMARY KEY (`kd_karyawan`);

--
-- Indexes for table `tbl_keluarga`
--
ALTER TABLE `tbl_keluarga`
  ADD PRIMARY KEY (`kd_keluarga`);

--
-- Indexes for table `tbl_pendidikan`
--
ALTER TABLE `tbl_pendidikan`
  ADD PRIMARY KEY (`kd_pendidikan`);

--
-- Indexes for table `tbl_pengumuman`
--
ALTER TABLE `tbl_pengumuman`
  ADD PRIMARY KEY (`kd_pengumuman`);

--
-- Indexes for table `tbl_training`
--
ALTER TABLE `tbl_training`
  ADD PRIMARY KEY (`kd_training`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_absen`
--
ALTER TABLE `tbl_absen`
  MODIFY `kd_absen` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_absenplg`
--
ALTER TABLE `tbl_absenplg`
  MODIFY `kd_absen` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `kd_admin` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_agama`
--
ALTER TABLE `tbl_agama`
  MODIFY `kd_agama` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_cuty`
--
ALTER TABLE `tbl_cuty`
  MODIFY `kd_cuty` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `tbl_jabatan`
--
ALTER TABLE `tbl_jabatan`
  MODIFY `kd_jabatan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_karir`
--
ALTER TABLE `tbl_karir`
  MODIFY `kd_karir` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_karyawan`
--
ALTER TABLE `tbl_karyawan`
  MODIFY `kd_karyawan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT for table `tbl_keluarga`
--
ALTER TABLE `tbl_keluarga`
  MODIFY `kd_keluarga` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_pendidikan`
--
ALTER TABLE `tbl_pendidikan`
  MODIFY `kd_pendidikan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_pengumuman`
--
ALTER TABLE `tbl_pengumuman`
  MODIFY `kd_pengumuman` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_training`
--
ALTER TABLE `tbl_training`
  MODIFY `kd_training` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
