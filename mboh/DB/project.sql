-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 26 Feb 2025 pada 14.02
-- Versi server: 8.0.30
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail`
--

CREATE TABLE `detail` (
  `id` int NOT NULL,
  `nama` mediumtext,
  `motor` varchar(70) DEFAULT NULL,
  `harga` int DEFAULT NULL,
  `id_transaksi` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `detail`
--

INSERT INTO `detail` (`id`, `nama`, `motor`, `harga`, `id_transaksi`) VALUES
(11, 'admin', 'GSXR 1000RR\r\n', 500000000, 11),
(12, 'admin', 'KTM RC 8C', 1300000000, 11),
(13, 'admin', 'YAMAHA-YZF-R1', 650000000, 12),
(14, 'admin', 'Kawasaki Ninja ZX-10R', 559000000, 12),
(15, 'admin', 'Kawasaki Ninja ZX-10R', 559000000, 13);

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `id` int NOT NULL,
  `user` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`id`, `user`, `password`, `role`) VALUES
(1, 'admin', 'admin', 'admin'),
(10, 'user', 'user', 'user'),
(12, 'ww', 'ww', 'user'),
(13, 'dd', 'dd', 'user');

-- --------------------------------------------------------

--
-- Struktur dari tabel `motor`
--

CREATE TABLE `motor` (
  `id` int NOT NULL,
  `motor` varchar(70) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `deskripsi` longtext,
  `harga` bigint DEFAULT NULL,
  `foto` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `motor`
--

INSERT INTO `motor` (`id`, `motor`, `deskripsi`, `harga`, `foto`) VALUES
(1, 'Ducati Superleggera V4', 'Ducati Superleggera V4 adalah superbike eksklusif dengan teknologi MotoGP, berbobot hanya 152 kg (dry weight) berkat penggunaan serat karbon. Ditenagai mesin 998cc V4 Desmosedici Stradale R, mampu menghasilkan hingga 234 hp dengan knalpot balap. ', 1370000000, 'v4.jpg'),
(8, 'YAMAHA-YZF-R1', 'Yamaha YZF-R1 adalah superbike flagship Yamaha yang mengusung teknologi dari MotoGP. Ditenagai mesin 998cc 4-silinder crossplane, motor ini menghasilkan sekitar 200 hp. Dilengkapi dengan elektronik canggih, quick shifter, riding mode, dan aerodinamika agresif untuk performa tinggi di lintasan maupun jalan raya.', 650000000, 'r1.jpg'),
(9, 'Kawasaki Ninja ZX-10R', 'Ninja ZX-10R adalah motor sport fairing 1000cc inline-4 yang menjadi juara di WorldSBK.', 559000000, 'zx.jpg'),
(10, 'Honda CBR1000RR-R Fireblade SP', ' Fireblade SP adalah motor sport premium dari Honda dengan mesin 999cc inline-4 DOHC, menghasilkan 217 hp', 1050000000, 'cbr4.avif'),
(11, 'Ducati Panigale V4', 'Ducati Panigale V4 adalah superbike Italia yang terkenal dengan desain elegan dan mesin 1103cc Desmosedici Stradale V4, menghasilkan 215 hp. Teknologi canggih seperti aerodinamika winglet, electronic suspension, dan IMU-based electronics membuatnya unggul di lintasan balap.', 799000000, 'pani.jpg'),
(12, ' KAWASAKI-Z1000', 'Kawasaki Z1000 adalah naked bike dengan mesin 1043 cc 4-silinder, menghasilkan 140 HP dan torsi 111 Nm. Dilengkapi transmisi 6-speed, suspensi upside-down fork, monoshock, dan rem ABS. Cocok untuk pengendara yang mengutamakan performa tinggi dan desain agresif.', 380800000, 'z10.jpeg'),
(13, 'BMW S1000RR\r\n', 'BMW S1000RR adalah motor sport berperforma tinggi dengan mesin 999 cc 4-silinder, menghasilkan sekitar 205 HP dan torsi 113 Nm. Dilengkapi transmisi 6-speed, suspensi upside-down fork, monoshock, dan sistem rem ABS canggih.', 1237000000, 'bmw.jpeg'),
(14, 'CRF1100L Africa Twin\r\n', 'Honda CRF1100L Africa Twin DCT 2025 adalah motor adventure dengan mesin 1084 cc parallel-twin, menghasilkan sekitar 102 HP dan torsi 105 Nm. Dilengkapi transmisi otomatis DCT (Dual Clutch Transmission), suspensi long-travel, dan sistem rem ABS yang dapat disesuaikan.', 633000000, 'crf.webp'),
(23, 'BMW GSR1300\r\n', 'BMW GSR1300 adalah motor naked bike berperforma tinggi dengan mesin 1300 cc 4-silinder, menghasilkan sekitar 160 HP dan torsi 140 Nm. Dilengkapi transmisi 6-speed, suspensi upside-down fork, monoshock, dan sistem rem ABS canggih.', 1145000000, 'bmwgs.jpg'),
(24, 'HD Road Glide\r\n', ' Harley-Davidson Road Glide adalah motor touring ikonik dengan mesin Milwaukee-Eight 107 atau 114 V-twin, menghasilkan sekitar 92 HP dan torsi 155 Nm. Dilengkapi fairing \"shark nose\" yang khas, sistem infotainment Boom! Box GTS, cruise control, dan suspensi yang nyaman untuk perjalanan jauh. ', 1055832000, 'road.jpg\r\n'),
(25, 'MV Agusta F4\r\n', 'MV Agusta F4 RC adalah motor sport kelas atas yang dirancang untuk performa balap dan eksklusivitas. Dilengkapi mesin 4-silinder 998 cc yang menghasilkan sekitar 205 HP dan torsi 115 Nm, motor ini menawarkan akselerasi luar biasa dan kecepatan tinggi.', 1200000000, 'mv.jpg'),
(26, 'GSXR 1000RR\r\n', ' Suzuki GSX-R1000R adalah motor sport dengan mesin 999 cc 4-silinder, menghasilkan 202 HP dan torsi 118 Nm. Dilengkapi fitur canggih seperti kontrol traksi, quick shifter, suspensi Showa, dan rem Brembo. Dirancang untuk kecepatan tinggi, handling presisi, dan teknologi balap. Cocok bagi pengendara yang mengutamakan performa maksimal dan desain agresif.', 500000000, 'gsx.jpeg'),
(27, 'KTM RC 8C', 'Motor sport edisi terbatas dengan mesin 889cc bertenaga 128 HP, bobot ringan, dan desain aerodinamis khas motor balap.', 1300000000, 'ktm.jpeg'),
(28, 'Aprilia RSV4 1100 Factory', 'Superbike Italia dengan mesin 1.099cc V4 yang menghasilkan 217 HP, dilengkapi suspensi Öhlins dan sistem elektronik canggih.', 990000000, 'a.jpeg'),
(29, 'Yamaha YZF-R6', 'Yamaha YZF-R6 adalah motor sport kelas 600cc yang dikenal dengan performa tinggi dan handling yang presisi. Ditenagai mesin 599cc inline-4 bertenaga sekitar 118 HP, motor ini dirancang untuk memberikan akselerasi responsif dan kecepatan tinggi di lintasan. ', 480000000, 'r6.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int NOT NULL,
  `harga` int DEFAULT NULL,
  `carabayar` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id`, `harga`, `carabayar`) VALUES
(11, 1800000000, 'pay-on-delivery'),
(12, 1209000000, 'pay-on-delivery'),
(13, 559000000, 'paypal');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detail`
--
ALTER TABLE `detail`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `motor`
--
ALTER TABLE `motor`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detail`
--
ALTER TABLE `detail`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `motor`
--
ALTER TABLE `motor`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
