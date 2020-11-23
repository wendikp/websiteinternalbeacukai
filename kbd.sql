-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3306
-- Generation Time: 25 Agu 2017 pada 05.58
-- Versi Server: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
('N 776 AP', 'Toyota Avanza', 'Priyo Ismiyadi', 'KEP-1113/WBC.11/BG.01/2014', NULL, 2, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kbd`
--
ALTER TABLE `kbd`
  ADD PRIMARY KEY (`nopol`),
  ADD KEY `nip` (`nip`),
  ADD KEY `id_jenis_kbd` (`id_jenis_kbd`),
  ADD KEY `id_service` (`id_service`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `kbd`
--
ALTER TABLE `kbd`
  ADD CONSTRAINT `kbd_ibfk_2` FOREIGN KEY (`id_jenis_kbd`) REFERENCES `jenis_kbd` (`id_jenis_kbd`),
  ADD CONSTRAINT `kbd_ibfk_3` FOREIGN KEY (`id_service`) REFERENCES `riwayat_service` (`id_service`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
