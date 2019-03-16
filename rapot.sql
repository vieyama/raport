-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2018 at 09:35 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rapot`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` varchar(11) NOT NULL,
  `nama_admin` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `tempat_lahir` text NOT NULL,
  `tgl_lahir` date NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `agama` varchar(100) NOT NULL,
  `idu` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `alamat`, `jenis_kelamin`, `tempat_lahir`, `tgl_lahir`, `no_telp`, `agama`, `idu`) VALUES
('admin1', 'admin', 'pemalang', 'Laki-laki', 'pemalang', '2018-03-02', '0909090', 'Islam', 'admin1');

-- --------------------------------------------------------

--
-- Table structure for table `ekskul`
--

CREATE TABLE `ekskul` (
  `id_ekskul` int(11) NOT NULL,
  `nama_ekskul` varchar(100) NOT NULL,
  `nilai_ekskul` varchar(5) NOT NULL,
  `desk_ekskul` varchar(255) NOT NULL,
  `id_siswa` varchar(50) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_guru` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ekskul`
--

INSERT INTO `ekskul` (`id_ekskul`, `nama_ekskul`, `nilai_ekskul`, `desk_ekskul`, `id_siswa`, `id_kelas`, `id_guru`) VALUES
(1, 'Pramuka', 'A', 'Rajin Berangkat', '9967596641', 12, '19630914201411201'),
(2, 'PKS', 'A', 'Rajin Mengajar', '9967596641', 12, '19630914201411201');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `nik` varchar(18) NOT NULL,
  `nama_guru` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `tempat_lahir` text NOT NULL,
  `tgl_lahir` date NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `agama` varchar(100) NOT NULL,
  `idu` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`nik`, `nama_guru`, `alamat`, `jenis_kelamin`, `tempat_lahir`, `tgl_lahir`, `no_telp`, `agama`, `idu`) VALUES
('19630914201411201', 'NURBAITI', 'llllllllllll', 'Perempuan', 'Banjarnegara', '2008-01-30', '0876665256666', 'Islam', '19630914201411201'),
('196309142014112010', 'Ikmam', 'llllllllllll', 'Laki-laki', 'Banjarnegara', '2008-01-30', '0876665256666', 'Islam', '196309142014112010'),
('196309142014112011', 'MARIA ULPA', '', 'Perempuan', '', '0000-00-00', '', '', '196309142014112011'),
('19630914201411202', 'Wajinah', '', 'Perempuan', '', '0000-00-00', '', '', '19630914201411202'),
('19630914201411203', 'Waryo', '', 'Laki-laki', '', '0000-00-00', '', '', '19630914201411203'),
('19630914201411204', 'Jihan', '', 'Laki-laki', '', '0000-00-00', '', '', '19630914201411204'),
('19630914201411205', 'Karmin', '', 'Laki-laki', '', '0000-00-00', '', '', '19630914201411205'),
('19630914201411206', 'Tofik', '', 'Laki-laki', '', '0000-00-00', '', '', '19630914201411206'),
('19630914201411207', 'Linda', '', 'Perempuan', '', '0000-00-00', '', '', '19630914201411207'),
('19630914201411208', 'Raras', '', 'Laki-laki', '', '0000-00-00', '', '', '19630914201411208'),
('19630914201411209', 'ALI IMRON', '', 'Laki-laki', '', '0000-00-00', '', '', '19630914201411209');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(100) NOT NULL,
  `jenis` int(11) NOT NULL,
  `id_tahun` int(11) NOT NULL,
  `wali_kelas` varchar(50) NOT NULL,
  `publish` enum('Ya','Tidak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`, `jenis`, `id_tahun`, `wali_kelas`, `publish`) VALUES
(12, 'VII A', 0, 1, '19630914201411201', 'Ya'),
(13, 'VII B', 0, 1, '19630914201411209', 'Ya');

-- --------------------------------------------------------

--
-- Table structure for table `kelas_guru`
--

CREATE TABLE `kelas_guru` (
  `id_kelas_guru` int(11) NOT NULL,
  `id_guru` varchar(50) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `tahun_ajar` int(50) NOT NULL,
  `semester` int(19) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas_guru`
--

INSERT INTO `kelas_guru` (`id_kelas_guru`, `id_guru`, `id_mapel`, `id_kelas`, `tahun_ajar`, `semester`) VALUES
(45, '19630914201411201', 4, 12, 1, 1),
(46, '19630914201411209', 5, 12, 1, 1),
(47, '196309142014112011', 6, 12, 1, 1),
(48, '19630914201411202', 7, 12, 1, 1),
(49, '19630914201411203', 8, 12, 1, 1),
(50, '19630914201411204', 9, 12, 1, 1),
(51, '19630914201411205', 10, 12, 1, 1),
(52, '19630914201411206', 11, 12, 1, 1),
(53, '19630914201411207', 12, 12, 1, 1),
(54, '19630914201411208', 13, 12, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ketidakhadiran`
--

CREATE TABLE `ketidakhadiran` (
  `id_hadir` int(11) NOT NULL,
  `izin` int(11) NOT NULL,
  `sakit` int(11) NOT NULL,
  `alfa` int(11) NOT NULL,
  `id_siswa` varchar(50) NOT NULL,
  `id_guru` varchar(50) NOT NULL,
  `id_kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ketidakhadiran`
--

INSERT INTO `ketidakhadiran` (`id_hadir`, `izin`, `sakit`, `alfa`, `id_siswa`, `id_guru`, `id_kelas`) VALUES
(1, 0, 0, 0, '9967596641', '19630914201411201', 12);

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `id_mapel` int(11) NOT NULL,
  `nama_mapel` varchar(50) NOT NULL,
  `kode_mapel` varchar(50) NOT NULL,
  `desk` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`id_mapel`, `nama_mapel`, `kode_mapel`, `desk`) VALUES
(4, ' Biologi ', 'biologi_1', 'Pendidikan biologi'),
(5, 'Matematika', 'mtk_1', 'Pendidikan matematika'),
(6, 'Fisika', 'fisika_1', 'Pendidikan Fisika'),
(7, 'Kimia', 'kimia_1', 'Pendidikan Kimia'),
(8, 'Pendidikan Kewarganegaraan', 'pkn_1', 'Pendidikan PKN'),
(9, 'Pendidikan Agama Islam', 'agama_1', 'Pendidikan Agama'),
(10, 'mapel 1', 'mapel_1', 'mapel 1'),
(11, 'mapel 2', 'mapel_2', 'mapel 2'),
(12, 'mapel 3', 'mapel_3', 'mapel 1'),
(13, 'mapel 4', 'mapel_4', 'mapel 4');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(11) NOT NULL,
  `id_guru` varchar(50) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_siswa` varchar(50) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_smt` int(11) NOT NULL,
  `nilai_harian` double NOT NULL,
  `nilai_uts` double NOT NULL,
  `nilai_uas` double NOT NULL,
  `nilai_pengetahuan` double NOT NULL,
  `grade_peng` varchar(5) NOT NULL,
  `desk_peng` varchar(255) NOT NULL,
  `nilai_ketrampilan` double NOT NULL,
  `grade_ket` varchar(5) NOT NULL,
  `desk_ket` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `id_guru`, `id_mapel`, `id_siswa`, `id_kelas`, `id_smt`, `nilai_harian`, `nilai_uts`, `nilai_uas`, `nilai_pengetahuan`, `grade_peng`, `desk_peng`, `nilai_ketrampilan`, `grade_ket`, `desk_ket`) VALUES
(161, '19630914201411201', 4, '9967596641', 12, 1, 89, 89, 89, 89, 'B', 'Sangat baik dan sempurna. Dapat mengingat, mengetahui, menerapkan, menganalisis, dan mengevaluasi semua kompetensi dasar.', 89, 'B', 'Sangat baik dan sempurna. Dapat mengingat, mengetahui, menerapkan, menganalisis, dan mengevaluasi semua kompetensi dasar.'),
(162, '19630914201411202', 7, '9967596641', 12, 1, 89, 89, 89, 89, 'B', 'Sangat baik dan sempurna. Dapat mengingat, mengetahui, menerapkan, menganalisis, dan mengevaluasi semua kompetensi dasar.', 90, 'A', 'Sangat baik dan sempurna. Dapat mengingat, mengetahui, menerapkan, menganalisis, dan mengevaluasi semua kompetensi dasar.'),
(163, '19630914201411203', 8, '9967596641', 12, 1, 89, 89, 89, 89, 'B', 'Sangat baik dan sempurna. Dapat mengingat, mengetahui, menerapkan, menganalisis, dan mengevaluasi semua kompetensi dasar.', 91, 'A', 'Sangat baik dan sempurna. Dapat mengingat, mengetahui, menerapkan, menganalisis, dan mengevaluasi semua kompetensi dasar.'),
(164, '19630914201411204', 9, '9967596641', 12, 1, 89, 89, 89, 89, 'B', 'Sangat baik dan sempurna. Dapat mengingat, mengetahui, menerapkan, menganalisis, dan mengevaluasi semua kompetensi dasar.', 92, 'A', 'Sangat baik dan sempurna. Dapat mengingat, mengetahui, menerapkan, menganalisis, dan mengevaluasi semua kompetensi dasar.'),
(165, '19630914201411205', 10, '9967596641', 12, 1, 80, 77, 86, 80.75, 'B', 'Sangat baik dan sempurna. Dapat mengingat, mengetahui, menerapkan, menganalisis, dan mengevaluasi semua kompetensi dasar.', 90, 'A', 'Sangat baik dan sempurna. Dapat mengingat, mengetahui, menerapkan, menganalisis, dan mengevaluasi semua kompetensi dasar.'),
(166, '19630914201411206', 11, '9967596641', 12, 1, 70, 78, 90, 77, 'C', 'Sangat baik dan sempurna. Dapat mengingat, mengetahui, menerapkan, menganalisis, dan mengevaluasi semua kompetensi dasar.', 76, 'C', 'Sangat baik dan sempurna. Dapat mengingat, mengetahui, menerapkan, menganalisis, dan mengevaluasi semua kompetensi dasar.'),
(167, '19630914201411207', 12, '9967596641', 12, 1, 78, 91, 60, 76.75, 'C', 'Sangat baik dan sempurna. Dapat mengingat, mengetahui, menerapkan, menganalisis, dan mengevaluasi semua kompetensi dasar.', 80, 'B', 'Sangat baik dan sempurna. Dapat mengingat, mengetahui, menerapkan, menganalisis, dan mengevaluasi semua kompetensi dasar.'),
(168, '19630914201411208', 13, '9967596641', 12, 1, 89, 90, 70, 84.5, 'B', 'Sangat baik dan sempurna. Dapat mengingat, mengetahui, menerapkan, menganalisis, dan mengevaluasi semua kompetensi dasar.', 79, 'C', 'Sangat baik dan sempurna. Dapat mengingat, mengetahui, menerapkan, menganalisis, dan mengevaluasi semua kompetensi dasar.'),
(169, '19630914201411209', 5, '9967596641', 12, 1, 90, 80, 70, 82.5, 'B', 'Sangat baik dan sempurna. Dapat mengingat, mengetahui, menerapkan, menganalisis, dan mengevaluasi semua kompetensi dasar.', 69, 'D', 'Sangat baik dan sempurna. Dapat mengingat, mengetahui, menerapkan, menganalisis, dan mengevaluasi semua kompetensi dasar.'),
(170, '196309142014112011', 6, '9967596641', 12, 1, 70, 80, 89, 77.25, 'C', 'Sangat baik dan sempurna. Dapat mengingat, mengetahui, menerapkan, menganalisis, dan mengevaluasi semua kompetensi dasar.', 89, 'B', 'Sangat baik dan sempurna. Dapat mengingat, mengetahui, menerapkan, menganalisis, dan mengevaluasi semua kompetensi dasar.'),
(259, '19630914201411201', 4, '9967596642', 12, 1, 89, 89, 89, 89, 'B', 'Sangat baik dan sempurna. Dapat mengingat, mengetahui, menerapkan, menganalisis, dan mengevaluasi semua kompetensi dasar.', 89, 'B', 'Sangat baik dan sempurna. Dapat mengingat, mengetahui, menerapkan, menganalisis, dan mengevaluasi semua kompetensi dasar.'),
(260, '19630914201411201', 4, '9967596643', 12, 1, 89, 89, 89, 89, 'B', 'Sangat baik dan sempurna. Dapat mengingat, mengetahui, menerapkan, menganalisis, dan mengevaluasi semua kompetensi dasar.', 90, 'A', 'Sangat baik dan sempurna. Dapat mengingat, mengetahui, menerapkan, menganalisis, dan mengevaluasi semua kompetensi dasar.'),
(261, '19630914201411201', 4, '9967596644', 12, 1, 89, 89, 89, 89, 'B', 'Sangat baik dan sempurna. Dapat mengingat, mengetahui, menerapkan, menganalisis, dan mengevaluasi semua kompetensi dasar.', 91, 'A', 'Sangat baik dan sempurna. Dapat mengingat, mengetahui, menerapkan, menganalisis, dan mengevaluasi semua kompetensi dasar.'),
(262, '19630914201411201', 4, '9967596645', 12, 1, 89, 89, 89, 89, 'B', 'Sangat baik dan sempurna. Dapat mengingat, mengetahui, menerapkan, menganalisis, dan mengevaluasi semua kompetensi dasar.', 92, 'A', 'Sangat baik dan sempurna. Dapat mengingat, mengetahui, menerapkan, menganalisis, dan mengevaluasi semua kompetensi dasar.');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `idu` varchar(25) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `pass_asli` varchar(100) NOT NULL,
  `hak_akses` enum('Admin','Siswa','Guru','Wali Kelas') NOT NULL,
  `img_pengguna` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`idu`, `nama`, `username`, `password`, `pass_asli`, `hak_akses`, `img_pengguna`, `email`) VALUES
('19630914201411201', 'NURBAITI', 'nurbaiti', '1863ce0ad5b2634cb260a290282d2684', 'wbWc2eOu', 'Guru', 'Guru-705993banner4.jpg', 'laziznubms@gmail.com'),
('196309142014112010', 'Ikmam', 'ZnU4syY5', '7ad3dcc098ee548dc7b2967c4eb036be', 'jOf9UWuS', 'Guru', 'Guru-81933620328448100001.1411190224.jpg', 'ikmam@gmail.com'),
('196309142014112011', 'MARIA ULPA', 'PatJVcdY', '510fe9d4d66dc40d14d28956bffdba58', 've0by9Zf', 'Guru', '', ''),
('19630914201411202', 'Wajinah', 'jo5qYlsU', '465750996fed5d9e6957a5a8b9f3f196', '7OO7kBkv', 'Guru', '', ''),
('19630914201411203', 'Waryo', 'mOcWhAsI', '330d91a0bb3a4e6e0d189ece454cf41a', 'cZj99LYW', 'Guru', '', ''),
('19630914201411204', 'Jihan', 'LgBOqKxD', '76b1327fd8ece75673942e57b57201bc', 'iUizZsoA', 'Guru', '', ''),
('19630914201411205', 'Karmin', 'Vh6j6is8', '5dde8121d2a92946248a03e9d8d7a5b3', 'Q73K8cun', 'Guru', '', ''),
('19630914201411206', 'Tofik', 'FRKXPJey', 'd333f32beb97fda162a78fe696075999', 'iSh8kZqO', 'Guru', '', ''),
('19630914201411207', 'Linda', 'atuoq9Fo', 'c68eae95c7e2a46dbb04620fb3d1ee36', 'bViNTkcy', 'Guru', '', ''),
('19630914201411208', 'Raras', 'W5qYMAic', '8890b288c162133dd61dee6d83d9d66e', '6I57H0FV', 'Guru', '', ''),
('19630914201411209', 'ALI IMRON', 'x28p70mY', 'e01a0d7e0b2669f12d1b1aa55e4b384e', 'J3yqu0os', 'Guru', 'Guru-61419720328448100001.1411190224.jpg', 'laziznubms@gmail.com'),
('9967596641', 'Yovie Fesya Pratama', 'yoviefp', 'f5630780ff68a4f48ef09f8a063b93c3', '2wXHebpZ', 'Siswa', '', 'yoviefp@gmail.com'),
('9967596642', 'Ghani Fadia Mustaqim', 'sKiD6ZJQ', '078d296f52b3910d449ab7dba1cd8641', '6JBwE2Ry', 'Siswa', '', ''),
('9967596643', 'Aurelia Rahma Destiani', 'MgfEpjxw', '0b3b934a8c6dd3a00a7634eb554825f4', 'T0vpeQd7', 'Siswa', '', ''),
('9967596644', 'Cahaya Uzla Raihanum', 'BVhTQrDB', '2e03ab6af86bdad988903eb2b8706a86', 'ESkvumQw', 'Siswa', '', ''),
('9967596645', 'Dwi Ngafifudin', 'Lnpwrx49', '5ac14de4ed8b4343f95eb528f5a40e55', 'JEgF28oV', 'Siswa', '', ''),
('9967596646', 'Maheswari Azzahra Nabilah', 'HO6dw7Gd', 'f8d21b63e44ed8ea66c2d9cbcd899cc1', 'J6uyEJZL', 'Siswa', '', ''),
('admin1', 'admin', 'admin', 'edf757da01f7028957b311fc7b37638e', 'admin', 'Admin', 'Admin-763092pass.png', 'admin@localhost.com');

-- --------------------------------------------------------

--
-- Table structure for table `prestasi`
--

CREATE TABLE `prestasi` (
  `id_prestasi` int(11) NOT NULL,
  `nama_prestasi` varchar(100) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `id_siswa` varchar(50) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_guru` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prestasi`
--

INSERT INTO `prestasi` (`id_prestasi`, `nama_prestasi`, `deskripsi`, `id_siswa`, `id_kelas`, `id_guru`) VALUES
(1, 'Juara 1 Lomba PKS Se-Kab.Pemalang 2012', 'Mengikuti Perlombaan Patroli Keamanan Sekolah', '9967596641', 12, '19630914201411201');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `id_smt` int(11) NOT NULL,
  `smt` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`id_smt`, `smt`) VALUES
(1, 'Genap'),
(2, 'Ganjil');

-- --------------------------------------------------------

--
-- Table structure for table `sikap`
--

CREATE TABLE `sikap` (
  `id_sikap` int(11) NOT NULL,
  `nilai_sikap_sosial` varchar(5) NOT NULL,
  `desk_sikap_sosial` text NOT NULL,
  `nilai_sikap_spiritual` varchar(5) NOT NULL,
  `desk_sikap_spiritual` text NOT NULL,
  `id_siswa` varchar(50) NOT NULL,
  `id_guru` varchar(50) NOT NULL,
  `id_kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sikap`
--

INSERT INTO `sikap` (`id_sikap`, `nilai_sikap_sosial`, `desk_sikap_sosial`, `nilai_sikap_spiritual`, `desk_sikap_spiritual`, `id_siswa`, `id_guru`, `id_kelas`) VALUES
(1, 'A', 'Pandai dalam bersosialisasi', 'B', 'Rajin beribadah', '9967596641', '19630914201411201', 12);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nis` varchar(11) NOT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `tempat_lahir` text NOT NULL,
  `tgl_lahir` date NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `agama` varchar(100) NOT NULL,
  `nama_ibu` varchar(100) NOT NULL,
  `pekerjaan_ibu` varchar(100) NOT NULL,
  `nama_bapak` varchar(100) NOT NULL,
  `pekerjaan_bapak` varchar(100) NOT NULL,
  `img_pengguna` varchar(100) NOT NULL,
  `idu` varchar(25) NOT NULL,
  `kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nis`, `nama_siswa`, `alamat`, `jenis_kelamin`, `tempat_lahir`, `tgl_lahir`, `no_telp`, `agama`, `nama_ibu`, `pekerjaan_ibu`, `nama_bapak`, `pekerjaan_bapak`, `img_pengguna`, `idu`, `kelas`) VALUES
('9967596641', 'Yovie Fesya Pratama', 'RT.09/03 Desa Karangmoncol Kec.Randudongkal Kab.Pemalang', 'Laki-laki', 'Pemalang', '2018-03-06', '085327030609', 'Islam', 'Titi Ida Wati', 'Pedagang', 'A. Mustofa Yusuf', 'Pedagang', 'Siswa-763092pass.png', '9967596641', 12),
('9967596642', 'Ghani Fadia Mustaqim', '', 'Laki-laki', '', '0000-00-00', '', '', '', '', '', '', 'Siswa-763092pass.png', '9967596642', 12),
('9967596643', 'Aurelia Rahma Destiani', '', 'Laki-laki', '', '0000-00-00', '', '', '', '', '', '', 'Siswa-763092pass.png', '9967596643', 12),
('9967596644', 'Cahaya Uzla Raihanum', '', 'Laki-laki', '', '0000-00-00', '', '', '', '', '', '', 'Siswa-763092pass.png', '9967596644', 12),
('9967596645', 'Dwi Ngafifudin', '', 'Laki-laki', '', '0000-00-00', '', '', '', '', '', '', 'Siswa-763092pass.png', '9967596645', 12),
('9967596646', 'Maheswari Azzahra Nabilah', '', 'Laki-laki', '', '0000-00-00', '', '', '', '', '', '', 'Siswa-763092pass.png', '9967596646', 12);

-- --------------------------------------------------------

--
-- Table structure for table `tahun_ajar`
--

CREATE TABLE `tahun_ajar` (
  `id_tahun` int(11) NOT NULL,
  `tahun_ajar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tahun_ajar`
--

INSERT INTO `tahun_ajar` (`id_tahun`, `tahun_ajar`) VALUES
(1, '2017/2018'),
(2, '2018/2019');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `ekskul`
--
ALTER TABLE `ekskul`
  ADD PRIMARY KEY (`id_ekskul`),
  ADD KEY `id_siswa` (`id_siswa`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_guru` (`id_guru`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`nik`),
  ADD KEY `idu` (`idu`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD KEY `wali_kelas` (`wali_kelas`),
  ADD KEY `id_tahun` (`id_tahun`);

--
-- Indexes for table `kelas_guru`
--
ALTER TABLE `kelas_guru`
  ADD PRIMARY KEY (`id_kelas_guru`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_mapel` (`id_mapel`),
  ADD KEY `id_guru` (`id_guru`),
  ADD KEY `tahun_ajar` (`tahun_ajar`),
  ADD KEY `id_mapel_2` (`id_mapel`),
  ADD KEY `semester` (`semester`);

--
-- Indexes for table `ketidakhadiran`
--
ALTER TABLE `ketidakhadiran`
  ADD PRIMARY KEY (`id_hadir`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_guru` (`id_guru`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `id_guru` (`id_guru`),
  ADD KEY `id_mapel` (`id_mapel`),
  ADD KEY `id_siswa` (`id_siswa`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_smt` (`id_smt`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`idu`);

--
-- Indexes for table `prestasi`
--
ALTER TABLE `prestasi`
  ADD PRIMARY KEY (`id_prestasi`),
  ADD KEY `id_guru` (`id_guru`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`id_smt`);

--
-- Indexes for table `sikap`
--
ALTER TABLE `sikap`
  ADD PRIMARY KEY (`id_sikap`),
  ADD KEY `id_siswa` (`id_siswa`),
  ADD KEY `id_guru` (`id_guru`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nis`),
  ADD KEY `idu` (`idu`),
  ADD KEY `kelas` (`kelas`);

--
-- Indexes for table `tahun_ajar`
--
ALTER TABLE `tahun_ajar`
  ADD PRIMARY KEY (`id_tahun`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ekskul`
--
ALTER TABLE `ekskul`
  MODIFY `id_ekskul` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `kelas_guru`
--
ALTER TABLE `kelas_guru`
  MODIFY `id_kelas_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `ketidakhadiran`
--
ALTER TABLE `ketidakhadiran`
  MODIFY `id_hadir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=263;
--
-- AUTO_INCREMENT for table `prestasi`
--
ALTER TABLE `prestasi`
  MODIFY `id_prestasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sikap`
--
ALTER TABLE `sikap`
  MODIFY `id_sikap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tahun_ajar`
--
ALTER TABLE `tahun_ajar`
  MODIFY `id_tahun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `pengguna` (`idu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ekskul`
--
ALTER TABLE `ekskul`
  ADD CONSTRAINT `ekskul_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`nis`),
  ADD CONSTRAINT `ekskul_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`),
  ADD CONSTRAINT `ekskul_ibfk_3` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`nik`);

--
-- Constraints for table `guru`
--
ALTER TABLE `guru`
  ADD CONSTRAINT `guru_ibfk_1` FOREIGN KEY (`idu`) REFERENCES `pengguna` (`idu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_ibfk_1` FOREIGN KEY (`id_tahun`) REFERENCES `tahun_ajar` (`id_tahun`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kelas_ibfk_2` FOREIGN KEY (`wali_kelas`) REFERENCES `guru` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kelas_guru`
--
ALTER TABLE `kelas_guru`
  ADD CONSTRAINT `kelas_guru_ibfk_1` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kelas_guru_ibfk_3` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kelas_guru_ibfk_4` FOREIGN KEY (`tahun_ajar`) REFERENCES `tahun_ajar` (`id_tahun`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kelas_guru_ibfk_5` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`id_mapel`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ketidakhadiran`
--
ALTER TABLE `ketidakhadiran`
  ADD CONSTRAINT `ketidakhadiran_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`nis`),
  ADD CONSTRAINT `ketidakhadiran_ibfk_2` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`nik`),
  ADD CONSTRAINT `ketidakhadiran_ibfk_3` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`);

--
-- Constraints for table `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`nik`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `nilai_ibfk_2` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`id_mapel`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `nilai_ibfk_3` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`nis`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `nilai_ibfk_4` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `prestasi`
--
ALTER TABLE `prestasi`
  ADD CONSTRAINT `prestasi_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`nis`),
  ADD CONSTRAINT `prestasi_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`),
  ADD CONSTRAINT `prestasi_ibfk_3` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`nik`);

--
-- Constraints for table `sikap`
--
ALTER TABLE `sikap`
  ADD CONSTRAINT `sikap_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`nis`),
  ADD CONSTRAINT `sikap_ibfk_2` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`nik`),
  ADD CONSTRAINT `sikap_ibfk_3` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`);

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`idu`) REFERENCES `pengguna` (`idu`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
