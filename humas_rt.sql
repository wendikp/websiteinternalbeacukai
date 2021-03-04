-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Mar 2021 pada 12.17
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `humas_rt`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`username`, `password`, `status`) VALUES
('adminhumas', '827ccb0eea8a706c4c34a16891f84e7b', 'adminhumas'),
('adminrt', '827ccb0eea8a706c4c34a16891f84e7b', 'adminrt'),
('user', '827ccb0eea8a706c4c34a16891f84e7b', 'user');

-- --------------------------------------------------------

--
-- Struktur dari tabel `artikel`
--

CREATE TABLE `artikel` (
  `id_artikel` int(11) NOT NULL,
  `penulis` varchar(50) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `file_artikel` longtext NOT NULL,
  `tanggal_upload` date NOT NULL,
  `nip` varchar(16) DEFAULT NULL,
  `id_foto` int(11) DEFAULT NULL,
  `read_status` varchar(10) NOT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'Not Approved'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `artikel`
--

INSERT INTO `artikel` (`id_artikel`, `penulis`, `judul`, `file_artikel`, `tanggal_upload`, `nip`, `id_foto`, `read_status`, `status`) VALUES
(7, 'Nama User 01', 'Judul Artikel User 01', '    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\n    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\n    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\n    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\n    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2021-03-01', '1234567801', 27, 'true', 'Approved');

-- --------------------------------------------------------

--
-- Struktur dari tabel `atk`
--

CREATE TABLE `atk` (
  `id_atk` int(11) NOT NULL,
  `atk` varchar(50) NOT NULL,
  `ketersediaan` char(1) NOT NULL,
  `satuan` varchar(10) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `atk`
--

INSERT INTO `atk` (`id_atk`, `atk`, `ketersediaan`, `satuan`, `stok`) VALUES
(0, 'Pulpen', 'y', 'Kotak', 10),
(1, 'Buku', 'y', 'Dus', 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `bidang_bagian`
--

CREATE TABLE `bidang_bagian` (
  `id_bidang` int(11) NOT NULL,
  `bagian` varchar(25) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `golongan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bidang_bagian`
--

INSERT INTO `bidang_bagian` (`id_bidang`, `bagian`, `jabatan`, `golongan`) VALUES
(1, 'Umum', '', ''),
(2, 'Fasilitas Kepabeanan', '', ''),
(3, 'Kepatuhan Internal', '', ''),
(4, 'Kepabeanan dan Cukai', '', ''),
(5, 'Penindakan dan Penyidikan', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `foto`
--

CREATE TABLE `foto` (
  `id_foto` int(11) NOT NULL,
  `file_name` varchar(50) NOT NULL,
  `path_foto` varchar(100) NOT NULL,
  `tanggal_upload` date NOT NULL,
  `nip` varchar(16) DEFAULT NULL,
  `deskripsi` text NOT NULL,
  `token` varchar(100) DEFAULT NULL,
  `read_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `foto`
--

INSERT INTO `foto` (`id_foto`, `file_name`, `path_foto`, `tanggal_upload`, `nip`, `deskripsi`, `token`, `read_status`) VALUES
(1, 'avatar2.png', 'avatar2.png', '2017-08-24', '145150400111004', '', NULL, 'true'),
(2, 'rumah.jpg', 'photo/rumah.jpg', '2017-08-25', NULL, 'foto rumah', NULL, 'true'),
(19, 'rumah1.jpg', 'photo/rumah1.jpg', '2017-08-09', NULL, 'rumah1', NULL, 'true'),
(20, 'rumah2.jpg', 'photo/rumah2.jpg', '2017-08-25', NULL, 'rumah2', NULL, 'true'),
(21, 'motor.jpg', 'photo/motor.jpg', '2017-08-25', NULL, 'motor', NULL, 'true'),
(22, 'mobil.jpg', 'photo/mobil.jpg', '2017-08-25', NULL, 'mobil', NULL, 'true'),
(23, 'avatar3.png', 'photo/avatar3.png', '2017-08-25', '145150400111004', '', NULL, 'true'),
(24, 'banner-bg.jpg', 'photo/banner-bg.jpg', '2017-08-25', '145150400111004', '', NULL, 'true'),
(25, 'banner-bg.jpg', 'photo/banner-bg.jpg', '2017-08-25', '145150400111004', '', NULL, 'true'),
(26, 'avatar5.png', 'photo/avatar5.png', '2017-08-25', '145150400111004', '', NULL, 'true'),
(27, 'product-school-nOvIa_x_tfo-unsplash.jpg', 'photo/product-school-nOvIa_x_tfo-unsplash.jpg', '2021-03-01', '1234567801', '', NULL, 'true');

-- --------------------------------------------------------

--
-- Struktur dari tabel `inventaris`
--

CREATE TABLE `inventaris` (
  `id_inventaris` int(11) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `merek` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `jabatan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `jabatan`) VALUES
(1, 'Kepala Kantor'),
(2, 'Kepala Bagian Umum'),
(3, 'Kabid Fasilitas Kepa'),
(4, 'Kabid Kepatuhan Inte'),
(5, 'Kabid Kepabeanan dan'),
(6, 'Kabid Penindakan dan'),
(7, 'Kasi Keberatan dan B'),
(8, 'Kasi Bantuan Hukum'),
(9, 'Kasi Kepatuhan Pelak'),
(10, 'Kasi Fasilitas Pabea'),
(11, 'Kasi Penindakan I'),
(12, 'Kasi Kepatuhan Pelak'),
(13, 'Kasi Fasilitas Pabea'),
(14, 'Kasi Penindakan II'),
(15, 'Kasi Informasi Kepab'),
(16, 'Kasubag Humas dan Ru'),
(17, 'Kepala Subbagian Kep'),
(18, 'Kasubag TU dan Keuan'),
(19, 'Kepala Seksi Penyidi'),
(20, 'Kasi Kepatuhan Pelak'),
(21, 'Kepala Seksi Penyidi'),
(22, 'Kepala Seksi Fasilit'),
(23, 'Kepala Seksi Intelij'),
(24, 'Kepala Seksi Pabean '),
(25, 'Pelaksana Pemeriksa'),
(26, 'Pelaksana Administra');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_kbd`
--

CREATE TABLE `jenis_kbd` (
  `id_jenis_kbd` tinyint(4) NOT NULL,
  `jenis_kbd` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_kbd`
--

INSERT INTO `jenis_kbd` (`id_jenis_kbd`, `jenis_kbd`) VALUES
(1, 'kbd2'),
(2, 'kbd4');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_permohonan`
--

CREATE TABLE `jenis_permohonan` (
  `id_jenis_permohonan` int(11) NOT NULL,
  `jenis_permohonan` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_permohonan`
--

INSERT INTO `jenis_permohonan` (`id_jenis_permohonan`, `jenis_permohonan`) VALUES
(1, 'penghunian'),
(2, 'pencabutan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kbd`
--

CREATE TABLE `kbd` (
  `nopol` varchar(20) NOT NULL,
  `merek` varchar(20) NOT NULL,
  `pic_kbd` varchar(50) DEFAULT NULL,
  `nomor_kep` varchar(30) NOT NULL,
  `nip` varchar(16) DEFAULT NULL,
  `id_jenis_kbd` tinyint(4) NOT NULL,
  `id_service` int(11) DEFAULT NULL,
  `id_foto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kbd`
--

INSERT INTO `kbd` (`nopol`, `merek`, `pic_kbd`, `nomor_kep`, `nip`, `id_jenis_kbd`, `id_service`, `id_foto`) VALUES
(' B 1578 TQN ', 'Innova', 'Kabid KI', 'KEP-1144/WBC.11/BG.01/2015', NULL, 2, NULL, NULL),
('B 1474 TQN', 'Nissan X-trail', 'Kepala Kantor', 'KEP-409/WBC.11/BG.01/2015', NULL, 2, NULL, NULL),
('B 1654 TQN', 'Innova', 'Kabid KC', 'KEP-199/WBC.11/BG.01/2017', NULL, 2, NULL, NULL),
('B 1809 TQN', 'Honda HRV', 'Gatot Sugeng Wibowo', 'KEP-1182/WBC.11/BG.01/2015', NULL, 2, NULL, NULL),
('B 6286 TQC', 'Yamaha Xeon', 'Putra', 'KEP-34/WBC.11/BG.01/2017', NULL, 1, NULL, NULL),
('B 6724 TQB', 'Kawasaki ', 'Rizki', 'KEP-33/WBC.11/BG.01/2017', NULL, 1, NULL, NULL),
('B 7173 TPA', 'Isuzu Elf', 'RT', 'KEP-176/WBC.11/BG.01/2017', NULL, 2, NULL, NULL),
('B 9053 AP', 'Ford (Putih)', 'Nelson Hasoloan', 'KEP-524/WBC.11/BG.01/2016', NULL, 2, NULL, NULL),
('N 1055 AP', 'Suzuki Grand Vitara', 'Sugeng Harianto', 'KEP-2035/WBC.11/BG.01/2012', NULL, 2, NULL, NULL),
('N 1056 AP', 'Opel Blazer', 'RT', '-', NULL, 2, NULL, NULL),
('N 1057 AP', 'Toyota Avanza', 'Wahyu Catur Gunawan', 'KEP-1112/WBC.11/BG.01/2014', NULL, 2, NULL, NULL),
('N 183 AP', 'Toyota Avanza', 'Badari', 'KEP-174/WBC.11/BG.01/2017', NULL, 2, NULL, NULL),
('N 184 AP', 'Toyota Avanza', 'Ari Wirasto', 'KEP-1183/WBC.11/BG.01/2015', NULL, 2, NULL, NULL),
('N 3156 AP', 'Suzuki', 'Nukman', 'KEP-30/WBC.11/BG.01/2017', NULL, 1, NULL, NULL),
('N 3157 AP', 'Suzuki', 'Frangky', 'KEP-31/WBC.11/BG.01/2017', NULL, 1, NULL, NULL),
('N 3158 AP', 'Suzuki', 'Cintus', 'KEP-32/WBC.11/BG.01/2017', NULL, 1, NULL, NULL),
('N 3172 AP', 'Honda', 'Deni', 'KEP-27/WBC.11/BG.01/2017', NULL, 1, NULL, NULL),
('N 3173 AP', 'Honda', 'Riky', 'KEP-28/WBC.11/BG.01/2017', NULL, 1, NULL, NULL),
('N 3174 Ap', 'Honda', 'Fadel', 'KEP-29/WBC.11/BG.01/2017', NULL, 1, NULL, NULL),
('N 640 AP', 'APV DLX', 'P2', 'KEP-741/WBC.11/BG.01/2015', NULL, 2, NULL, NULL),
('N 672 AP', 'APV DLX', 'KC', 'KEP-689/WBC.11/BG.01/2016', NULL, 2, NULL, NULL),
('N 673 AP', 'APV DLX', 'RT', 'KEP-177/WBC.11/BG.01/2017', NULL, 2, NULL, NULL),
('N 675 AP', 'APV DLX', 'KI', 'KEP-1146/WBC.11/BG.01/2015', NULL, 2, NULL, NULL),
('N 679 AP', 'APV DLX', 'Fasilitas Kepabeanan', 'KEP-438/WBC.11/BG.01/2016', NULL, 2, NULL, NULL),
('N 776 AP', 'Toyota Avanza', 'Priyo Ismiyadi', 'KEP-1113/WBC.11/BG.01/2014', NULL, 2, NULL, NULL),
('N 8242 AP', 'Ford ( Silver )', 'Operasional P2 / Ardiyatno', 'KEP-1145/WBC.11/BG.01/2015', NULL, 2, NULL, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kritik_saran`
--

CREATE TABLE `kritik_saran` (
  `id` int(11) NOT NULL,
  `perihal` varchar(255) NOT NULL,
  `kritik_saran` text NOT NULL,
  `nip` varchar(16) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `read_status` varchar(10) NOT NULL DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `permintaan_atk`
--

CREATE TABLE `permintaan_atk` (
  `id_permintaan` int(11) NOT NULL,
  `nip` varchar(16) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `kode` varchar(20) NOT NULL,
  `barang` varchar(50) NOT NULL,
  `volume` varchar(50) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `nosurat` varchar(20) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal_permohonan` int(11) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Not Approved',
  `read_status` varchar(10) NOT NULL DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `permintaan_atk`
--

INSERT INTO `permintaan_atk` (`id_permintaan`, `nip`, `id_barang`, `kode`, `barang`, `volume`, `satuan`, `nosurat`, `jumlah`, `tanggal_permohonan`, `status`, `read_status`) VALUES
(1, '1234567801', 0, '1', 'Buku', '3', 'Buah', 'nomor_surat_01/03-20', 0, 2021, 'Not Approved', 'true'),
(2, '1234567801', 0, '1', 'Pulpen', '1', 'Kotak', 'nomor_surat_01/03-20', 0, 2021, 'Not Approved', 'true'),
(3, '1234567801', 0, '1', 'Kertas HVS', '5', 'Rim', 'nomor_surat_01/03-20', 0, 2021, 'Not Approved', 'true'),
(4, '1234567801', 0, '1', 'Tinta Printer Hitam', '1', 'Buah', 'nomor_surat_01/03-20', 0, 2021, 'Not Approved', 'true'),
(5, '1234567801', 0, '1', 'Kursi', '4', 'Buah', 'nomor_surat_01/03-20', 0, 2021, 'Not Approved', 'true'),
(6, '1234567801', 0, '1', 'Meja', '1', 'Buah', 'nomor_surat_01/03-20', 0, 2021, 'Not Approved', 'true');

-- --------------------------------------------------------

--
-- Struktur dari tabel `permohonan_inventaris`
--

CREATE TABLE `permohonan_inventaris` (
  `id` int(11) DEFAULT NULL,
  `read_status` varchar(10) NOT NULL DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `permohonan_rumah`
--

CREATE TABLE `permohonan_rumah` (
  `id_permohonan` int(11) NOT NULL,
  `id_jenis_permohonan` int(11) NOT NULL,
  `no_surat` varchar(50) NOT NULL,
  `nip` varchar(16) NOT NULL,
  `tgl_mohon` date NOT NULL,
  `tgl_upload` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `read_status` varchar(10) NOT NULL DEFAULT 'false',
  `status` varchar(20) NOT NULL DEFAULT 'Not Approved'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `permohonan_rumah`
--

INSERT INTO `permohonan_rumah` (`id_permohonan`, `id_jenis_permohonan`, `no_surat`, `nip`, `tgl_mohon`, `tgl_upload`, `read_status`, `status`) VALUES
(1, 1, 'baru', '145150400111004', '2017-08-24', '2021-02-28 15:48:07', 'false', 'Not Approved'),
(2, 2, 'cabut', '145150400111004', '2017-08-24', '2021-02-28 15:48:07', 'false', 'Not Approved'),
(3, 2, 'bisa g\'?', '145150400111004', '2017-08-24', '2021-02-28 15:48:07', 'false', 'Not Approved'),
(4, 1, 'bisa g\' yang ini', '145150400111004', '2017-08-24', '2021-02-28 15:48:07', 'false', 'Not Approved');

-- --------------------------------------------------------

--
-- Struktur dari tabel `permohonan_service`
--

CREATE TABLE `permohonan_service` (
  `id_permohonan` int(11) NOT NULL,
  `id_jenis_kbd` tinyint(4) NOT NULL,
  `no_surat` varchar(100) NOT NULL,
  `plat_nomor` varchar(50) NOT NULL,
  `tgl_mohon` date NOT NULL,
  `tgl_upload` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `nip` varchar(16) NOT NULL,
  `read_status` varchar(10) NOT NULL DEFAULT 'false',
  `status` varchar(20) NOT NULL DEFAULT 'Not Approved'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_service`
--

CREATE TABLE `riwayat_service` (
  `id_service` int(11) NOT NULL,
  `nopol` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` tinytext NOT NULL,
  `kbd` tinyint(4) NOT NULL,
  `id_jenis_kbd` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rumah_dinas`
--

CREATE TABLE `rumah_dinas` (
  `id_rumah` int(11) NOT NULL,
  `id_listrik` varchar(12) NOT NULL,
  `id_pdam` varchar(13) NOT NULL,
  `lokasi` varchar(20) NOT NULL,
  `alamat` tinytext NOT NULL,
  `nip` varchar(16) DEFAULT NULL,
  `penghuni` varchar(50) DEFAULT NULL,
  `keterangan` varchar(17) DEFAULT NULL,
  `id_foto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rumah_dinas`
--

INSERT INTO `rumah_dinas` (`id_rumah`, `id_listrik`, `id_pdam`, `lokasi`, `alamat`, `nip`, `penghuni`, `keterangan`, `id_foto`) VALUES
(1, '1', '1', 'araya', 'jl. araya ini itu no ini itu', NULL, NULL, NULL, 2),
(3, '2', '2', 'pakisjajar', 'jl. ini dan itu', NULL, NULL, NULL, 19),
(4, '3', '3', 'pakisjajar', 'jl. itu ini', NULL, NULL, NULL, 20);

-- --------------------------------------------------------

--
-- Struktur dari tabel `status`
--

CREATE TABLE `status` (
  `id_status` int(11) NOT NULL,
  `status` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `status`
--

INSERT INTO `status` (`id_status`, `status`) VALUES
(1, 'adminroot'),
(2, 'adminhumas'),
(3, 'adminrt'),
(4, 'user');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `nip` varchar(16) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(14) NOT NULL,
  `tgl_lhr` date DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `nama_lkp` varchar(50) NOT NULL,
  `id_status` int(11) NOT NULL,
  `id_bidang` int(11) DEFAULT NULL,
  `jabatan` varchar(100) NOT NULL,
  `golongan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`nip`, `username`, `password`, `tgl_lhr`, `alamat`, `nama_lkp`, `id_status`, `id_bidang`, `jabatan`, `golongan`) VALUES
('1234567801', 'user_01', 'user_01', '1980-01-05', ' Jl. Mayjend Panjaitan, No.xx, Padang, Sumatera Barat', 'Nama User 01', 4, 2, 'Kabid Kepabeanan dan Cukai', 'Penata Muda Tingkat I/III B'),
('1234567802', 'admin', 'admin', '1980-03-02', 'Jl. Mayjend Panjaitan, No.xx, Padang, Sumatera Barat', 'Nama Admin Root', 1, 1, '', ''),
('1234567803', 'admin_humas', 'admin_humas', '1980-03-10', 'Jl. Mayjend Panjaitan, No.xx, Padang, Sumatera Barat', 'Nama Admin Humas', 2, 3, '', ''),
('1234567804', 'admin_rt', 'admin_rt', '1980-03-02', 'Jl. Mayjend Panjaitan, No.xx, Padang, Sumatera Barat', 'Nama Admin RT', 3, 5, '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `video`
--

CREATE TABLE `video` (
  `id_video` int(11) NOT NULL,
  `file_name` varchar(200) NOT NULL,
  `file_video` blob NOT NULL,
  `tanggal_upload` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `nip` varchar(16) NOT NULL,
  `deskripsi` text NOT NULL,
  `read_status` varchar(10) NOT NULL,
  `path_video` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id_artikel`),
  ADD KEY `nip` (`nip`);

--
-- Indeks untuk tabel `atk`
--
ALTER TABLE `atk`
  ADD PRIMARY KEY (`id_atk`);

--
-- Indeks untuk tabel `bidang_bagian`
--
ALTER TABLE `bidang_bagian`
  ADD PRIMARY KEY (`id_bidang`);

--
-- Indeks untuk tabel `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`id_foto`),
  ADD KEY `nip` (`nip`);

--
-- Indeks untuk tabel `inventaris`
--
ALTER TABLE `inventaris`
  ADD PRIMARY KEY (`id_inventaris`);

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indeks untuk tabel `jenis_kbd`
--
ALTER TABLE `jenis_kbd`
  ADD PRIMARY KEY (`id_jenis_kbd`);

--
-- Indeks untuk tabel `jenis_permohonan`
--
ALTER TABLE `jenis_permohonan`
  ADD PRIMARY KEY (`id_jenis_permohonan`);

--
-- Indeks untuk tabel `kbd`
--
ALTER TABLE `kbd`
  ADD PRIMARY KEY (`nopol`),
  ADD KEY `nip` (`nip`),
  ADD KEY `id_jenis_kbd` (`id_jenis_kbd`),
  ADD KEY `id_service` (`id_service`);

--
-- Indeks untuk tabel `kritik_saran`
--
ALTER TABLE `kritik_saran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nip` (`nip`);

--
-- Indeks untuk tabel `permintaan_atk`
--
ALTER TABLE `permintaan_atk`
  ADD PRIMARY KEY (`id_permintaan`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `nip` (`nip`);

--
-- Indeks untuk tabel `permohonan_rumah`
--
ALTER TABLE `permohonan_rumah`
  ADD PRIMARY KEY (`id_permohonan`),
  ADD KEY `id_jenis_permohonan` (`id_jenis_permohonan`);

--
-- Indeks untuk tabel `permohonan_service`
--
ALTER TABLE `permohonan_service`
  ADD PRIMARY KEY (`id_permohonan`),
  ADD KEY `id_jenis_kbd` (`id_jenis_kbd`),
  ADD KEY `nip` (`nip`);

--
-- Indeks untuk tabel `riwayat_service`
--
ALTER TABLE `riwayat_service`
  ADD PRIMARY KEY (`id_service`),
  ADD KEY `nopol` (`nopol`);

--
-- Indeks untuk tabel `rumah_dinas`
--
ALTER TABLE `rumah_dinas`
  ADD PRIMARY KEY (`id_rumah`),
  ADD KEY `nip` (`nip`),
  ADD KEY `id_foto` (`id_foto`);

--
-- Indeks untuk tabel `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`nip`),
  ADD KEY `id_status` (`id_status`),
  ADD KEY `id_bidang` (`id_bidang`);

--
-- Indeks untuk tabel `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id_video`),
  ADD KEY `nip` (`nip`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id_artikel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `bidang_bagian`
--
ALTER TABLE `bidang_bagian`
  MODIFY `id_bidang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `foto`
--
ALTER TABLE `foto`
  MODIFY `id_foto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `kritik_saran`
--
ALTER TABLE `kritik_saran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `permintaan_atk`
--
ALTER TABLE `permintaan_atk`
  MODIFY `id_permintaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `permohonan_rumah`
--
ALTER TABLE `permohonan_rumah`
  MODIFY `id_permohonan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `permohonan_service`
--
ALTER TABLE `permohonan_service`
  MODIFY `id_permohonan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `rumah_dinas`
--
ALTER TABLE `rumah_dinas`
  MODIFY `id_rumah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `kbd`
--
ALTER TABLE `kbd`
  ADD CONSTRAINT `kbd_ibfk_2` FOREIGN KEY (`id_jenis_kbd`) REFERENCES `jenis_kbd` (`id_jenis_kbd`),
  ADD CONSTRAINT `kbd_ibfk_3` FOREIGN KEY (`id_service`) REFERENCES `riwayat_service` (`id_service`);

--
-- Ketidakleluasaan untuk tabel `kritik_saran`
--
ALTER TABLE `kritik_saran`
  ADD CONSTRAINT `kritik_saran_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `user` (`nip`);

--
-- Ketidakleluasaan untuk tabel `permintaan_atk`
--
ALTER TABLE `permintaan_atk`
  ADD CONSTRAINT `permintaan_atk_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `atk` (`id_atk`),
  ADD CONSTRAINT `permintaan_atk_ibfk_2` FOREIGN KEY (`nip`) REFERENCES `user` (`nip`);

--
-- Ketidakleluasaan untuk tabel `permohonan_rumah`
--
ALTER TABLE `permohonan_rumah`
  ADD CONSTRAINT `permohonan_rumah_ibfk_1` FOREIGN KEY (`id_jenis_permohonan`) REFERENCES `jenis_permohonan` (`id_jenis_permohonan`);

--
-- Ketidakleluasaan untuk tabel `permohonan_service`
--
ALTER TABLE `permohonan_service`
  ADD CONSTRAINT `permohonan_service_ibfk_1` FOREIGN KEY (`id_jenis_kbd`) REFERENCES `jenis_kbd` (`id_jenis_kbd`),
  ADD CONSTRAINT `permohonan_service_ibfk_2` FOREIGN KEY (`nip`) REFERENCES `user` (`nip`);

--
-- Ketidakleluasaan untuk tabel `riwayat_service`
--
ALTER TABLE `riwayat_service`
  ADD CONSTRAINT `riwayat_service_ibfk_1` FOREIGN KEY (`nopol`) REFERENCES `kbd` (`nopol`);

--
-- Ketidakleluasaan untuk tabel `rumah_dinas`
--
ALTER TABLE `rumah_dinas`
  ADD CONSTRAINT `rumah_dinas_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `user` (`nip`),
  ADD CONSTRAINT `rumah_dinas_ibfk_2` FOREIGN KEY (`id_foto`) REFERENCES `foto` (`id_foto`);

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_status`) REFERENCES `status` (`id_status`),
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`id_bidang`) REFERENCES `bidang_bagian` (`id_bidang`);

--
-- Ketidakleluasaan untuk tabel `video`
--
ALTER TABLE `video`
  ADD CONSTRAINT `video_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `user` (`nip`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
